<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auteur;

class AuteurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auteurs = Auteur::paginate(10);
        return view('auteurs.index', compact('auteurs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auteurs.create');
    }


        public function store(Request $request)
        {
            $validatedData = $request->validate([
                'nom' => 'required|max:255',
                'prénom' => 'required|max:255',


            ]);

            Auteur::create($validatedData);

            return redirect()->route('auteurs.index');
        }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Auteur $auteur)
{


    return view('auteurs.edit', compact('auteur'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Auteur $auteur)
{
    $validatedData = $request->validate([
        'nom' => 'required|max:255',

    ]);

    $auteur->update($validatedData);
    return redirect()->route('auteurs.index');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Auteur $auteur)
{
    $auteur->delete();
    return redirect()->route('auteurs.index');
}

}
