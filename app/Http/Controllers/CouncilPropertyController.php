<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CouncilProperty;
use App\PropertyType;
use App\PropertyCategory;
use App\Person;
use DB;
use App\Marital;
use App\Gender;
class CouncilPropertyController extends Controller
{
    public function index(){
        $property = CouncilProperty::all();
        return view('councilproperty.index',compact('property'));
    }
    public function create(){
        $types = PropertyType::all();
        $cats = PropertyCategory::all();
        $person = Person::all();
        return view('councilproperty.create');
    }

    public function store(Request $request){
        $new_property = CouncilProperty::create($request->only(['name','property_address','property_use','validity_status']));
        $new_person = Person::updateOrCreate(['nationalid'=>$request->get('nationalid')],
                                            ['title'=>$request->get('title'),
                                            'firstname'=>$request->get('firstname'),
                                            'surname'=>$request->get('surname'),
                                            'dob'=>$request->get('dob'),
                                            'gender_id'=>$request->get('gender_id'),
                                            'marital_id'=>$request->get('marital_id'),
                                            'mobile'=>$request->get('mobile'),
                                            'address'=>$request->get('address')]);
//first arry conatin check fields e.g nationalid
// second array rest of fields

        //$property = CouncilProperty::latest()->first();
        $new_property->update(['person_id'=>$new_person->id]);
        $new_property->save();

        //$person = Person::latest()->first();
        //$new_person->update(['council_property_id'=>$new_property->id]);
        //$person->save();

        return redirect()->route('councilproperties')->with('info','Data Captured Successfully');
    }

    public function show($id){
        $property = CouncilProperty::findorFail($id);
        $person = $property->person;
        //$person = CouncilProperty::find($id)->person->first();
        $genders = Gender::all();
        $maritals = Marital::All();


        return view('councilproperty.show',compact('property','person','genders','maritals'));
    }

    public function edit($id){
        $property = CouncilProperty::findorFail($id);
        $types = PropertyType::all();
        $cats = PropertyCategory::all();

        return view('councilproperty.edit',compact('property','types','cats'));
    }

    public function update(Request $request,$id){
        $property = CouncilProperty::findorFail($id);
        $property->update($request->all());
        $property->save();
            
        return redirect()->route('councilproperties')->with('info','Data updated Successfully');
    }

    public function destroy(){
        $property = CouncilProperty::findorFail($id);
        $property->delete();
        return redirect()->route('councilproperties');

    }
    
}
