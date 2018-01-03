<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {

        $category = Category::where('parent',0)->pluck('name','id');
        return view('admin.posting.category',compact('category'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        $this->validate($request,[
            'categoryName' =>'required',
            'parent'       =>'required',
        ],[
            'categoryName' =>'Category required',
        ]);

        return redirect()->back();
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
