<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PropertyType;

class PropertyTypeController extends Controller
{
    public function index(){
        $types = PropertyType::all();
        return view('propertytype.index',compact('types'));
    }

    public function create(){
        return view('propertytype.create');
    }

    public function store(Request $request){
        PropertyType::create($request->all());
        return redirect('/propertytypes');
    }

    public function show($id){
        $types = PropertyType::findorFail($id);
        return view('propertytype.show',compact('types'));
    }

    public function edit($id){
        $types = PropertyType::findorFail($id);
        return view('propertytype.edit',compact('types'));
    }

    public function update(Request $request, $id){
        $types = PropertyType::findorFail($id);
        $types->update($request->all());
        return redirect('/propertytypes');
    }

    public function destroy(Request $req){
        PropertyType::find($req->id)->delete();
        return redirect('/propertytypes');
    }
}
