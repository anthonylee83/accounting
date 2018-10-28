<?php

use Illuminate\Database\Seeder;
use App\AccountNormalSide;
use App\Account;

class NormalSideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AccountNormalSide::create(['journal_binary'=>true, 'normal_side'=>'Debit']);
        AccountNormalSide::create(['journal_binary'=>false, 'normal_side'=>'Credit']);
    }
}
