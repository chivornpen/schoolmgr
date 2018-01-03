<?php

namespace App\Http\Controllers;

use App\Position;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Module;

class PositionController extends Controller
{

    public function createPosition(){
        $position = Position::all();
        $modules = Module::all();
        return view('admin.position.create',compact('position','modules'));
    }

    public function store(Request $request){
        $this->validate($request,[
           'name'       =>'required',
           'description'   =>'required'
        ],[
            'name.required' =>'Position name required',
            'description.required' =>'Display name required'
        ]);

        $position = new Position();
        $position->name = $request->input('name');
        $position->description = $request->input('description');
        $position->user_id = Auth::user()->id;
        $position->save();
        $position->modules()->attach($request->module);
        return redirect('/admin/position/create');

    }
    public function edit($id){
        $p =Position::find($id);
        $modules=Module::all();
		$moduleA=array();
		foreach($modules as $module){
				$moduleA[$module->id]=$module->name;
		}
        return view('admin.position.edit',compact('p','moduleA'));

    }

    public function updatePosition(Request $request,$id){
        $position = Position::find($id);
        $position->name=$request->input('name');
        $position->description=$request->input('description');
        $position->save();
        return redirect('/admin/position/create');
    }

    public function deletePosition($id){

        $p=Position::find($id);
        $p->delete();
        return redirect('/admin/position/create');
    }


}
