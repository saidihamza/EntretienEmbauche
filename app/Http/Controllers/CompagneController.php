<?php

namespace App\Http\Controllers;

use App\Models\Compagne;
use Illuminate\Http\Request;

class CompagneController extends Controller
{
    /**
     * Afficher la liste des campagnes.
     */
    public function index()
    {
        $compagnes = Compagne::all();
        return view('compagnes.index', compact('compagnes'));
    }

    /**
     * Afficher le formulaire de création d'une nouvelle campagne.
     */
    public function create()
    {
        return view('compagnes.create');
    }

    /**
     * Enregistrer une nouvelle campagne.
     */
    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
        ]);

        Compagne::create($request->all());

        return redirect()->route('compagnes.index')->with('success', 'Campagne créée avec succès.');
    }

    /**
     * Afficher une campagne spécifique.
     */
    public function show(Compagne $compagne)
    {
        return view('compagnes.show', compact('compagne'));
    }

    /**
     * Afficher le formulaire d'édition d'une campagne.
     */
    public function edit(Compagne $compagne)
    {
        return view('compagnes.edit', compact('compagne'));
    }

    /**
     * Mettre à jour une campagne existante.
     */
    public function update(Request $request, Compagne $compagne)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
        ]);

        $compagne->update($request->all());

        return redirect()->route('compagnes.index')->with('success', 'Campagne mise à jour avec succès.');
    }

    /**
     * Supprimer une campagne.
     */
    public function destroy(Compagne $compagne)
    {
        $compagne->delete();
        return redirect()->route('compagnes.index')->with('success', 'Campagne supprimée avec succès.');
    }
}
