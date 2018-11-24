<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\AccountType;
use App\AccountSubtype;
use App\Ratio;
use DB;

class RatioController extends Controller
{
    public function index()
	{
		$oldNetProMargin = DB::table('ratio')->where('ratio_title', 'Net Profit Margin')->value('value');
		$oldROTA = DB::table('ratio')->where('ratio_title', 'Return on Total Assets')->value('value');
		$oldROSE = DB::table('ratio')->where('ratio_title', 'Return on Stockholder Equity')->value('value');
		$oldCurrent = DB::table('ratio')->where('ratio_title', 'Current Ratio')->value('value');
		$oldDAR = DB::table('ratio')->where('ratio_title', 'Debt-to-Asset Ratio')->value('value');
		$oldDER = DB::table('ratio')->where('ratio_title', 'Debt-to-Equity Ratio')->value('value');
		$oldTAT = DB::table('ratio')->where('ratio_title', 'Total Asset Turnover')->value('value');
		$oldACP = DB::table('ratio')->where('ratio_title', 'Average Collection Period')->value('value');
		
		$assetTotal = DB::table('chart_of_accounts')->where('account_type_id', 1)->sum('account_balance');
		$currentAssetsTotal = DB::table('chart_of_accounts')->where('account_type_id', 1)->where('account_subtype_id', 2)->sum('account_balance');
		$liabTotal = DB::table('chart_of_accounts')->where('account_type_id', 4)->sum('account_balance');
		$currentLiabilitiesTotal = DB::table('chart_of_accounts')->where('account_type_id', 4)->where('account_subtype_id', 2)->sum('account_balance');
		$revenueTotal = DB::table('chart_of_accounts')->where('account_type_id', 5)->sum('account_balance');
		$equityTotal = DB::table('chart_of_accounts')->where('account_type_id', 2)->sum('account_balance');
		$netIncome = ($revenueTotal - DB::table('chart_of_accounts')->where('account_type_id', 3)->sum('account_balance'));
		
		$NetProMargin = number_format(($netIncome / $revenueTotal)*100, 2);
		$ROTA = number_format(($netIncome / $assetTotal)*100, 2);
		$ROSE = number_format(($netIncome / $equityTotal)*100, 2);
		$Current = number_format(($currentAssetsTotal / $currentLiabilitiesTotal), 2);
		$DAR = number_format(($liabTotal / $assetTotal), 2);
		$DER = number_format(($liabTotal / $equityTotal), 2);
		$TAT = number_format(($revenueTotal / $assetTotal), 2);
		$acctRecTotal = DB::table('chart_of_accounts')->where('account_name', 'Accounts Recievable')->value('account_balance');
		$ACP = number_format(($acctRecTotal / ($revenueTotal / 365)), 2);
		
		$diffNetProMargin = number_format(($NetProMargin / $oldNetProMargin)*100, 2);
		$diffROTA = number_format(($ROTA / $oldROTA)*100, 2);
		$diffROSE = number_format(($ROSE / $oldROSE)*100, 2);
		$diffCurrent = number_format(($Current / $oldCurrent)*100, 2);
		$diffDAR = number_format(($DAR / $oldDAR)*100, 2);
		$diffDER = number_format(($DER / $oldDER)*100, 2);
		$diffTAT = number_format(($TAT / $oldTAT)*100, 2);
		$diffACP = number_format(($ACP / $oldACP)*100, 2);
		
		DB::table('ratio')->where('ratio_title', 'Net Profit Margin')->update(['value' => $NetProMargin]);
		DB::table('ratio')->where('ratio_title', 'Return on Total Assets')->update(['value' => $ROTA]);
		DB::table('ratio')->where('ratio_title', 'Return on Stockholder Equity')->update(['value' => $ROSE]);
		DB::table('ratio')->where('ratio_title', 'Current Ratio')->update(['value' => $Current]);
		DB::table('ratio')->where('ratio_title', 'Debt-to-Asset Ratio')->update(['value' => $DAR]);
		DB::table('ratio')->where('ratio_title', 'Debt-to-Equity Ratio')->update(['value' => $DER]);
		DB::table('ratio')->where('ratio_title', 'Total Asset Turnover')->update(['value' => $TAT]);
		DB::table('ratio')->where('ratio_title', 'Average Collection Period')->update(['value' => $ACP]);
		
		
		return view('standard.dashboard', compact('NetProMargin', 'ROTA', 'ROSE', 'Current', 'DAR', 'DER', 'TAT', 'ACP', 'diffNetProMargin', 'diffROTA', 'diffROSE', 'diffCurrent', 'diffDAR', 'diffDER', 'diffTAT', 'diffACP'));
	}

}
