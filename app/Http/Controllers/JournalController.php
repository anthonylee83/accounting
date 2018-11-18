<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JournalEntry;
use App\Account;
use App\Transaction;
use App\AccountNormalSide;
use Auth;
use App\EventLog;
use App\Attachment;

class JournalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('accountant')->except(['approve', 'decline']);
        $this->middleware('manager')->only(['approve', 'decline']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entries  = JournalEntry::orderBy('created_at', 'DESC')
                    ->with('transactions', 'transactions.account')
                    ->paginate(30);

        $accounts = Account::all();
        return view('journalize.index', compact('entries', 'accounts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $journal      = JournalEntry::create([
            'approved'             => false,
            'created_user_id'      => Auth::user()->id,
            'document_reference_id'=> 0,
            'reference'            => rand(10000, 999999),
            'approval_user_id'     => 0,
            'description'          => $request->description ?? ''
        ]);

        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $attachment) {
                $file = $attachment->store('attachments');
                Attachment::create(['journal_entry_id'  => $journal->id,
                                'file'                  => $file,
                                'filename'              => $attachment->getClientOriginalName()
                                    ]);
            }
        }
        

        $transactions = [];
        foreach (json_decode($request->transactions, true) as $transaction) {
            //return response()->json($transaction);
            $t              = new Transaction();
            $t->account_id  = $transaction['account_id'];
            if ($transaction['debit'] > 0) {
                $t->debit  = true;
                $t->amount = $transaction['debit'];
            } else {
                $t->debit  = false;
                $t->amount = $transaction['credit'];
            }

            $journal->transactions()->save($t);
        }
        EventLog::create([
        'email'       => session('email'),
        'action'      => 'Journalized a new transaction'
        ]);

        return redirect()->action('JournalController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function approve($id)
    {
        $entry           = JournalEntry::findOrFail($id);
        $transactions    = Transaction::where('journal_entry_id', $id)->get();

        // Amount validation
        foreach ($transactions as $transaction) {
            $accountID      = $transaction->account_id;
            $account        = Account::find($accountID);
            $normal         = AccountNormalSide::find($account->account_normal_side_id);
            $accountBalance = preg_replace('/[^0-9.]/', '', "$account->account_balance");
            $amount         = $transaction->amount;

            if ($transaction->debit != $normal->journal_binary) {
                if ($accountBalance < $amount) {
                    return redirect()->action('JournalController@index');
                }
            }
        }

        foreach ($transactions as $transaction) {
            $accountID      = $transaction->account_id;
            $account        = Account::find($accountID);
            $normal         = AccountNormalSide::find($account->account_normal_side_id);
            $accountBalance = preg_replace('/[^0-9.]/', '', "$account->account_balance");
            $amount         = $transaction->amount;

            if ($transaction->debit == $normal->journal_binary) {
                $accountBalance = $accountBalance + $amount;
            } elseif ($transaction->debit != $normal->journal_binary) {
                $accountBalance = $accountBalance - $amount;
            }
            $account->account_balance = $accountBalance;
            $account->save();
        }

        $entry->approved = true;
        $entry->save();
        $transactions = Transaction::where('journal_entry_id', $id)->get();
        
        EventLog::create([
        'email'       => session('email'),
        'action'      => "Approved journal entry: {$id}"
        ]);

        return redirect()->action('JournalController@index');
    }

    public function decline($id)
    {
        $entry = JournalEntry::findOrFail($id);
        EventLog::create([
        'email'       => session('email'),
        'action'      => "Declined journal entry: {$id}"
        ]);
        $entry->delete();
        return redirect()->action('JournalController@index');
    }
}
