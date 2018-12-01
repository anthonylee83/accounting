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
		$acctRecTotal = DB::table('chart_of_accounts')->where('account_name', 'Accounts Recievable')->value('account_balance');
		
		$NetProMargin = 0;
		$ACP = 0;
		$ROTA = 0;
		$DAR = 0;
		$TAT = 0;
		$ROSE = 0;
		$DER = 0;
		$Current = 0;
		$diffNetProMargin = 0;
		$diffROTA = 0;
		$diffROSE = 0;
		$diffCurrent = 0;
		$diffDAR = 0;
		$diffDER = 0;
		$diffTAT = 0;
		$diffACP = 0;
		if($revenueTotal > 0)
		{
			$NetProMargin = number_format(($netIncome / $revenueTotal)*100, 2);
			$ACP = number_format(($acctRecTotal / ($revenueTotal / 365)), 2);
		}
		if($assetTotal > 0)
		{
			$ROTA = number_format(($netIncome / $assetTotal)*100, 2);
			$DAR = number_format(($liabTotal / $assetTotal), 2);
			$TAT = number_format(($revenueTotal / $assetTotal), 2);
		}
		if($equityTotal > 0)
		{
			$ROSE = number_format(($netIncome / $equityTotal)*100, 2);
			$DER = number_format(($liabTotal / $equityTotal), 2);
		}
		if($currentLiabilitiesTotal > 0)
			$Current = number_format(($currentAssetsTotal / $currentLiabilitiesTotal), 2);


		if($oldNetProMargin > 0)
			$diffNetProMargin = number_format(($NetProMargin / $oldNetProMargin)*100, 2);
		if($oldROTA > 0)
			$diffROTA = number_format(($ROTA / $oldROTA)*100, 2);
		if($oldROSE > 0)
			$diffROSE = number_format(($ROSE / $oldROSE)*100, 2);
		if($oldCurrent > 0)
			$diffCurrent = number_format(($Current / $oldCurrent)*100, 2);
		if($oldDAR > 0)
			$diffDAR = number_format(($DAR / $oldDAR)*100, 2);
		if($oldDER > 0)
			$diffDER = number_format(($DER / $oldDER)*100, 2);
		if($oldTAT > 0)
			$diffTAT = number_format(($TAT / $oldTAT)*100, 2);
		if($oldACP > 0)
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
