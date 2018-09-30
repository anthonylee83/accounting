<?php

use Illuminate\Database\Seeder;
use App\AccessLevel;

class AccessLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $al = AccessLevel::create(['level'=>'Standard']);
        $al = AccessLevel::create(['Level' => 'Manager']);
        $al = AccessLevel::create(['Level' => 'Admin']);
    }
}
