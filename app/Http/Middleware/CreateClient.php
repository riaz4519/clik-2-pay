<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CreateClient
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

        if ( Auth::check() && Auth::user()->role->accesses->where('access','create client')->count() > 0){
            return $next($request);
        }

        return redirect('/login');


    }
}
