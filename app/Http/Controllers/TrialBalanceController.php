<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Account;
use App\AccountType;
use App\journalEntry;
use App\JournalEntryType;
use App\Transaction;
use App\Status;
use App\AccountSubtype;

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
        $approvedID = Status::where('state', 'Approved')->value('id');
        $transactions = DB::table('transactions')
            ->join('journal_entries', 'transactions.journal_entry_id', '=', 'journal_entries.id')
            ->where('journal_entries.journal_entry_type_id', $unadjustedID)
            ->where('journal_entries.status_id', $approvedID)->get();
        $accounts = Account::orderByRaw("FIELD(account_type_id, '1', '6', '4', '2', '5', '3') ASC")->get();

        $path = $request->path();
        return view('trialbalance.unadjusted', compact('accounts','transactions', 'path'));
    }
    public function adjusted(Request $request)
    {
        $unadjustedID = JournalEntryType::where('type', 'Closing')->value('id');
        $approvedID = Status::where('state', 'Approved')->value('id');
        $transactions = DB::table('transactions')
            ->join('journal_entries', 'transactions.journal_entry_id', '=', 'journal_entries.id')
            ->where('journal_entries.journal_entry_type_id','!=', $unadjustedID)
            ->where('journal_entries.status_id', $approvedID)->get();
        $accounts = Account::orderByRaw("FIELD(account_type_id, '1', '6', '4', '2', '5', '3') ASC")->get();

        $path = $request->path();
        return view('trialbalance.adjusted', compact('accounts','transactions', 'path'));
    }
    public function closing(Request $request)
    {
        $accounts = Account::orderByRaw("FIELD(account_type_id, '1', '6', '4', '2', '5', '3') ASC")->get();
        $retainedEarningsValue = $this->retainedEarningsCalculation();

        $path = $request->path();
        return view('trialbalance.closing', compact('accounts','retainedEarningsValue', 'path'));
    }
    public function retainedEarningsCalculation()
    {
        $retainedEarnings = Account::where('account_name', 'Retained Earnings')->first();
        $dividendsDeclared = Account::where('account_name', 'Dividends Declared')->first();
        $retainedEarningsValue = preg_replace("/[^0-9.]/", "", "$retainedEarnings->account_balance");
        $dividendsDeclaredValue = preg_replace("/[^0-9.]/", "", "$dividendsDeclared->account_balance");

        $accountTypeRevenue = AccountType::where('account_type', 'Revenues')->first();
        $revenueID = $accountTypeRevenue->id;
        $accountTypeExpense = AccountType::where('account_type', 'Expenses')->first();
        $expenseID = $accountTypeExpense->id;
        $revenues = Account::where('account_type_id', $revenueID)->get();
        $expenses = Account::where('account_type_id', $expenseID)->get();
        $revenueTotal = $this->balanceTotal($revenues);
        $expenseTotal = $this->balanceTotal($expenses);
        $netIncome = $revenueTotal - $expenseTotal;

        $newRetainedEarningsValue = $retainedEarningsValue + $netIncome - $dividendsDeclaredValue;

        return $newRetainedEarningsValue;
    }
    public function balanceTotal($accounts)
    {
        $total = 0;
        foreach($accounts as $account)
            $total += preg_replace("/[^0-9.]/", "", "$account->account_balance");
        return $total;

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
