<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
// use Auth;

class Teacher
{
    public function handle($request, Closure $next)
    {
        // Login chara keu access korte chaile take kothay pathano hobe sei kaj ta ai khane kore.

        if(Auth::check() && Auth::user()->role_id == 1){
        	return $next($request);
    	}elseif (Auth::user()->role_id == 2) {
        return $next($request);
      }
    	return redirect('login')->with('error',"You don't have access this site.");
    }
}
