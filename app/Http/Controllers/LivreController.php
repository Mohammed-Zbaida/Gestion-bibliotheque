<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livre;
use App\Models\Auteur;


class LivreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $livres = Livre::with('auteur')->paginate(10);
        return view('livres.index', compact('livres'));
    }


    public function create()
    {
        $auteurs = Auteur::all();
        return view('livres.create', compact('auteurs'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string',
            'prenom' => 'required|exists:auteurs,id',
            'genre' => 'required|integer',

        ]);

        Livre::create($validatedData);

        return redirect()->route('Joueur.index');
    }


    /**
     * Display the specified resource.
     */
    public function show(Livre $livre)
    {
        return view('livres.show', compact('livre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Livre $livre)
{
    $auteurs = Auteur::all();
    return view('livres.edit', compact('livre', 'auteurs'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Livre $livre)
    {
        $validatedData = $request->validate([
            'titre' => 'required',
            'auteur_id' => 'required|exists:auteurs,id',
            'année_de_publication' => 'required|integer',
            'nombre_de_pages' => 'required|integer'


        ]);

        $livre->update($validatedData);
        return redirect()->route('livres.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Livre $livre)
{
    $livre->delete();
    return redirect()->route('livres.index');
}

}
