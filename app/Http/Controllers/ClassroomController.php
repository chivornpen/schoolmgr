<?php

namespace App\Http\Controllers;

use App\Classroom;
use App\Turn;
use App\Year;
use Illuminate\Http\Request;
use Auth;

class ClassroomController extends Controller
{
    public function create()
    {
        $classroom = Classroom::where('active',1)->get();
        $turn = Turn::where('active',1)->pluck('name','id');
        $year = Year::where('active',1)->pluck('name','id');
        return view('admin.classroom.create',compact('classroom','turn','year'));
    }
    public function stored(Request $request)
    {
        $this->validate($request,[
            'name'       =>'required',
            'description'   =>'required',
            'turn_id' =>'required',
            'year_id' =>'required'
        ],[
            'name.required' =>'Position name required',
            'description.required' =>'Description required',
            'turn_id.required' =>'Session required',
            'year_id.required' =>'Session required'
        ]);
        $classroom = new Classroom();
        $classroom->name = $request->name;
        $classroom->description = $request->description;
        $classroom->turn_id = $request->turn_id;
        $classroom->year_id = $request->year_id;
        $classroom->user_id = Auth::user()->id;
        $classroom->save();
        return redirect('/admin/classroom/create');
    }
    public function deleteClassroom($id)
    {
        $classroom = Classroom::findOrFail($id);
        $classroom->delete();
    }
    public function edit($id)
    {
        $cr = Classroom::find($id);
        $t = Turn::where('active',1)->pluck('name','id');
        $y = Year::where('active',1)->pluck('name','id');
        return view('admin.classroom.edit',compact('cr','t','y'));
    }
    public function updateClassroom(Request $request, $id)
    {
        $cr = Classroom::find($id);
        $cr->name = $request->name;
        $cr->description = $request->description;
        $cr->turn_id = $request->turn_id;
        $cr->year_id = $request->year_id;
        $cr->save();
        return redirect('/admin/classroom/create');
    }
}
