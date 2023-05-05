<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CemeterySection;

class CemeterySectionController extends Controller
{
    public function index()
    {
        $sections = CemeterySection::all();
        return View('cemeterysections.index', compact('sections'));
    }

    public function create()
    {
        return view('cemeterysections.create');
    }

    public function store(Request $request)
    {

        CemeterySection::create($request->all());
        return redirect('/cemeterysections');
    }

    public function show($id)
    {
        $sections = CemeterySection::findorFail($id);
        return view('cemeterysections.show', compact('sections'));
    }

    public function edit($id)
    {
        $section = CemeterySection::findorFail($id);
        return view('cemeterysections.edit', compact('section'));
    }

    public function update(Request $request, $id)
    {
        $sections = CemeterySection::findorFail($id);
        $sections->update($request->all());
        return redirect('/cemeterysections');
    }

    public function destroy(Request $req)
    {
        CemeterySection::find($req->id)->delete();
        return redirect('cemeterysections');
    }
}
