<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Profile;

class StandardUserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::Create([
            'email'    => 'standard@standarduser.com',
            'name'     => 'Standard User Name',
            'password' => Hash::make('Standard')
        ]);

        Profile::create(
            [
                'access_level_id' => 1,
                'user_id'         => $user->id
            ]
        );
    }
}
