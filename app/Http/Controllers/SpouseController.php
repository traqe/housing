<?php

namespace App\Http\Controllers;

use App\Spouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class SpouseController extends Controller
{
    public function addSpouse()
    {
        // should lead to the addbeneficiary page
        return view('spouses.create');
    }

    // create spouse
    public function create()
    {
        $person_id = request('id');
        // new instance of spouse(1 row)
        // to update columns
        $spouse = new Spouse();
        $spouse->name = request('name') . " " . request('surname');
        $spouse->title = request('title');
        $spouse->nationalid = request('nationalid');
        $spouse->gender_id = request('gender_id');
        $spouse->mobile = request('mobile');
        $spouse->address = request('address');
        $spouse->marriage_cert = request('marriage_cert');
        $spouse->occupation = request('occupation');
        $spouse->date_marriage = request('date_marriage');
        $spouse->income = request('income');
        // $spouse->created_by =
        // 'name', 'surname', 'title', 'nationalid', 'gender_id', 'mobile', 'address', 'marriage_cert', 'occupation', 'date_marriage', 'income', 'person_id', 'created_at', 'created_by', 'updated_at'
        $spouse->person_id = $person_id;

        $spouse->save();

        return redirect()->back()->with('addSuccess', 'Added successfully');
    }

    // edit spouse
    public function edit()
    {
        //update code
        $spouse = Spouse::find(request('id'));
        $spouse->name = request('name');
        $spouse->surname = request('surname');
        $spouse->title = request('title');
        $spouse->nationalid = request('nationalid');
        $spouse->gender_id = request('gender_id');
        $spouse->mobile = request('mobile');
        $spouse->address = request('address');
        $spouse->marriage_cert = request('marriage_cert');
        $spouse->occupation = request('occupation');
        $spouse->date_marriage = request('date_marriage');
        $spouse->income = request('income');
        $spouse->person_id = request('person_id');
        // $spouse->created_by =
        // 'name', 'surname', 'title', 'nationalid', 'gender_id', 'mobile', 'address', 'marriage_cert', 'occupation', 'date_marriage', 'income', 'person_id', 'created_at', 'created_by', 'updated_at'
        $spouse->save();

        return redirect()->back()->with('editSuccess', 'Spouse updated');
    }

    // this object is not being recognised.

    public function editSpouse($spouID)
    {
        //take instance of 
        $spouse = Spouse::find($spouID);
        return view('spouses.edit', ['spouse' => $spouse]);
    }

    //delete beneficiary.
    public function destroy($spouID)
    {
        // have to locate the id of the beneficiary
        $spouse = Spouse::find($spouID);

        // delete function
        $spouse->delete();

        return redirect()->back()->with('deleteSuccess', 'Spouse deleted successfully');
    }
}
