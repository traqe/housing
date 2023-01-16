<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Grave;
use App\GraveOwner;
use App\Deceased;

class DeceasedController extends Controller
{
    public function index(){
        $burials = Deceased::orderby('d_surname')->orderby('d_surname')->orderby('d_name')->get();

        return view('burials.index',compact('burials'));
    }

    public function findBurial(Request $request){

        $field = $request->field;
        $value = $request->search;

        if ($field == 'Site'){
            $grave = Grave::where('g_site',$value)->first();
            if ($grave!=null){
                $burials = Deceased::where($field,'regexp',$grave->grave_id)->get();
            }
        }
        return view('burials.index',compact('burials'));
    }

    public function create(){

        return view('burials.create');
    }

    public function store(Request $request){

        $burial = Deceased::Create($request->all());

        return redirect()->route('showBurial',$burial->id);
    }

    public function show($b_id){

        $burial = Deceased::findorFail($b_id);
        $grave = Grave::all();
        $cemeteryowner = GraveOwner::all();

        return view('burials.show',compact('burial','grave','cemeteryowner'));

    }

    public function edit($b_id){
        $burial = Deceased::findorFail($b_id);
        $grave = Grave::all();
        $cemeteryowner = GraveOwner::all();

        return view('burials.edit',compact('burial','grave','cemeteryowner'));
    }

    public function update(Request $request, $b_id){

        $burial = Deceased::findorFail($b_id);
        $burial->update($request->all());
        
        return redirect()->back()->with('info','Burial Details updated');
    }

    public function destroy($b_id){
        //
    }
}
