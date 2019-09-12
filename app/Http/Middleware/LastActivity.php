<?php

namespace App\Http\Middleware;

use Closure;
use Carbon\Carbon;
use Auth;

class LastActivity
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
        if(Auth::check()) {
            $user = Auth::user();
            $data = ['last_activity' => Carbon::now()];
            $user->update($data);
        }

        return $next($request);
    }
}
