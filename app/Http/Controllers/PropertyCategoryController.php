<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PropertyCategory;

class PropertyCategoryController extends Controller
{
    public function index(){
        $types = PropertyCategory::all();
        return view('propertycategory.index',compact('types'));
    }

    public function create(){
        return view('propertycategory.create');
    }

    public function store(Request $request){
        PropertyCategory::create($request->all());
        return redirect('/propertycategories');
    }

    public function show($id){
        $types = PropertyCategory::findorFail($id);
        return view('propertycategory.show',compact('types'));
    }

    public function edit($id){
        $types = PropertyCategory::findorFail($id);
        return view('propertycategory.edit',compact('types'));
    }

    public function update(Request $request, $id){
        $types = PropertyCategory::findorFail($id);
        $types->update($request->all());
        return redirect('/propertycategories');
    }

    public function destroy(Request $req){
        PropertyCategory::find($req->id)->delete();
        return redirect('/propertycategories');
    } 
}
