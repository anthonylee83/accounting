<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class StandardUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->profile->access_level_id > 2) {
            abort(403, 'You are not authorized to view this page');
        }
        return $next($request);
    }
}
