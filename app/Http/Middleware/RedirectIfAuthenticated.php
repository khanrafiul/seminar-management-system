<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    public function handle($request, Closure $next, $guard = null)
    {
        // if (Auth::guard($guard)->check() && Auth::User()->role_id == 1) {
        //     return redirect('admin')->with('error',"You don't access website");
        // }

        if (Auth::guard($guard)->check() && Auth::User()->role_id == 2) {
            return redirect('admin')->with('error',"You don't access website");
            
        }elseif (Auth::guard($guard)->check() && Auth::User()->role_id == 3){
            return redirect('website')->with('error',"You don't access admin");
        }
        else{
            return $next($request);
        }


        // default

        // if (Auth::guard($guard)->check()) {
        //     return redirect('/home');
        // }

        // return $next($request);


    }
}
