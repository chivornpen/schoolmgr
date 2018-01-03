<?php

namespace App\Http\Controllers;
use App\Year;
use App\User;
use Illuminate\Http\Request;
use Auth;
class YearController extends Controller
{
    public function create()
    {
        $years = Year::where('active',1)->get();
        return view('admin.year.create',compact('years'));
    }
    public function stored(Request $request)
    {
        $this->validate($request,[
           'name'       =>'required',
           'description'   =>'required'
        ],[
            'name.required' =>'Year name required',
            'description.required' =>'Description required'
        ]);
        $year = new Year();
        $year->name = $request->input('name');
        $year->description = $request->input('description');
        $year->user_id = Auth::user()->id;
        $year->save();
        return redirect('/admin/year/create');
    }
    
    public function edit($id)
    {
        $y = Year::find($id);
        return view('admin.year.edit',compact('y'));
    }
    public function updateYear(Request $request, $id)
    {
        $year = Year::find($id);
        $year->name = $request->name;
        $year->description = $request->description;
        $year->save();
        return redirect('/admin/year/create');
    }
    public function deleteYear($id)
    {
        $year = Year::findOrFail($id);
        $year->delete();
        return redirect()->back();
    }
}
