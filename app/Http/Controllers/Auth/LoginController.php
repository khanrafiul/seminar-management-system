<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

   
    // protected $redirectTo = RouteServiceProvider::HOME;
    // protected $redirectTo='admin';
    // protected $redirectTo;

    protected function redirectTo()
    {
        if(Auth::User()->role_id == 1){
            return route('admin/dashboard');
            // return 'admin';
        }
        elseif (Auth::User()->role_id == 2) {
            return route('admin/dashboard');
        }
        else{
            return route('website/dashboard');
        }
    }

    
    public function __construct()
    {
        // if(Auth::check() && Auth::user()->role_id==1){
        //     $this->redirectTo='admin';
        // }elseif (Auth::check() && Auth::user()->role_id==2) {
        //     $this->redirectTo='admin';
        // }else{
        //     $this->redirectTo='website';
        // }

        $this->middleware('guest')->except('logout');
    }
}
