<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Session;

class UserRecycleController extends Controller
{
    public function index(){
    	$allRecycleUser=User::onlyTrashed()->latest()->get();
    	return view('admin.userRecycle.all',compact('allRecycleUser'));
    }

    public function show($id){
    	$recycleUserShow=User::onlyTrashed()->findOrFail($id);
    	return view('admin.userRecycle.show',compact('recycleUserShow'));
    }

    public function restore($id){
      $userRestore=User::onlyTrashed()->findOrFail($id);
      $userRestore->restore();

      Session::flash('success', 'User Restore Success');
      return back();
      Session::flash('error', 'User Restore Failed');
      return back();
    }


    public function delete($id){
      $userDelete=User::onlyTrashed()->findOrFail($id);
      $userDelete->forceDelete();

      Session::flash('success', 'User Permanently Delete Success');
      return back();
      Session::flash('error', 'User Permanently Delete Failed');
      return back();
    }
}
