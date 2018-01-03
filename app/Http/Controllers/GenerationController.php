<?php

namespace App\Http\Controllers;

use App\Generation;
use Illuminate\Http\Request;
use Auth;

class GenerationController extends Controller
{
    public function create()
    {
        $generation = Generation::where('active',1)->get();
        return view('admin.generation.create',compact('generation'));
    }
    public function stored(Request $request)
    {
        $this->validate($request,[
            'name'       =>'required',
            'description'   =>'required'
        ],[
            'name.required' =>'Generation name required',
            'description.required' =>'Description required'
        ]);
        $year = new Generation();
        $year->name = $request->input('name');
        $year->description = $request->input('description');
        $year->user_id = Auth::user()->id;
        $year->save();
        return redirect('/admin/generation/create');
    }
    public function edit($id)
    {
        $g = Generation::find($id);
        return view('admin.generation.edit',compact('g'));
    }
    public function updateG(Request $request, $id)
    {
        $year = Generation::find($id);
        $year->name = $request->name;
        $year->description = $request->description;
        $year->save();
        return redirect('/admin/generation/create');
    }
    public function deleteGeneration($id)
    {
        $year = Generation::findOrFail($id);
        $year->delete();
        return redirect()->back();
    }
}
