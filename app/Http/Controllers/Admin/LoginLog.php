<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\LoginActivity;

class LoginLog extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        $this->middleware('admin');
    }
	public function index(){
		$logLogin = DB::table('login_activities')->paginate(9);
		return view('admin.login-log', compact('logLogin'));
	}
}
