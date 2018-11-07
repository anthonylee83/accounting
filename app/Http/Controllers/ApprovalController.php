<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JournalEntry;
use App\Account;

class ApprovalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('manager');
    }

    public function index()
    {
		$entries  = JournalEntry::orderBy('created_at', 'DESC')
                    ->with('transactions', 'transactions.account')
                    ->paginate(30);

        $accounts = Account::all();
        return view('manager.approval', compact('entries'));
    }
}
