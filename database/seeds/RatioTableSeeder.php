<?php

use Illuminate\Database\Seeder;
use App\Ratio;

class RatioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		Ratio::create([
			'ratio_title' => 'Net Profit Margin',
			'value' => 1
		]);
		
		Ratio::create([
			'ratio_title' => 'Return on Total Assets',
			'value' => 1
		]);
		Ratio::create([
			'ratio_title' => 'Return on Stockholder Equity',
			'value' => 1
		]);
		Ratio::create([
			'ratio_title' => 'Current Ratio',
			'value' => 1
		]);
		Ratio::create([
			'ratio_title' => 'Debt-to-Asset Ratio',
			'value' => 1
		]);
		Ratio::create([
			'ratio_title' => 'Debt-to-Equity Ratio',
			'value' => 1
		]);
		Ratio::create([
			'ratio_title' => 'Total Asset Turnover',
			'value' => 1
		]);
		Ratio::create([
			'ratio_title' => 'Average Collection Period',
			'value' => 1
		]);
		
    }
}
