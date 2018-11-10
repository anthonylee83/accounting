<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\AccountType;
use App\AccountSubtype;

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
        $revenueTotal = $this->balanceTotal($revenues);
        $expenseTotal = $this->balanceTotal($expenses);
        $netIncome = $revenueTotal - $expenseTotal;
        $path = $request->path();

        return view('financial.income', compact('revenues', 'expenses', 'revenueTotal', 'expenseTotal',
            'netIncome','path'));
    }

    public function balanceTotal($accounts)
    {
       $total = 0;
       foreach($accounts as $account)
           $total += preg_replace("/[^0-9.]/", "", "$account->account_balance");
       return $total;

    }

    public function balanceSheet(Request $request)
    {
        $accountTypeAsset = AccountType::where('account_type', 'Assets')->first();
        $accountTypeEquity = AccountType::where('account_type', 'Equity')->first();
        $accountTypeLiability = AccountType::where('account_type', 'Liabilities')->first();
        $accountSubTypeShort = AccountSubtype::where('sub_type', 'Short term')->first();
        $accountSubTypeLong = AccountSubtype::where('sub_type', 'Long term')->first();
        $assetID = $accountTypeAsset->id;
        $equityID = $accountTypeEquity->id;
        $liabilityID = $accountTypeLiability->id;
        $shortID = $accountSubTypeShort->id;
        $longID = $accountSubTypeLong->id;
        $currentAssets = Account::where('account_type_id', $assetID)->where('account_subtype_id', $shortID)->get();
        $nonCurrentAssets = Account::where('account_type_id', $assetID)->where('account_subtype_id', $longID)->get();
        $equities = Account::where('account_type_id', $equityID);
        $currentLiabilities = Account::where('account_type_id', $liabilityID)->where('account_subtype_id', $shortID)->get();
        $nonCurrentLiabilities = Account::where('account_type_id', $liabilityID)->where('account_subtype_id', $longID)->get();
        $currentAssetsTotal = $this->balanceTotal($currentAssets);
        $nonCurrentAssetsTotal = $this->balanceTotal($nonCurrentAssets);
        $assetsTotal = $currentAssetsTotal + $nonCurrentAssetsTotal;
        $equityTotal = $this->balanceTotal($equities);
        $currentLiabilitiesTotal = $this->balanceTotal($currentLiabilities);
        $nonCurrentLiabilitiesTotal = $this->balanceTotal($nonCurrentLiabilities);
        $equityLiabilitiesTotal = $currentLiabilitiesTotal + $nonCurrentLiabilitiesTotal + $equityTotal;
        $path = $request->path();
        return view('financial.balance', compact('currentAssets', 'nonCurrentAssets', 'equities',
            'currentLiabilities', 'nonCurrentLiabilities', 'currentAssetsTotal', 'nonCurrentAssetsTotal', 'equityTotal',
            'currentLiabilitiesTotal', 'nonCurrentLiabilitiesTotal', 'assetsTotal', 'equityLiabilitiesTotal', 'path'));

    }

}
