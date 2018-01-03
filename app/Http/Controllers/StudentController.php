<?php

namespace App\Http\Controllers;

use App\Classroom;
use App\Generation;
use App\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function create()
    {
        $student = Student::where('active',1)->get();
        $generation = Generation::where('active',1)->pluck('name','id');
        $classroom = Classroom::where('active',1)->pluck('name','id');
        return view('admin.student.create',compact('student','generation','classroom'));
    }
    public function stored(Request $request)
    {

        $this->validate($request,[
            'khName'        =>'required',
            'enName'        =>'required',
            'gender'        =>'required',
            'dob'           =>'required',
            'phoneNum'      =>'required|min:9',
            'perantNum'     =>'required|min:9',
            'lob'           =>'required',
            'address'       =>'required',
            'generation'    =>'required',
            'classroom'     =>'required',
            'image'         =>'image|mimes:jpeg,png'
        ],[
            'khName.required'        =>'field Khmer Name required',
            'enName.required'        =>'field English Name required',
            'gender.required'        =>'please choose one gender',
            'dob.required'           =>'field date of birth required',
            'phoneNum.required'      =>'field phone number required',
            'perantNum.required'     =>'field parent number required',
            'lob.required'           =>'field location of birth required',
            'address.required'       =>'field address required',
            'generation.required'    =>'please choose one generation',
            'classroom.required'     =>'please choose one classroom or more',
            'image.image'            =>'only image'
        ]);
//        dd($request->all());
        $time =Carbon::now()->toDateString();
        $name="default_user.png";
        if($file =$request->file('image')){
            $name=$time."_".$file->getClientOriginalName();
            $file->move('photo/students',$name);
        }

        $student = new Student();
        $student->khName        = $request->input('khName');
        $student->enName        = $request->input('enName');
        $student->gender        = $request->input('gender');
        $student->dob           = $request->input('dob');
        $student->ssid          = $request->input('ssid');
        $student->phoneNum      = $request->input('phoneNum');
        $student->email         = $request->input('email');
        $student->perantNum     = $request->input('perantNum');
        $student->lob           = $request->input('lob');
        $student->address       = $request->input('address');
        $student->photo         = $name;
        $student->active        =1;
        $student->generation_id = $request->input('generation');
        $student->user_id       = Auth::user()->id;
        $student->save();
        $cra = array();
        $cra = $request->input('classroom');

        $student->classrooms()->attach($cra);
        return redirect()->back();
    }
    public function getTableStudent()
    {
        $st = Student::where('active',1)->get();
        return view('admin.student.getTableStudent',compact('st'));
    }
    public function deleteStudent($id)
    {
        $student = Student::findOrFail($id);
        $student->active = 0;
        $student->save();
    }
    public function edit($id)
    {
        $st = Student::find($id);
        $ge = Generation::where('active',1)->pluck('name','id');
        $cr = Classroom::where('active',1)->pluck('name','id');
        return view('admin.student.edit',compact('st','ge','cr'));
    }
    public function update(Request $request,$id)
    {
        $time =Carbon::now()->toDateString();
        $ds = DIRECTORY_SEPARATOR;
        $student = Student::findOrFail($id);
        $oldName = $student->photo;
        $student->khName        = $request->input('khName');
        $student->enName        = $request->input('enName');
        $student->gender        = $request->input('gender');
        $student->phoneNum      = $request->input('phoneNum');
        $student->generation_id = $request->input('generation_id');
        if($file =$request->file('imageEdit')){
            if($oldName!="default_user.png"){
                unlink(public_path('photo/students'.$ds.$oldName));
            }
            $name=$time."_".$file->getClientOriginalName();
            $file->move('photo/students',$name);
            $student->photo = $name;
        }
        $student->save();
        $cra = array();
        $cra = $request->input('classroom');
        $student->classrooms()->detach();
        $student->classrooms()->attach($cra);
        return redirect()->back();
    }
    public function view($id)
    {
        $st = Student::findOrFail($id);
        return view('admin.student.view',compact('st'));
    }
}
