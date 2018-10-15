<?php

namespace App\Listeners;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Login;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\LoginActivity;
use App\User;


class LogSuccessfulLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
	
    public function __construct(Request $request)
    {
		$email = $request->email;
		session(['email' => $email]);
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */

    public function handle(Login $event)
    {
		LoginActivity::create([
		'email'       =>  session('email'),
		'type' => 'Logged In'
    ]);
		$event->user->last_login = date('m-d-Y H:i');
		$event->user->save();
    }
}
