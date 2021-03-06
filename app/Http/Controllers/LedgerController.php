<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\JournalEntry;
use App\Account;
use App\Transaction;
use App\Status;
use Auth;

class LedgerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAccounts(Request $request, $deleted = false)
    {
        if ($deleted == false) {
            $accounts = Account::paginate(15);
        } else {
            $accounts = Account::withTrashed()->paginate(15);
        }
        $path = $request->path();
        return view('ledger.index', compact('accounts', 'path'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function showTransactions($id)
    {
        $approvedID = Status::where('state', 'Approved')->value('id');
        $transactions = DB::table('transactions')
            ->join('journal_entries', 'transactions.journal_entry_id', '=', 'journal_entries.id')
            ->where('transactions.account_id', $id)
            ->where('journal_entries.status_id', $approvedID)->get();

        $account = Account::find($id);
        $accountName = $account->account_name;
        $accountNormalSide = $account->account_normal_side_id;

        return view('ledger.show', compact('transactions', 'accountName', 'accountNormalSide'));
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
