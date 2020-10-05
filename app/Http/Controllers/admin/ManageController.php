<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Teacher;
use App\Student;
use App\Course;
use App\Seminar;

class ManageController extends Controller
{
    public function index(){
    	$allUserRecycle=User::onlyTrashed()->count();
    	$allUser=User::all()->count();
    	$allTeacher=Teacher::all()->count();
    	$allStudent=Student::all()->count();
    	$allCourse=Course::all()->count();
    	$allSeminar=Seminar::all()->count();
    	return view('admin.manage.index',compact('allUserRecycle','allUser','allTeacher','allStudent','allCourse','allSeminar'));
    }
}
