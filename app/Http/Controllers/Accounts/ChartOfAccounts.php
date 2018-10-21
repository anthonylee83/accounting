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
use App\AccountNormalSide;
use App\EventLog;

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
        $accountNormalSide = AccountNormalSide::all();
        return view('accounts.new', compact('accountTypes', 'accountSubtypes', 'accountNormalSide'));
    }

    public function showAccount($id)
    {
        $accountTypes    = AccountType::all();
        $accountSubtypes = AccountSubtype::all();
        $accountNormalSide = AccountNormalSide::all();
        $account         = Account::withTrashed()->findOrFail($id);
        return view('accounts.show', compact('account', 'accountTypes', 'accountSubtypes', 'accountNormalSide'));
    }

    public function storeAccount(NewAccountRequest $request)
    {
        $account = Account::create(array_merge($request->all()));
		EventLog::create([
		'email'       =>  session('email'),
		'action' => "Created New Account: {$account->account_name}"
		]);
        return redirect()->action('Accounts\ChartOfAccounts@showAccounts');
    }

    public function deleteAccount($id)
    {
        $account = Account::FindOrFail($id);
		EventLog::create([
		'email'       =>  session('email'),
		'action' => "Deleted Account: {$account->account_name}"
		]);
        $account->delete();
        return redirect()->action('Accounts\ChartOfAccounts@showAccounts');
    }

    public function updateAccount(UpdateAccountRequest $request, $id)
    {
        $account                     = Account::FindOrFail($id);
		$oldname = $account->account_name;
		$oldtype = $account->account_type_id;
		$oldsubtype = $account->account_subtype_id;
        $oldnormalside = $account->account_normal_side_id;
        $account->account_name       = $request->account_name;
        $account->account_type_id    = $request->account_type_id;
        $account->account_subtype_id = $request->account_subtype_id;
        $account->account_normal_side_id = $request->account_normal_side_id;
        $account->save();
		if($account->account_name !== $oldname)
			EventLog::create([
			'email'       =>  session('email'),
			'action' => "Updated Account Name: {$oldname} to {$account->account_name}"
			]);
		if($account->account_type_id !== $oldtype)
			EventLog::create([
			'email'       =>  session('email'),
			'action' => "Updated {$account->account_name} Type: {$oldtype} to {$account->account_type_id}"
			]);
		if($account->account_subtype_id !== $oldsubtype)
			EventLog::create([
			'email'       =>  session('email'),
			'action' => "Updated {$account->account_name} Subtype: {$oldsubtype} to {$account->account_subtype_id}"
			]);
        if($account->account_normal_side_id !== $oldnormalside)
            EventLog::create([
            'email'       =>  session('email'),
            'action' => "Updated {$account->account_name} Normal Side: {$oldnormalside} to {$account->account_normal_side_id}"
            ]);
        return redirect()->action('Accounts\ChartOfAccounts@showAccounts');
    }

    public function reactivateAccount($id)
    {
        $account = Account::withTrashed()->findOrFail($id);
        $account->restore();
		EventLog::create([
		'email'       =>  session('email'),
		'action' => "Reactivated Account: {$account->account_name}"
		]);
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
