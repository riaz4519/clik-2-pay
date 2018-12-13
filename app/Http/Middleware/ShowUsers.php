<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ShowUsers
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
        $have_access = false;

        if (Auth::check()){

            foreach (Auth::user()->role->accesses as $access) {

                if ($access->access == 'show users'){


                    $have_access = true;
                }

            }


        }else{

            return redirect('/login');
        }


        if ($have_access){

            return $next($request);
        }else{

            return redirect()->back();
        }
    }
}
