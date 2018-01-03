<?php

namespace App\Http\Controllers;

use App\Turn;
use Illuminate\Http\Request;
use Auth;

class TurnController extends Controller
{
    public function create()
    {
        $turn = Turn::where('active',1)->get();
        return view('admin.turn.create',compact('turn'));
    }
    public function stored(Request $request)
    {
        $this->validate($request,[
            'name'       =>'required',
            'description'   =>'required'
        ],[
            'name.required' =>'Turn name required',
            'description.required' =>'Description required'
        ]);
        $year = new Turn();
        $year->name = $request->input('name');
        $year->description = $request->input('description');
        $year->user_id = Auth::user()->id;
        $year->save();
        return redirect('/admin/session/create');
    }
    public function edit($id)
    {
        $t = Turn::find($id);
        return view('admin.turn.edit',compact('t'));
    }
    public function updateTurn(Request $request, $id)
    {
        $year = Turn::find($id);
        $year->name = $request->name;
        $year->description = $request->description;
        $year->save();
        return redirect('/admin/session/create');
    }
    public function deleteTurn($id)
    {
        $year = Turn::findOrFail($id);
        $year->delete();
        return redirect()->back();
    }
}
