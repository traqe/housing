<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BusinessCentre;
use App\Ward;

class BusinessCentreController extends Controller
{
    public function index(){

        $buscentre = BusinessCentre::all();
        return view('buscentre.index',compact('buscentre'));
    }

    public function create(){
        $wards = Ward::all();
        return view('buscentre.create',compact('wards'));
    }

    public function store(Request $request){
        BusinessCentre::create($request->all());
        return redirect('Buscentre');
    }

    public function update(Request $request, $id){
        $buscentre = BusinessCentre::findorFail($id);
        return redirect('buscentre');
    }

    public function show(){
        $buscentre = BusinessCentre::findorFail($id);
        return view('buscentre.show',compact('buscentre'));
    }

    public function edit($id){
        $wards = Ward::all();
        $buscentre = BusinessCentre::findorFail($id);
        return view('buscentre.edit',compact('buscentre','wards'));
    }
}
