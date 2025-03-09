<?php

namespace App\Http\Controllers;

use App\Models\CompetenceType;
use App\Models\Competence;
use Illuminate\Http\Request;

class CompetenceTypeController extends Controller
{
    public function index()
    {
        // Récupérer toutes les compétences avec leurs types
        $competences = Competence::with('competenceTypes')->get(); // Récupère les compétences avec leur type
        $types = CompetenceType::all(); // Récupérer tous les types de compétence
    
        return view('competence_types.index', compact('competences', 'types')); // Passer les deux variables à la vue
    }

    public function create()
    {
        // Récupérer toutes les compétences et types de compétences
        $competences = Competence::all();
        $types = CompetenceType::all(); // Récupérer tous les types de compétence
    
        return view('competence_types.create', compact('competences', 'types')); // Passer les deux variables à la vue
    }

    public function edit($id)
    {
        // Récupérer la compétence à modifier
        $competence = Competence::findOrFail($id);
        $types = CompetenceType::all(); // Récupérer tous les types de compétence

        return view('competence_types.edit', compact('competence', 'types')); // Passer les deux variables à la vue
    }

    public function store(Request $request)
    {
        // Validation des données
        $validated = $request->validate([
            'competence' => 'required|string',  // Validation que la compétence est une chaîne
            'type_competence' => 'required|string', // Validation que le type de compétence est une chaîne
        ]);

        // Insérer dans la table `competence_types`
        CompetenceType::create([
            'competence' => $request->competence, // Compétence saisie par l'utilisateur
            'type_competence' => $request->type_competence, // Type de compétence saisi
        ]);

        // Redirection avec message de succès
        return redirect()->route('competence_types.index')->with('success', 'Type de compétence ajouté avec succès.');
    }
    public function update(Request $request, $id)
    {
        $competenceType = CompetenceType::findOrFail($id);

        $validated = $request->validate([
            'competence' => 'required',
            'type_competence' => 'required',
        ]);

        $competenceType->update($validated);

        return redirect()->route('competence_types.index')->with('success', 'Type de compétence modifié avec succès.');
    }

    public function destroy($id)
    {
        $competenceType = CompetenceType::findOrFail($id);
        $competenceType->delete();

        return redirect()->route('competence_types.index')->with('success', 'Type de compétence supprimé avec succès.');
    }
}
