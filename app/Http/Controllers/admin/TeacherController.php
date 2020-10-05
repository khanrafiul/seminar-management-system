<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Teacher;
use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Session;
use Image;
use Storage;

class TeacherController extends Controller
{
    
    public function index()
    {
        $allTeacher=Teacher::orderBy('id','DESC')->get();
        return view('admin.teacher.all',compact('allTeacher'));
    }

    
    public function create()
    {
        $allCourse=Course::where('status',1)->get();
        return view('admin.teacher.add',compact('allCourse'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email'=> ['required', 'string', 'email', 'max:255', 'unique:teachers'],
            'phone'=> ['required', 'min:10', 'numeric', 'unique:teachers'],
            'course' => ['required'],
            'image'=> ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
        ]);

        if($request->hasFile('image')){
            $image=$request->file('image');
            $teacherName=Str::slug($request->name);
            $imageName=$teacherName.'_'.Carbon::today()->toDateString().'.'.$image->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('teacher')){
                Storage::disk('public')->makeDirectory('teacher');
            }
            Image::make($image)->save(public_path('storage/teacher/'.$imageName));
        }

        $teacher=new Teacher();
        $teacher->name=$request->name;
        $teacher->email=$request->email;
        $teacher->phone=$request->phone;
        $teacher->course_id=$request->course;
        $teacher->image=$imageName;
        $teacher->save();

        Session::flash('success', 'Teacher add successful');
        return redirect()->back();
        Session::flash('error', 'Teacher add Failed');
        return redirect()->back();
    }

    
    public function show(Teacher $teacher)
    {
        return view('admin.teacher.show',compact('teacher'));
    }

    
    public function edit(Teacher $teacher)
    {
        $allCourse=Course::where('status',1)->get();
        return view('admin.teacher.edit',compact('teacher','allCourse'));
    }

    
    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'course' =>['required'],
            'image'=> ['nullable','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
        ]);

        if($request->hasFile('image')){
            $image=$request->file('image');
            $teacherName=Str::slug($request->name);
            $imageName=$teacherName.'_'.Carbon::today()->toDateString().'.'.$image->getClientOriginalExtension();
            if(Storage::disk('public')->exists('teacher/'.$teacher->image)){
                Storage::disk('public')->delete('teacher/'.$teacher->image);
            }
            Image::make($image)->save(public_path('storage/teacher/'.$imageName));
        }else{
            $imageName=$teacher->image;
        }

        $teacher->name=$request->name;
        $teacher->course_id=$request->course;
        $teacher->image=$imageName;
        $teacher->save();

        Session::flash('success', 'Teacher edit successful');
        return redirect()->back();
        Session::flash('error', 'Teacher edit Failed');
        return redirect()->back();
    }

    
    public function destroy(Teacher $teacher)
    {
        $teacher->delete();

        Session::flash('success', 'Teacher deleted successful');
        return redirect()->back();
        Session::flash('error', 'Teacher deleted failed');
        return redirect()->back();
    }

    public function status($id)
    {
        $teacher=Teacher::find($id);
        if($teacher->status==false)
        {
            $teacher->status=true;
            $teacher->save();
            Session::flash('success', 'Teacher request successfully approved');
            return back();
        }else
        {
            $teacher->status=false;
            $teacher->save();
            Session::flash('success', 'Teacher request successfully deny');
            return back();
        }
    }
}
