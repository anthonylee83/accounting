<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\AccountType;

class FinancialStatementsController extends Controller
{
    public function incomeStatement(Request $request)
    {
        $accountTypeRevenue = AccountType::where('account_type', 'Revenues')->first();
        $revenueID = $accountTypeRevenue->id;
        $accountTypeExpense = AccountType::where('account_type', 'Expenses')->first();
        $expenseID = $accountTypeExpense->id;
        $revenues = Account::where('account_type_id', $revenueID)->get();
        $expenses = Account::where('account_type_id', $expenseID)->get();
        $path = $request->path();
        return view('financial.income', compact('revenues', 'expenses', 'path'));
    }
}
