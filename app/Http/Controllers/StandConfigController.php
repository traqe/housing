<?php

namespace App\Http\Controllers;

use App\StandClass;
use App\StandConfig;
use App\StandType;
use Illuminate\Http\Request;

class StandConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $standconfigs = StandConfig::all();
        return view('standconfigs.index', compact('standconfigs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $standTypes = StandType::all();
        $standClasses = StandClass::all();
        return view('standconfigs.create', compact('standTypes', 'standClasses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        StandConfig::create($request->all());
        return redirect()->route('standconfigs')->with('info', 'Stand Configuration Successfully Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $standconfig = StandConfig::find($id);
        return view('standconfigs.show', compact('standconfig'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $standTypes = StandType::all();
        $standClasses = StandClass::all();
        $standconfig = StandConfig::find($id);
        return view('standconfigs.edit', compact('standconfig', 'standTypes', 'standClasses'));
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
        StandConfig::find($id)->update($request->all());
        return redirect()->route('standconfigs')->with('info', 'Stand Configuration Successfully Saved');
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
