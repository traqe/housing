<?php

namespace App\Http\Controllers;
use App\Spouse;
use Auth;
use Illuminate\Http\Request;

class SpouseController extends Controller
{

    public function create(){
        
        return view('spouse.create');
    }

    public function store(Request $request){
        $created_by = Auth::user()->id;
        $person_id = request('id');
        $spouse = Spouse::updateOrCreate(['nationalid'=> $request->get('nationalid')],
                                        ['title'=>$request->get('title'),
                                        'name'=>$request->get('name'),
                                        'surname'=>$request->get('surname'),
                                        'gender_id'=>$request->get('gender_id'),
                                        'mobile'=>$request->get('mobile'),
                                        'address'=>$request->get('address'),
                                        'marriage_cert'=>$request->get('marriage_cert'),
                                        'occupation'=>$request->get('occupation'),
                                        'date_marriage'=>$request->get('date_marriage'),
                                        'income'=>$request->get('income'),
                                        'person_id'=>$person_id,
                                        'createdby' =>$created_by]);
                                        
        return redirect()->back()->with('info','Data Captured Successfully');
    }

    public function update(Request $request,$id){
        $spouse = Spouse::find($id);
        $spouse->update($request->all());

        return redirect()->back()->with('info','Spouse Details Updated');
    }

    public function destroy($id){
        //
    }
}
