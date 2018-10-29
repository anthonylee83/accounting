<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\EventLog;
use DB;

class EventLogController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
	public function index(){
		$logEvent = DB::table('event_log')->paginate(9);
		return view('admin.event-log', compact('logEvent'));
	}
}
