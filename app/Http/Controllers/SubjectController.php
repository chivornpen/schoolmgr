<?php

namespace App\Http\Controllers;

use App\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    public function create()
    {
        $subject = Subject::where('active',1)->get();
        return view('admin.subject.create',compact('subject'));
    }
    public function stored(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
        ],[
            'name.required' => 'Subject Name Required',
        ]);
        $sub = new Subject();
        $sub->name = $request->input('name');
        $sub->description = $request->input('description');
        $sub->user_id = Auth::user()->id;
        $sub->active = 1;
        $sub->save();
        return redirect('/admin/subject/create');
    }
    public function edit($id)
    {
        $s = Subject::find($id);
        return view('admin.subject.edit',compact('s'));
    }
    public function updateSubject(Request $request,$id)
    {
        $sub = Subject::findOrFail($id);
        $sub->name = $request->input('name');
        $sub->description = $request->input('description');
        $sub->save();
        return redirect('/admin/subject/create');
    }
    public function delete($id)
    {
        $sub = Subject::findOrFail($id);
        $sub->active = 0;
        $sub->save();
        return redirect('/admin/subject/create');
    }
}
