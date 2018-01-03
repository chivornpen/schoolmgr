<?php

namespace App\Http\Controllers;

use App\Subject;
use Illuminate\Http\Request;
use App\Teacher;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function create()
    {
        $teacher = Teacher::where('active',1)->get();
        $subject = Subject::where('active',1)->pluck('name','id');
        return view('admin.teacher.create',compact('teacher','subject'));
    }
    public function stored(Request $request)
    {
//        dd($request->all());
        $this->validate($request,[
            'name'=> 'required',
            'gender' => 'required',
            'education' => 'required',
            'phoneNum' =>'required',
            'address' =>'required',
            'subject' =>'required',
            'email' => 'unique:teachers'
        ],[
            'name.required' => 'Teacher\'s name required',
            'gender.required' => 'Please choose one gender',
            'education.required' =>'Education required',
            'phoneNum.required' =>'Contact number required',
            'address.required' =>'Address required',
            'subject.required' =>'Please choose one or more subject',
            'email.unique' => 'This email have already'
        ]);
            $teacher = new Teacher();
            $teacher->name = $request->input('name');
            $teacher->gender = $request->input('gender');
            $teacher->education = $request->input('education');
            $teacher->phoneNum = $request->input('phoneNum');
            $teacher->address = $request->input('address');
            $teacher->email = $request->input('email');
            $teacher->salaryPerHour = $request->input('salaryPerHour');
            $teacher->salaryPerMonth = $request->input('salaryPerMonth');
            $teacher->user_id = Auth::user()->id;
            $teacher->save();
            $teacher->subjects()->attach($request->input('subject'));
            return redirect('/admin/teacher/create');
    }
    public function edit($id)
    {
        $t = Teacher::findOrFail($id);
        $sub = Subject::where('active',1)->pluck('name','id');
        return view('admin.teacher.edit',compact('t','sub'));
    }
    public function updateTeacher(Request $request,$id)
    {
        $t = Teacher::findOrFail($id);
        $t->name = $request->input('name');
        $t->name = $request->input('name');
        $t->gender = $request->input('gender');
        $t->education = $request->input('education');
        $t->phoneNum = $request->input('phoneNum');
        $t->address = $request->input('address');
        $t->email = $request->input('email');
        $t->salaryPerHour = $request->input('salaryPerHour');
        $t->salaryPerMonth = $request->input('salaryPerMonth');
        $t->user_id = Auth::user()->id;
        $t->save();
        $t->subjects()->detach();
        $t->subjects()->attach($request->input('subject'));
        return redirect('/admin/teacher/create');
    }
}
