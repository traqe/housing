<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Term;
use Toast;

class TermController extends Controller
{
    public function index()
    {
        $terms = Term::all();
        return View('terms.index', compact('terms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('terms.create');
    }

    public function getSubject($id)
    {
        $staff = Subject::find($id);

        if (empty($staff)) {

            return null;
        }

        return $staff;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Term::create($request->all());
        Toast::success('Term added successfully.');
        return redirect('terms');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $term = Term::findorFail($id);
        return View('terms.show', compact('term'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $term = Term::findorFail($id);
        return View('terms.edit', compact('term'));
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
        $subject = Term::findorFail($id);
        if (empty($subject)) {
            Flash::error('Subject not found');
            return redirect(route('subjects.index'));
        }
        if ($request->Closed == 0)
        {
            //$term = Term::all();
            Term::where('Closed', 0)->update(['Closed' => 1]);
        }
        $subject->update($request->all());
        Toast::success('Term updated successfully.');

        return redirect('terms');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req)
    {
        Subject::find($req->id)->delete();
        return redirect('subjects');
    }
}
