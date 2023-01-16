<?php

namespace App\Http\Controllers;

use App\Grave;
use App\GraveOwner;
use App\Receipt;
use App\AllocateGrave;
use Illuminate\Http\Request;
use Auth;

class AllocateGraveController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request){

        $receipt = Receipt::where('receipt',$request->receipt)->first();
        if ($receipt != null){
            $allo = new AllocateGrave();
            $allo->grave_id = $request->grave_id;
            $allo->graveowner_id = $request->graveowner;
            $allo->receipt = $request->receipt;
            $allo->created_by = Auth::user()->id;
            //$allo->update([['graveowner_id'=>$request->graveowner],['created_by'=>$request->created_by]]);
            $allo->save();
            $grave = Grave::find($request->input('grave_id'));
            $grave->update(['owner_id'=>$request->graveowner]);
            $grave->g_status = 'Allocated';
            $grave->save();

            return redirect()->back()->with('info','Allocation Successful');
        }
        return redirect()->back()->with('info','Receipt Invalid');
        
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function update(Request $request){
       //
    }
}