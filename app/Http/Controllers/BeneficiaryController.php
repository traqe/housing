<?php

namespace App\Http\Controllers;


use App\Beneficiary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class BeneficiaryController extends Controller
{
    public function addBeneficiary()
    {
        // should lead to the addbeneficiary page
        return view('beneficiaries.create');
    }

    // create beneficiary
    public function create()
    {
        $person_id = request('id');
        // new instance of beneficiary(1 row)
        $beneficiary = new Beneficiary();
        $beneficiary->name = request('name') . " " . request('surname');
        $beneficiary->relation = request('relation');
        $beneficiary->age = request('age');
        $beneficiary->sex = request('sex');
        $beneficiary->occupation = request('occupation');
        $beneficiary->income = request('income');
        $beneficiary->person_id = $person_id;

        $beneficiary->save();

        return redirect()->back()->with('addSuccess', 'Added successfully');
    }

    // edit beneficiary
    public function edit()
    {
        //update code
        $beneficiary = Beneficiary::find(request('id'));
        $beneficiary->name = request('name');
        $beneficiary->relation = request('relation');
        $beneficiary->age = request('age');
        $beneficiary->sex = request('sex');
        $beneficiary->occupation = request('occupation');
        $beneficiary->income = request('income');

        $beneficiary->save();

        return redirect()->back()->with('editSuccess', 'Beneficiary updated');
    }

    // this object is not being recognised.

    public function editBeneficiary($beneID)
    {
        //take instance of 
        $beneficiary = Beneficiary::find($beneID);
        return view('beneficiaries.edit', ['beneficiary' => $beneficiary]);
    }

    //delete beneficiary.
    public function destroy($beneID)
    {
        // have to locate the id of the beneficiary
        $beneficiary = Beneficiary::find($beneID);

        // delete function
        $beneficiary->delete();

        return redirect()->back()->with('deleteSuccess', 'Beneficiary deleted successfully');
    }
}
