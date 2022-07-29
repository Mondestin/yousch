<?php

namespace App\Http\Controllers;

use App\Models\Assiduite;
use Illuminate\Http\Request;

use Carbon\Carbon;

class AssiduitesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assiduites = Assiduite::all();

        return view('assiduites.index', compact('assiduites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('assiduites.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'justificatif' => 'required',
            'date' => 'required',
            'time' => 'required',
        ]);

        Assiduite::create($request->all());

        return redirect()->route('assiduites.index')
            ->with('success', 'Règle créee avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assiduite  $assiduite
     * @return \Illuminate\Http\Response
     */
    public function show(Assiduite $assiduite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assiduite  $assiduite
     * @return \Illuminate\Http\Response
     */
    public function edit(Assiduite $assiduite)
    {
        return view('assiduites.edit', compact('assiduite'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Assiduite  $assiduite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assiduite $assiduite)
    {
        $request->validate([
            'justificatif' => 'required',
            'date' => 'required',
            'time' => 'required',
        ]);

        $assiduite->update($request->all());

        return redirect()->route('assiduites.index')
            ->with('success', 'Règle mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assiduite  $assiduite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Assiduite $assiduite)
    {
        $assiduite->delete();

        return redirect()->route('assiduites.index')
            ->with('success', 'Règle supprimée avec succès');
    }
}
