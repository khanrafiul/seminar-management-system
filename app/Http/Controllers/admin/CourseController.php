<?php

namespace App\Http\Controllers\admin;

use App\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class CourseController extends Controller
{
    
    public function index()
    {
        $allCourse=Course::orderBy('id','DESC')->get();
        return view('admin.course.all',compact('allCourse'));
    }

    
    public function create()
    {
        return view('admin.course.add');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ],[
            'name.required'   =>'Please enter course name',
        ]);

        $course=new Course();
        $course->name=$request->name;
        $course->status=(boolean)$request->status;
        $course->save();

        Session::flash('success', 'New course added successful');
        return redirect()->back();
        Session::flash('error', 'New course added Failed');
        return redirect()->back();
    }

    
    public function show(Course $course)
    {
        return view('admin.course.show',compact('course'));
    }

    
    public function edit(Course $course)
    {
        return view('admin.course.edit',compact('course'));
    }

    
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ],[
            'name.required'   =>'Please enter course name',
        ]);

        $course->name=$request->name;
        $course->status=(boolean)$request->status;
        $course->save();

        Session::flash('success', 'Course name edit successful');
        return redirect()->back();
        Session::flash('error', 'Course name edit Failed');
        return redirect()->back();
    }

    
    public function destroy(Course $course)
    {
        $course->delete();

        Session::flash('success', 'Course deleted successful');
        return redirect()->back();
        Session::flash('error', 'Course deleted failed');
        return redirect()->back();
    }
}
