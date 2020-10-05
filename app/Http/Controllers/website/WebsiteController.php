<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Seminar;
use App\Student;
use App\AdmissionStatus;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Session;
use Image;
use Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Input;

class WebsiteController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
    	$allSeminar=Seminar::all();
        return view('website.dashboard.index',compact('allSeminar'));
    }

    public function show($id){
        $email=Student::where('seminar_id',$id)->get('email');
        // $allSeminar=Seminar::orderBy('id','DESC')->get($id);
        $allSeminar=Seminar::where('id',$id)->firstOrFail();
        $allStatus=AdmissionStatus::where('status',1)->get();
        return view ('website.seminar.details',compact('allSeminar','allStatus'));
    }

    public function insert(Request $request, $id, Student $student)
    {  
        $email=Student::where('email',$request->email)->where('seminar_id',$id)->get();
      
        foreach ($email as $value) {
            if($value->email==$request->email){
                Session::flash('error', 'Seminar request sent Failed because you are allready registered this seminar');
                return redirect()->back();
            }
        }


        if($request->hasFile('image')){
            $image=$request->file('image');
            $studentName=Str::slug($request->name);
            $imageName=$studentName.'_'.Carbon::today()->toDateString().'.'.$image->getClientOriginalExtension();
            if(!Storage::disk('public')->exists('student')){
                Storage::disk('public')->makeDirectory('student');
            }
            Image::make($image)->save(public_path('storage/student/'.$imageName));
        }

        $student=new Student();
        $student->seminar_id=$request->seminar_id;
        $student->name=$request->name;
        $student->email=$request->email;
        $student->phone=$request->phone;
        $student->seminar_id=$request->seminar_id;
        $student->admission_status=$request->admission_status;
        $student->image=$imageName;
        $student->save();

        Session::flash('success', 'Seminar request sent successful');
        return redirect()->back();
        
    }

}
