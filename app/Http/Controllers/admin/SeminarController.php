<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Seminar;
use App\Course;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Storage;
use Image;
use Session;

class SeminarController extends Controller
{
    
    public function index()
    {
        $allSeminar=Seminar::where('status',1)->orderBy('id','DESC')->get();
        return view('admin.seminar.all',compact('allSeminar'));
    }

    public function create()
    {
        $allCourse=Course::where('status',1)->get();
        $allTeacher=Teacher::where('status',1)->get();
        return view('admin.seminar.add',compact('allCourse','allTeacher'));
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'date'=> ['required'],
            'time' => ['required'],
            'course' => ['required'],
            'teacher_id' => ['required'],
            'image'=> ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048'],
        ]);

        if($request->hasFile('image')){
            $image=$request->file('image');
            $seminarName=Str::slug($request->title);
            $imageName=$seminarName.'_'.Carbon::today()->toDateString().'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('seminar')){
                Storage::disk('public')->makeDirectory('seminar');
            }
            Image::make($image)->save(public_path('storage/seminar/'.$imageName));
        }

        $seminar=new Seminar();
        $seminar->title=$request->title;
        $seminar->date=$request->date;
        $seminar->time=$request->time;
        $seminar->course=$request->course;
        $seminar->teacher_id=$request->teacher_id;
        $seminar->image=$imageName;
        $seminar->save();

        $insert=Seminar::where('id',$seminar->id)->update([
            'code'=>'DIU'.'-'.$request['course'].'-'.$seminar->id,
        ]);

        if($insert){
            Session::flash('success', 'New seminar create successful');
            return redirect()->back();
        }else{
            Session::flash('error', 'New seminar create failed');
            return redirect()->back();
        }

    }
    
    public function show(Seminar $seminar)
    {
        return view('admin.seminar.show',compact('seminar'));
    }

    
    public function edit(Seminar $seminar)
    {
        $allCourse=Course::where('status',1)->get();
        $allTeacher=Teacher::where('status',1)->get();
        return view('admin.seminar.edit',compact('seminar','allCourse','allTeacher'));
    }

    
    public function update(Request $request, Seminar $seminar)
    {
        if($request->hasFile('image')){
            $image=$request->file('image');
            $seminarName=Str::slug($request->title);
            $imageName=$seminarName.'_'.Carbon::today()->toDateString().'.'.$image->getClientOriginalExtension();

            if(Storage::disk('public')->exists('seminar/'.$seminar->image)){
                Storage::disk('public')->delete('seminar/'.$seminar->image);
            }
            Image::make($image)->save(public_path('storage/seminar/'.$imageName));
        }else{
            $imageName=$seminar->image;
        }

        $seminar->title=$request->title;
        $seminar->date=$request->date;
        $seminar->time=$request->time;
        $seminar->teacher_id=$request->teacher_id;
        $seminar->image=$imageName;
        $seminar->save();

        Session::flash('success', 'Seminar updated successful');
        return redirect()->back();
        Session::flash('error', 'Seminar updated failed');
        return redirect()->back();

        // $insert=Seminar::where('id',$seminar->id)->update([
        //     'code'=>'DIU'.'-'.$request['course'].'-'.$seminar->id,
        // ]);

        // if($insert){
        //     Session::flash('success', 'Seminar updated successful');
        //     return redirect()->back();
        // }else{
        //     Session::flash('error', 'Seminar updated failed');
        //     return redirect()->back();
        // }
    }

    
    public function destroy(Seminar $seminar)
    {
        $seminar->delete();

        Session::flash('success', 'Seminar delete successful');
        return redirect()->back();
        Session::flash('error', 'Seminar delete failed');
        return redirect()->back();
    }
}
