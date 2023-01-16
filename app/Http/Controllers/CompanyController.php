<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class companycontroller extends Controller
{
    public function index()
    {
        $companies = Company::all();
        return view('companyprofile.company', ['companies' => $companies]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Company::all()->first() == null) {
            return View('companyprofile.create');
        } else {
            return redirect('company')->with('alert', 'Only one profile is allowed');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image_name = $request->file('logo')->getClientOriginalName();
        $request->file('logo')->storeAs('public/logo/', $image_name);

        $company = new Company();
        $company->name = request('name');
        $company->address = request('address');
        $company->contact = request('contact');
        $company->email = request('email');
        $company->logo = $image_name;

        $company->save();
        return redirect()->route('company')->with('info', 'Company Profile Successfully Created');
    }

    public function show()
    {
        $companies = Company::all();
        return view('companyprofile.show', ['companies' => $companies]);
    }

    public function destroy(Request $req)
    {
        Company::find($req->id)->delete();
        return redirect('company');
    }

    public function editCompany()
    {
        $company = Company::all()->first();
        return view('companyprofile.editCompany', ['company' => $company]);
    }

    public function update(Request $request)
    {
        $company = Company::all()->first();
        $company->name = request('name');
        $company->address = request('address');
        $company->contact = request('contact');
        $company->email = request('email');

        if (request('logo') != null) {
            $name = $request->file('logo')->getClientOriginalName();
            $request->file('logo')->storeAs('public/logo/', $name);
            $company->logo = $name;
        }

        $company->save();
        return redirect('company');
    }
}
