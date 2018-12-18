<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {


        if (Auth::guard($guard)->check() && Auth::user()->role->name == 'admin') {
            return redirect('/admin');
        }
        else if (Auth::guard($guard)->check() && Auth::user()->role->name== 'accountant'){

            return redirect('/accountant');
        }
        else if (Auth::guard($guard)->check() ){
            return redirect('/users/'.Auth::user()->role->name);

        }

        return $next($request);
    }
}
