<?php

use Illuminate\Database\Seeder;
use App\AccountType;

class AccountTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AccountType::create(['account_type'=>'Assets']);
        AccountType::create(['account_type'=>'Equity']);
        AccountType::create(['account_type'=>'Expenses']);
        AccountType::create(['account_type'=>'Liabilities']);
        AccountType::create(['account_type'=>'Revenues']);
    }
}
