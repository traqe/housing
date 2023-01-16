<?php

namespace App\Http\Controllers;

use App\GraveOwner;
use App\Grave;
use App\CemeterySection;
use Illuminate\Http\Request;
use App\CemeteryPayment;

class OwnerController extends Controller
{    
    public function getPayments(Request $request){
        $payment = CemeteryPayment::all()->sortByDesc('id');
        return response()->json($data);
    }

    public function getAmount(Request $request){
        $p=CemeteryPayment::select('amount')->where('receipt_no',$request->id)->first();
        return response()->json($p);
        
    }

    public function getCemeteryOwners(){
        return GraveOwner::all();
    }

    public function getGraves(Request $request,$id){
        //$cemeteryowner = GraveOwner::findOrFail($id);
        //$graves = $cemeteryowner->grave;
        $graves = Graves::all();
        return response()->json(['graves'=>$graves]);
    }

    public function index(){
        $cemeteryowners = GraveOwner::all();
        return view('cemeteryowners.index',compact('cemeteryowners'));
        
    }

    public function create(){
        $graves = Grave::all();
        $payment = CemeteryPayment::all()->sortByDesc('id');
        return view('cemeteryowners.create',compact('graves','payment'));
    }
    
    public function store(Request $request){
        $new_owner = GraveOwner::updateOrCreate(['Identity_no'=>$request->get('Identity_no')],
                                                ['name'=>$request->get('name'),
                                                'surname'=>$request->get('surname'),
                                                'contact'=>$request->get('contact'),
                                                'address'=>$request->get('address')]);
        //$grave = Grave::find($request->input('owner_id'));
        //$grave->update(['owner_id'=>$new_owner->id]);
        //$grave->owner()->associate(GraveOwner::find($request->get('owner')['owner_id']));
       //$grave->g_status = 'Reserved';
       //$grave->save();

       //$receipt = CemeteryPayment::findOrFail($request->input("receipt_no"));
       //$receipt->invoiced = 'true';
       //$receipt->save();


        return redirect()->route('cemeteryowners')->with('info','Data Captured Successfully');
    }

    public function show($id){
        $cemeteryowner = GraveOwner::findOrFail($id);
        $grave = $cemeteryowner->grave;
        $section = CemeterySection::all();
        $graves = Grave::all();
        //$site = Grave::select('g_site')->distinct()->get();
       // $cemeteryowner = GraveOwner::with('grave')->get()->find($cemeteryowner->owner_id);
       // $grave_id = $cemeteryowner->grave->grave_id;
       // $graves = Grave::with('owner')->get()->find($grave_id);
        return view('cemeteryowners.show',compact('cemeteryowner','grave','section','graves'));
    }

    public function edit($id){
        $cemeteryowner = GraveOwner::findOrFail($id);
        $grave = GraveOwner::with('grave')->get();
        
        return view('cemeteryowners.edit',compact('cemeteryowner','grave'));
    }

    public function update(Request $request, $id){
        $cemeteryowner = GraveOwner::findOrFail($id);
        $cemeteryowner->update($request->all());
        $cemeteryowner->save();
        return redirect()->route('cemeteryowners')->with('info','Owner Info Successfully updated');
    }

    public function destroy($owner_id){
        $cemeteryowner = GraveOwner::findOrFail($id);
        $cemeteryowner->delete();
        return redirect()->route('cemeteryowners');
    }
}
