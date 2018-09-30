<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Failed;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\LoginActivity;
use Illuminate\Http\Request;

class LogFailedLogin
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
		$emailF = $request->email;
		session(['emailF' => $emailF]);
    }

    /**
     * Handle the event.
     *
     * @param  Failed  $event
     * @return void
     */
    public function handle(Failed $event)
    {
        LoginActivity::create([
		'email' =>  session('emailF'),
		'type' => 'Failed to login'
		]);
    }
}
