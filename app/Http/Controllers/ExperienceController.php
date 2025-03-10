<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    // Affichage du formulaire
    public function create()
    {
        return view('experiences.create');
    }

    // Traitement de la soumission du formulaire
    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
            'poste' => 'required|string|max:255',
            'societe' => 'required|string|max:255',
            'periode' => 'required|string|max:255',
        ]);

        try {
            // Création d'une nouvelle expérience
            Experience::create($validated);

            // Redirection avec un message de succès
            return redirect()->back()->with('success', 'Expérience ajoutée avec succès');
        } catch (\Exception $e) {
            // Gestion des erreurs
            return redirect()->back()->with('error', 'Une erreur est survenue');
        }
    }
}
