<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\AccountType;
use App\AccountSubtype;

class RatioController extends Controller
{
    public function index()
	{
		return view('standard.dashboard');
	}

}
