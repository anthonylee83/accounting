<?php

use Illuminate\Database\Seeder;
use App\AccountSubType;

class AccountSubtypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AccountSubType::create(['sub_type' => 'Longterm']);
        AccountSubType::create(['sub_type' => 'Shorterm']);
    }
}
