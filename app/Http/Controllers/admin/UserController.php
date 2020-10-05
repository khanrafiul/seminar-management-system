<?php

namespace App\Http\Controllers\admin;

use App\Notifications\OuterUserRegistration;
use App\Http\Controllers\Controller;
use App\User;
use App\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use App\Notifications\UserApprove;
use App\Notifications\UserReject;
use Carbon\Carbon;
use Session;
use Image;
use Storage;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index()
    {
        $allUser=User::orderBy('id','DESC')->get();
        return view('admin.user.all',compact('allUser'));
    }

    
    public function create()
    {
        $allRole=UserRole::where('status',1)->get();
        return view('admin.user.add',compact('allRole'));
    }

    
    public function store(Request $request)
    {
        // $this->validate($request,[
        //     'name'=>['required', 'string', 'max:255'],
        //     'email'=>['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'role'=>['required'],
        //     'image'=>['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
        //     'password'=>['required', 'string', 'min:8', 'confirmed'],
        // ]);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email'=> ['required', 'string', 'email', 'max:255', 'unique:users'],
            'role' => ['required'],
            'image'=> ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
            'password'=> ['required', 'string', 'min:8', 'confirmed'],
        ],[
            'name.required'   =>'Please enter your name',
            'email.required'  =>'Please enter your valid email',
            'role.required'   =>'Please select user role',
            'image.required'  =>'Please select user image',
        ]);

        if($request->hasFile('image')){
            $image=$request->file('image');
            $userName=Str::slug($request->name);
            $imageName=$userName.'_'.Carbon::today()->toDateString().'.'.$image->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('user')){
                Storage::disk('public')->makeDirectory('user');
            }
            Image::make($image)->save(public_path('storage/user/'.$imageName));
        }
        // else{
        //     $user->image=Null;
        // }

        $user= new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->role_id=$request->role;
        $user->image=$imageName;
        $user->password=Hash::make($request->password);
        $user->save();

        Session::flash('success', 'User Registration Success');
        return redirect()->back();
        Session::flash('error', 'User Registration Failed');
        return redirect()->back();
    }

    
    public function show(User $user)
    {
        return view('admin.user.show',compact('user'));
    }

    
    public function edit(User $user)
    {
        $allRole=UserRole::where('status',1)->get();
        return view('admin.user.edit',compact('user','allRole'));
    }

    
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'image'=> ['nullable','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
        ]);

        if($request->hasFile('image')){
            $image=$request->file('image');
            $userName=Str::slug($request->name);
            $imageName=$userName.'_'.Carbon::today()->toDateString().'.'.$image->getClientOriginalExtension();
            if(Storage::disk('public')->exists('user/'.$user->image)){
                Storage::disk('public')->delete('user/'.$user->image);
            }
            Image::make($image)->save(public_path('storage/user/'.$imageName));
        }
        else{
            $imageName=$user->image;
        }

        $user->name=$request->name;
        $user->image=$imageName;
        $user->save();

        Session::flash('success', 'User information update success');
        return redirect()->back();
        Session::flash('error', 'User information update Failed');
        return redirect()->back();
    }

    
    public function destroy(User $user)
    {
        $user->delete();

        Session::flash('success', 'User softdelete success');
        return redirect()->back();
        Session::flash('error', 'User softdelete failed');
        return redirect()->back();
    }

    public function status($id)
    {
        $users=User::find($id);
        if($users->status==false)
        {
            $users->status=true;
            $users->save();

            $users->notify(new UserApprove($users));

            Session::flash('success', 'User Request successfully approved');
            return back();
        }else
        {
            $users->status=false;
            $users->save();

            $users->notify(new UserReject($users));

            Session::flash('success', 'User Request successfully deny');
            return back();
        }
    }

}
