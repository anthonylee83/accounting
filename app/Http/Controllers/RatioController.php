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
		$OpProMargin = (session('netIncome') / session('revenueTotal'))*100;
		$NetProMargin = (session('netIncome') / session('revenueTotal'))*100;
		$ROTA = (session('netIncome') / session('assetTotal'))*100;
		$ROSE = (session('netIncome') / session('equityTotal'))*100;
		$Current = (session('currentAssetsTotal') / session('currentLiabilitiesTotal'));
		$TAT = (session('revenueTotal') / session('assetTotal'));
		$ACP = (session('accountsRecTotal') / (session('assetTotal') / 365));
		
		return view('standard.dashboard', compact('OpProMargin', 'NetProMargin', 'ROTA', 'ROSE', 'Current', 'TAT', 'ACP'));
	}

}
