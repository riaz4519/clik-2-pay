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

        $user_role = Auth::user()->role->name;
        if (Auth::guard($guard)->check() && $user_role == 'admin') {
            return redirect('/admin');
        }
        else if (Auth::guard($guard)->check() && $user_role== 'accountant'){

            return redirect('/accountant');
        }
        else if (Auth::guard($guard)->check() ){
            return redirect('/users/'.$user_role);

        }

        return $next($request);
    }
}
