<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JournalEntry;
use App\Account;
use App\Transaction;
use Auth;

class JournalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $entries  = JournalEntry::orderBy('created_at', 'DESC')
                    ->with('transactions')
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
            'approval_user_id'     => 0
        ]);

        //return $request->transactions;
        $transactions = [];
        foreach ($request->transactions as $transaction) {
            //return response()->json($transaction);
            $t              = new Transaction();
            $t->account_id  = $transaction['account_id'];
            $t->description = $transaction['description'] == null ? '' : $transaction['description'];
            if ($transaction['debit'] > 0) {
                $t->debit  = true;
                $t->amount = $transaction['debit'];
            } else {
                $t->debit  = false;
                $t->amount = $transaction['credit'];
            }

            $journal->transactions()->save($t);
        }

        return response()->json($journal);
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
}