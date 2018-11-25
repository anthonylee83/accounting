<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Account;
use App\journalEntry;
use App\JournalEntryType;
use App\Transaction;

class TrialBalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function unadjusted(Request $request)
    {
        $unadjustedID = JournalEntryType::where('type', 'Regular')->value('id');
        $transactions = DB::table('transactions')
            ->join('journal_entries', 'transactions.journal_entry_id', '=', 'journal_entries.id')
            ->where('journal_entries.journal_entry_type_id', $unadjustedID)->get();
        $accounts = Account::orderBy('account_type_id', 'asc')->get();

        $path = $request->path();
        return view('trialbalance.unadjusted', compact('accounts','transactions', 'path'));
    }
    public function adjusted(Request $request)
    {
        $unadjustedID = JournalEntryType::where('type', 'Closing')->value('id');
        $transactions = DB::table('transactions')
            ->join('journal_entries', 'transactions.journal_entry_id', '=', 'journal_entries.id')
            ->where('journal_entries.journal_entry_type_id','!=', $unadjustedID)->get();
        $accounts = Account::orderBy('account_type_id', 'asc')->get();

        $path = $request->path();
        return view('trialbalance.adjusted', compact('accounts','transactions', 'path'));
    }
    public function closing(Request $request)
    {
        $accounts = Account::orderBy('account_type_id', 'asc')->get();

        $path = $request->path();
        return view('trialbalance.closing', compact('accounts', 'path'));
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
