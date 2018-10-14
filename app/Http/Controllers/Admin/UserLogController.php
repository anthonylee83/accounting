<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class UserLogController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
	public function index()
	{
		$activeUserCount = \App\User::all()->count();
        $disabledUserCount = \App\User::onlyTrashed()->count();
		$standardCount = DB::table('profiles')->where('access_level_id', 1)->count();
		$managerCount = DB::table('profiles')->where('access_level_id', 2)->count();
		$adminCount = DB::table('profiles')->where('access_level_id', 3)->count();
		return view('admin.user-log', compact('standardCount', 'managerCount', 'adminCount', 'activeUserCount', 'disabledUserCount'));
	}
}
