<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emprunt;
use App\Models\Livre;

class EmpruntController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $query = Emprunt::with('livre.auteur');

    if ($request->has('date_debut') && $request->has('date_fin')) {
        $dateDebut = $request->input('date_debut');
        $dateFin = $request->input('date_fin');
        $query->whereBetween('date_d_emprunt', [$dateDebut, $dateFin]);
    }

    $emprunts = $query->get();
    return view('emprunts.index', compact('emprunts'));
}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $livres = Livre::all();
        return view('emprunts.create', compact('livres'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validatedData = $request->validate([
        'livre_id' => 'required|exists:livres,id',
        'date_emprunt' => 'required|date',
        'date_retour' => 'nullable|date|after_or_equal:date_emprunt'
    ]);

    Emprunt::create($validatedData);
    return redirect()->route('emprunts.index');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Emprunt $emprunt)
{
    $livres = Livre::all();
    return view('emprunts.edit', compact('emprunt', 'livres'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Emprunt $emprunt)
    {
        $validatedData = $request->validate([
            'livre_id' => 'required|exists:livres,id',
            'date_d_emprunt' => 'required|date',
            'date_de_retour' => 'nullable|date|after_or_equal:date_d_emprunt',
        ]);

        $emprunt->update($validatedData);
        return redirect()->route('emprunts.index');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Emprunt $emprunt)
{
    $emprunt->delete();
    return redirect()->route('emprunts.index');
}

}
