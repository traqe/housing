<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use Toast;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::paginate(20);
        $subjectid = (Subject::count()> 0 ? Subject::orderBy('SubjID', 'DESC')->first()->SubjID + 1 : 0);
        return View('subjects.index', compact('subjects', 'subjectid'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('subjects.create');
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
        Subject::create($request->all());
        return redirect('subjects');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subject = Subject::findorFail($id);
        return View('subjects.show', compact('subject'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subject = Subject::findorFail($id);
        return View('subjects.edit', compact('subject'));
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
        $subject = Subject::findorFail($id);


        if (empty($subject)) {
            Flash::error('Subject not found');

            return redirect(route('subjects.index'));
        }
        $subject->update($request->all());
        Toast::success('Subject updated successfully.');

        return redirect('subjects');
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
