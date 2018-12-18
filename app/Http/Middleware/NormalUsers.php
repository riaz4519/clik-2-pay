<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class NormalUsers
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

        $user_role = Auth::user()->role->name;

        if (Auth::check() && $user_role !='admin' && $user_role !='accountant'){

            return $next($request);
        }

        return redirect('/login');
    }
}
