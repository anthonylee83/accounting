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
        AccountNormalSide::create(['normal_side'=>'Debit']);
        AccountNormalSide::create(['normal_side'=>'Credit']);
    }
}
