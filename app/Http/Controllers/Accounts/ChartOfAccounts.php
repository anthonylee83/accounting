<?php

namespace App\Http\Controllers\Accounts;

use Illuminate\Http\Request;
use App\Http\Requests\NewAccountRequest;
use App\Http\Requests\UpdateAccountRequest;
use App\Http\Requests\DeleteAccountRequest;
use App\Http\Controllers\Controller;
use App\Account;
use App\AccountType;
use App\AccountSubtype;

class ChartOfAccounts extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function showAccounts(Request $request, $deleted = false)
    {
        if ($deleted == false) {
            $accounts = Account::paginate(15);
        } else {
            $accounts = Account::withTrashed()->paginate(15);
        }
        $path = $request->path();
        return view('accounts.index', compact('accounts', 'path'));
    }

    public function newAccount()
    {
        $accountTypes    = AccountType::all();
        $accountSubtypes = AccountSubtype::all();
        return view('accounts.new', compact('accountTypes', 'accountSubtypes'));
    }

    public function showAccount($id)
    {
        $accountTypes    = AccountType::all();
        $accountSubtypes = AccountSubtype::all();
        $account         = Account::withTrashed()->findOrFail($id);
        return view('accounts.show', compact('account', 'accountTypes', 'accountSubtypes'));
    }

    public function storeAccount(NewAccountRequest $request)
    {
        $account = Account::create(array_merge($request->all()));
        return redirect()->action('Accounts\ChartOfAccounts@showAccounts');
    }

    public function deleteAccount($id)
    {
        $account = Account::FindOrFail($id);
        $account->delete();
        return redirect()->action('Accounts\ChartOfAccounts@showAccounts');
    }

    public function updateAccount(UpdateAccountRequest $request, $id)
    {
        $account                     = Account::FindOrFail($id);
        $account->account_name       = $request->account_name;
        $account->account_type_id    = $request->account_type_id;
        $account->account_subtype_id = $request->account_subtype_id;
        $account->save();
        return redirect()->action('Accounts\ChartOfAccounts@showAccounts');
    }

    public function reactivateAccount($id)
    {
        $account = Account::withTrashed()->findOrFail($id);
        $account->restore();
        return redirect()->action('Accounts\ChartOfAccounts@showAccounts');
    }

    public function search($search)
    {
        $search  = '%' . $search . '%';
        $results = Account::where('account_name', 'like', $search)
                        ->orWhere('id', 'like', $search)->get();
        return response()->json($results);
    }
}
