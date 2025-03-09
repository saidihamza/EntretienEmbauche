<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Entretien;

class EntretienController extends Controller
{
    /** Afficher la liste des entretiens */
    public function index()
    {
        $entretiens = Entretien::all();
        return view('entretiens.index', compact('entretiens'));
    }

    /** Ajouter un nouvel entretien */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email',
            'date_entretien' => 'required|date',
            'type_entretien' => 'required|string',
            'categorie' => 'required|string|max:255',
            'candidat_tel' => 'required|string|max:20',
            'entretien' => 'required|string|max:255',
        ]);

        Entretien::create([
            'nom' => $request->nom,
            'email' => $request->email,
            'date_entretien' => $request->date_entretien,
            'type_entretien' => $request->type_entretien,
            'categorie' => $request->categorie,
            'candidat_tel' => $request->candidat_tel,
            'entretien' => $request->entretien,
        ]);

        return redirect()->route('entretiens.index')->with('success', 'Entretien ajouté avec succès.');
    }

    /** Afficher un entretien spécifique */
    public function show($id)
    {
        $entretien = Entretien::findOrFail($id); // Trouver l'entretien ou échouer
        return view('entretiens.show', compact('entretien')); // Afficher une vue avec les détails de l'entretien
    }

    /** Modifier un entretien */
    public function edit(Entretien $entretien)
    {
        return view('entretiens.edit', compact('entretien'));
    }

    /** Mettre à jour un entretien spécifique */
    public function update(Request $request, Entretien $entretien)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email',
            'date_entretien' => 'required|date',
            'type_entretien' => 'required|string',
            'categorie' => 'required|string|max:255',
            'candidat_tel' => 'required|string|max:20',
            'entretien' => 'required|string|max:255',
        ]);

        $entretien->update([
            'nom' => $request->nom,
            'email' => $request->email,
            'date_entretien' => $request->date_entretien,
            'type_entretien' => $request->type_entretien,
            'categorie' => $request->categorie,
            'candidat_tel' => $request->candidat_tel,
            'entretien' => $request->entretien,
        ]);

        return redirect()->route('entretiens.index')->with('success', 'Entretien mis à jour avec succès.');
    }

    /** Supprimer un entretien spécifique */
    public function destroy($id)
    {
        Entretien::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Entretien supprimé avec succès.');
    }
}
