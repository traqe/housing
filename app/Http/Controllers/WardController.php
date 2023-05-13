<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ward;

class WardController extends Controller
{
    public function index(){

        $wards = Ward::all();
        return view('wards.index',compact('wards'));
    }

    public function create(){

        return view('wards.create');
    }

    public function store(Request $request){
        Ward::create($request->all());
        return redirect('/wards');
    }

    public function update(Request $request,$id){
        $wards = Ward::findorFail($id);
        $wards->update($request->all());
        return redirect('wards');
    }

    public function show($id){
        $wards = Ward::findorFail($id);
        return view('wards.show',compact('wards'));
    }

    public function edit($id){
        $ward = Ward::findorFail($id);
        return view('wards.edit',compact('ward'));
    }
}
