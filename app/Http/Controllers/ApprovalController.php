<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\JournalEntry;

class ApprovalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('manager');
    }

    public function index()
    {
        return redirect()->action('JournalController@index');
        $entries = JournalEntry::where('approved', 0)->orderBy('created_at', 'ASC')->get();
        return view('manager.approval', compact('entries'));
    }
}
