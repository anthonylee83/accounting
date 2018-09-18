<?php

use Illuminate\Database\Seeder;
use App\User;

class AdminUserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::Create([
            'email' => 'admin@adminuser.com',
            'name' => 'Admin User',
            'password' => Hash::make('Admin')
        ]);
    }
}
