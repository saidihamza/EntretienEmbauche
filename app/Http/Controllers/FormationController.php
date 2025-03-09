<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formation;
use Brian2694\Toastr\Facades\Toastr;

class FormationController extends Controller
{
    /** Liste des formations */
    public function index()
    {
        // Récupère toutes les formations et les passe à la vue
        $formations = Formation::all();
        return view('formations.index', compact('formations'));
    }

    /** Afficher le formulaire d'ajout */
    public function create()
    {
        return view('formations.create');
    }

    /** Enregistrer une nouvelle formation */
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'diplome' => 'required|string|max:255',
            'formation' => 'required|string|max:255',
            'universite' => 'required|string|max:255',
            'annee_obtention' => 'required|integer|digits:4',
        ]);

        // Création de la formation
        Formation::create([
            'diplome' => $request->diplome,
            'formation' => $request->formation,
            'universite' => $request->universite,
            'annee_obtention' => $request->annee_obtention,
        ]);

        // Message de succès avec Toastr
        Toastr::success('Formation ajoutée avec succès!', 'Succès');
        
        return redirect()->route('formation.index');
    }

    /** Afficher une formation */
    public function show($id)
    {
        // Récupérer la formation par son ID
        $formation = Formation::findOrFail($id);
        return view('formations.show', compact('formation'));
    }

    /** Afficher le formulaire de modification */
    public function edit($id)
    {
        // Récupérer la formation à modifier
        $formation = Formation::findOrFail($id);
        return view('formations.edit', compact('formation'));
    }

    /** Mettre à jour une formation */
    public function update(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'diplome' => 'required|string|max:255',
            'formation' => 'required|string|max:255',
            'universite' => 'required|string|max:255',
            'annee_obtention' => 'required|integer|digits:4',
        ]);

        // Récupérer la formation à mettre à jour
        $formation = Formation::findOrFail($id);

        // Mettre à jour les informations de la formation
        $formation->update([
            'diplome' => $request->diplome,
            'formation' => $request->formation,
            'universite' => $request->universite,
            'annee_obtention' => $request->annee_obtention,
        ]);

        // Message de succès avec Toastr
        Toastr::success('Formation mise à jour avec succès!', 'Succès');
        
        return redirect()->route('formation.index');
    }

    /** Supprimer une formation */
    public function destroy($id)
    {
        // Récupérer la formation à supprimer
        $formation = Formation::findOrFail($id);

        // Supprimer la formation
        $formation->delete();

        // Message de succès avec Toastr
        Toastr::success('Formation supprimée avec succès!', 'Succès');
        
        return redirect()->route('formation.index');
    }
}
