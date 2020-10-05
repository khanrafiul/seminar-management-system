<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use App\Notifications\UserRegistration;
use Illuminate\Support\Str;
use Image;
use Storage;
use Carbon\Carbon;
use Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    
    protected $redirectTo = RouteServiceProvider::HOME;

    
    public function __construct()
    {
        $this->middleware('guest');
    }

    
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email'=> ['required', 'string', 'email', 'max:255', 'unique:users'],
            'image'=> ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
            'password'=> ['required', 'string', 'min:8', 'confirmed'],
        ]);

        
    }

    protected function create(array $data)
    {
        $request = app('request');
        if($request->hasFile('image')){
        $image=$request->file('image');
        $userName=Str::slug($request->name);
        $imageName=$userName.'_'.Carbon::today()->toDateString().'.'.$image->getClientOriginalExtension();
        if(!Storage::disk('public')->exists('user')){
            Storage::disk('public')->makeDirectory('user');
        }
        Image::make($image)->save(public_path('storage/user/'.$imageName));
        }

        $create=User::create([
            'name'      => $data['name'],
            'email'     => $data['email'],
            'image'     => $imageName,
            'password'=>Hash::make($data['password']),
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

        $user=User::where('role_id',1)->get();
        Notification::send($user, new UserRegistration ($create));

        if($create){
            Session::flash('success', 'User Registration Success');
            return redirect()->back();
        }else{
            Session::flash('error', 'User Registration Failed');
            return redirect()->back();
        }
    }
}
