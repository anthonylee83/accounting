<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;

class ChartOfAccounts extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function showAccounts(){
        $accounts = Account::all();
        return view('accounts.show', compact('accounts'));
    }

    public function createAccount(){
        return view('accounts.new');
    }

    public function storeAccount(Request $request){
        $account = Account::fill($request->all());
        $account->save();
        return redirect()->action("ChartOfAccounts@showAccounts");
    }

    public function deleteAccount(Request $request){
        $account = Account::find($request->id);
        $account->delete();
        return redirect()->action('ChartOfAccounts@showAccounts');
    }
}
