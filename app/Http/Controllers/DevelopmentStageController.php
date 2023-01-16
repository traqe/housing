<?php

namespace App\Http\Controllers;

use App\DevelopmentStage;
use Illuminate\Http\Request;

class DevelopmentStageController extends Controller
{

    public function index()
    {
        $standTypes = DevelopmentStage::all();
        return view('developmentstages.index', compact('standTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('developmentstages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DevelopmentStage::create($request->all());
        return redirect()->route('developmentstages')->with('info', 'Stage Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $standType = DevelopmentStage::find($id);
        return view('developmentstages.show', compact('standType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $standType = DevelopmentStage::find($id);
        return view('developmentstages.edit', compact('standType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $batch = DevelopmentStage::find($id);
        $batch->update($request->all());
        return redirect()->route('developmentstages')->with('info', 'Stage Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
