<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Notification;
use App\Notifications\SeminarRequestApprove;
use App\Notifications\SeminarRequestReject;
use Carbon\Carbon;
use Session;
use Image;
use Storage;


class StudentController extends Controller
{
    
    public function index()
    {
        $allStudent=Student::orderBy('id','DESC')->get();
        // return $allStudent;
        return view('admin.student.all',compact('allStudent'));
    }

    
    public function create()
    {
        
    }

    
    // public function store(Request $request)
    // {
    //     if($request->hasFile('image')){
    //         $image=$request->file('image');
    //         $studentName=Str::slug($request->name);
    //         $imageName=$studentName.'_'.Carbon::today()->toDateString().'.'.$image->getClientOriginalExtension();
    //         if(!Storage::disk('public')->exists('student')){
    //             Storage::disk('public')->makeDirectory('student');
    //         }

    //         Image::make($image)->save(public_path('storage/student/'.$imageName));
    //     }

    //     $student=new Student();
    //     $student->seminar_id=$request->seminar_id;
    //     $student->name=$request->name;
    //     $student->email=$request->email;
    //     $student->phone=$request->phone;
    //     $student->seminar_id=$request->seminar_id;
    //     $student->admission_status=$request->admission_status;
    //     $student->image=$imageName;
    //     $student->save();

    //     Session::flash('success', 'Seminar request sent successful');
    //     return redirect()->back();
    //     Session::flash('error', 'Seminar request sent Failed');
    //     return redirect()->back();

    // }

    
    public function show(Student $student)
    {
        return view('admin.student.show',compact('student'));
    }

    
    public function edit(Student $student)
    {
        
    }

    
    public function update(Request $request, Student $student)
    {
        
    }

    
    public function destroy(Student $student)
    {
        $student->delete();

        Session::flash('success', 'Student deleted successful');
        return redirect()->back();
        Session::flash('error', 'Student deleted failed');
        return redirect()->back();
    }

    public function status($id)
    {
        $student=Student::find($id);
        if($student->status==false)
        {
            $student->status=true;
            $student->save();

            $student->notify(new SeminarRequestApprove($student));

            Session::flash('success', 'Student request successfully approved');
            return back();
        }else
        {
            $student->status=false;
            $student->save();

            $student->notify(new SeminarRequestReject($student));
            
            Session::flash('success', 'Student request successfully deny');
            return back();
        }
    }
}
