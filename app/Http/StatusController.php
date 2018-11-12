<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JournalEntry;

class StatusController extends Controller
{

    public function index()
    {
        $entries  = JournalEntry::orderBy('created_at', 'DESC')
                    ->with('transactions', 'transactions.account')
                    ->paginate(30);
        return view('standard.status', compact('entries'));
    }
}
