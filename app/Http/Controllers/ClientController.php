<?php

namespace App\Http\Controllers;

use App\Category;
use App\City;
use App\Client;
use App\ClientStatus;
use App\ClientType;
use App\Employer;
use App\EmploymentType;
use App\Gender;
use App\Marital;
use App\NextOfKin;
use App\Office;
use App\PaymentMethod;
use App\Person;
use App\PersonStatus;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function index()
//    {
//        $clients = Client::where('id','>',0)->get();
//        return view('clients.index', compact('clients'));
//    }

    public function index()
    {
        $clients = null;
        return View('clients.index', compact('clients'));
    }

    public function findClients(Request $request)
    {
        $field = $request->field;
        $value = $request->search;

        if ($field != 'clientNo'){
            $clients = Client::whereHas('person', function (Builder $query) use ($field, $value) {
                $query->where($field, 'regexp', $value);//->orderby('surname')->orderby('firstname');
            })->get()->sortby('person.last_name')->sortby('person.first_name');
        } else {
            $clients = Client::whereHas('person', function (Builder $query) use ($field, $value) {
                $query->orderby('last_name')->orderby('first_name');
            })->where('clientNo','regexp',$value)->get();
        }
        return View('clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $city = City::all();
        $gender = Gender::all();
        $marital = Marital::all();
        $personStatus = PersonStatus::all();
        $clientStatus = ClientStatus::all();
        $clientType = ClientType::all();
        $employer = Employer::all();
        $office = Office::all();
        $employmentType = EmploymentType::all();
        $category = Category::all();

        return View('clients.create', compact('category','city','clientStatus','clientType','gender','marital','personStatus','employer','office','employmentType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $person = Person::where('nationalId', $request->nationalId)->first();
        if ($request->isemployee == 'on'){
            $request['isemployee'] = true;
        }
        else{
            $request['isemployee'] = false;
        }
        if ($person == null){
            $person = Person::create($request->all());
        }
        else{
            $person->update($request->all());
        }
        $client = $person->client;
        if ($client == null){
            $employer = Employer::updateOrcreate(['employer_name'=>$request->employer_name,'telephone'=>$request->employer_telephone,'address'=>$request->employer_address,'contact_person'=>$request->contact_person]);
            $request['person_id'] = $person->id;
            $request['employer_id'] = $employer->id;
            $request['staff'] = $request->isemployee != null ? '1' : 0;
            $client = Client::create($request->all());
        }else{
            $client->update($request->all());
            $employer = $client->employer;
            if ($employer != null){
                $employer->update(['employer_name'=>$request->employer_name,'telephone'=>$request->employer_telephone,'address'=>$request->employer_address,'contact_person'=>$request->contact_person]);
            }
            else{
                Employer::create($request->all());
            }
        }

        NextOfKin::updateOrCreate(['person_id'=>$person->id, 'fullname'=>$request->nokfullname],['employer'=>$request->nokemployer, 'address'=>$request->nokaddress, 'email'=>$request->nokemail, 'telephone'=>$request->noktelephone]);
        return redirect()->route('showClient', $client->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::find($id);
        $products = Product::all();
        $genders = Gender::all();
        $maritals = Marital::all();
        $cities = City::all();
        $paymentmethods = PaymentMethod::all();

        return view('clients.show', compact('client', 'products','genders','maritals','cities','paymentmethods'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //return $request->all();
        $client = Client::find($id);
        $person = $client->person;
        $nok = $person->nok;
        $person->update($request->all());
        $client->update($request->all());
        $nok->update($request->all());
        $nok->update(['email'=>$request->nokEmail]);
        return redirect()->back()->with('info','Client Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
