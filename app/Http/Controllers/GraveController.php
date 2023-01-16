<?php

namespace App\Http\Controllers;

use App\Grave;
use App\StandStatus;
use App\GraveOwner;
use App\CemeterySection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mapper;

class GraveController extends Controller
{
    public function getGraves(){
        return Grave::all();
    }
    /** 
    *public function getAvailableGraves(){
    *    return Grave::where('status'->'Available');
    *}
    */


    public function index(){
        $graves = Grave::all();
        
        return view('graves.index',compact('graves'));
    }

    public function map(){
        $graves = Grave::all();
        $data = DB::table('grave')->pluck('g_site');
        $location = collect($data)->unique();
        return view('graves.map',compact('graves','location'));
    }
    public function create(){
        $status = StandStatus::all();
        $section = CemeterySection::all();
        return view('graves.create',compact('status','section'));

    }
    public function insertform(){
        $section = CemeterySection::all();

        return view('graves.add_batch',compact('section'));
    }
    public function insert(Request $request){
        for ($i=0;$i<=$request->input('no_of_graves');$i++) {
          $g_site = $request->input('g_site');
          $g_lot = $request->input('g_lot');
          $g_no = $request->input('starting_number') + $i;
          $g_batch = $request->input('g_batch');
          $g_status = 'Available';
          $g_date = $request->input('g_date');
          $g_section = $request->input('g_section');
          $data=array('g_site'=>$g_site,'g_lot'=>$g_lot,'g_no'=>$g_no,'g_batch'=>$g_batch,'g_status'=>$g_status,'g_date'=>$g_date,'g_section'=>$g_section);
          DB::table('grave')->insert($data);
          
        }
        return redirect()->route('graves')->with('info','Batch added Successfully');
        
    }

    public function store(Request $request){
        Grave::create($request->all());
        return redirect()->route('graves')->with('info','Grave Created Successfully');

    }
    
    public function show($id){
        $grave = Grave::findorFail($id);
        
        return view('graves.show',compact('grave'));
    }

    public function edit($id){
        $grave = Grave::findorFail($id);
        $status = StandStatus::all();
        
        return view('graves.edit',compact('grave','status','cemeteryowner'));

    }

    public function update(Request $request, $id){
        $grave = Grave::findorFail($id);
        $grave->update($request->all());
        $grave->save();
        return redirect()->route('graves')->with('info','Grave Updated Successfully');

    }

    public function destroy(){
        $grave = Grave::findorFail($id);
        $grave->delete();
        return redirect()->route('graves');

    }
    

}