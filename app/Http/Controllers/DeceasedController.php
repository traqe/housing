<?php

namespace App\Http\Controllers;
use App\Deceased;
use App\Grave;
use App\Attachments;
use App\GraveOwner;
use App\Gender;
use Illuminate\Http\Request;
use Illuminate\Support\File;
use Illuminate\Support\Fascades\Storage;
use Barryvdh\DomPDF\Facade as PDF;

class DeceasedController extends Controller
{   
    
    public function index(){

        $burials = Deceased::all();
    
        return view('burials.index',compact('burials'));
    }

    public function create(){
        $grave = Grave::all();
        $gender = Gender::all();
        $owner = GraveOwner::all();
        return view('burials.create',compact('grave','gender','owner'));
    }

    public function store(Request $request){
       
        $input = $request->all();
        if($request->hasFile('burial_order')){
            $destination_path = 'public/photos/orders';
            $burial_order = $request->file('burial_order');
            $image_name = $burial_order->getClientOriginalName();
            $path = $request->file('burial_order')->storeAs($destination_path,$image_name);

            $input['burial_order'] = $image_name;

        };
        
        $new_burial = Deceased::create($input);
        
       //$owner_update = GraveOwner::find($request->input('owner_id'));
       //$owner_update->update(['b_id'=>$new_burial->b_id]);
       //$owner_update->save();

       $grave = Grave::find($request->input('grave_id'));
       $grave->g_status = 'Occupied';
       $grave->save();
       session()->flash('message','Burial Order successfully created');
        
        return redirect('burials');
    }

    public function download(Request $request,$burial_order){
        $path=storage_path('app\\public\\photos\\orders\\'.$burial_order);
        return response()->download($path);
    }
    public function attachments($id){
        $burial = Deceased::where('burial_order',$id)->get();
        
        return view('burials.attachments',compact('burial'));
    }
    public function show($id){
        $burial = Deceased::findorFail($id);
        //$graveInfo = Grave::with('owner')->get()->find($grave_id);

        return view('burials.show',compact('burial'));
    }
    public function edit($id){
        $burial = Deceased::findorFail($id);
        $owner = GraveOwner::all();
        $grave = Grave::all();
        //$burial = Deceased::with('owner','owner.grave')->get()->find($burial->b_id);
        //$grave_id = $burial->owner->grave_id;
        //$graveInfo = Grave::with('owner')->get()->find($grave_id);
        return view('burials.edit', compact('burial','owner','grave'));
    }
    public function update(Request $request,$id){
       $burial = Deceased::findOrFail($id);
       $burial->update($request->all());
       $burial->save();
       return redirect()->route('burials')->with('info','Data Updated Successfully');
    }
    public function printBurial($id)
    {
        $burial = Deceased::findOrFail($id);

        $summaryData = Array(
            'burial' => $burial,
        );
        $view = View('burials.print', ['burial' => $burial]);
            $pdf = \App::make('dompdf.wrapper');
            $pdf->loadHTML($view->render());
            return $pdf->stream();
    }


    
}
