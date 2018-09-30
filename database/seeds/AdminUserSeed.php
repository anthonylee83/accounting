<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Profile;

class AdminUserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::Create([
            'email'    => 'admin@adminuser.com',
            'name'     => 'Admin User',
            'password' => Hash::make('Admin')
        ]);

        Profile::create(
            [
                'access_level_id' => 3,
                'user_id'         => $user->id
            ]
        );
    }
}
