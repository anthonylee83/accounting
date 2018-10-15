<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Profile;

class ManagerUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::Create([
            'email'    => 'manager@manageruser.com',
            'name'     => 'Manager User',
            'password' => Hash::make('Manager')
        ]);

        Profile::create(
            [
                'access_level_id' => 2,
                'user_id'         => $user->id
            ]
        );
    }
}
