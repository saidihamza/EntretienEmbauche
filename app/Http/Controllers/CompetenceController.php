<?php

namespace App\Http\Controllers;

use App\Models\Competence; // Ajout du modèle Competence
use Illuminate\Http\Request;

class CompetenceController extends Controller
{
    
    
    public function type()
    {
        $competences = Competence::all(); // Utilisation correcte du modèle
        return view('competences.type', compact('competences'));
        
    }

    public function store(Request $request)
    {
        // Validation des données d'entrée
        $request->validate([
            'competence' => 'required|string|max:255',
        ]);

        // Création de la compétence
        Competence::create([
            'competence' => $request->competence,
        ]);

        // Retour avec message de succès
        return redirect()->back()->with('success', 'Compétence ajoutée avec succès.');
    }

    public function update(Request $request, $id)
    {
        $competence = Competence::findOrFail($id);
        $competence->competence = $request->competence;
        $competence->save();
    
        return redirect()->route('competences.type')->with('success', 'Compétence modifiée avec succès');
    }
    

    public function destroy($id)
    {
        // Suppression de la compétence par ID
        Competence::findOrFail($id)->delete();

        // Retour avec message de succès
        return redirect()->back()->with('success', 'Compétence supprimée avec succès.');
    }
}
