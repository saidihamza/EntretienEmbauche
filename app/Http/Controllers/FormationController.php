<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formation;
use App\Models\Candidat;
use Brian2694\Toastr\Facades\Toastr;

class FormationController extends Controller
{
    /** Afficher le formulaire d'ajout de formation */
    public function showForm(Request $request)
    {
        // Récupérer l'ID du candidat depuis la requête
        $idCandidat = $request->query('id_candidat');

        // Vérifier si l'ID du candidat est valide
        if (!$idCandidat || !Candidat::find($idCandidat)) {
            Toastr::error('ID du candidat invalide ou manquant.', 'Erreur');
            return redirect()->back();
        }

        return view('ton-formulaire', compact('idCandidat'));
    }

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
        $validated = $request->validate([
            'diplome' => 'required|string|max:255',
            'formation' => 'required|string|max:255',
            'universite' => 'required|string|max:255',
            'annee_obtention' => 'required|integer|digits:4',
            'id_candidat' => 'required|exists:candidats,id', // Vérifie si l'id_candidat existe bien
        ]);
    
        // Création de la formation
        Formation::create([
            'diplome' => $validated['diplome'],
            'formation' => $validated['formation'],
            'universite' => $validated['universite'],
            'annee_obtention' => $validated['annee_obtention'],
            'id_candidat' => $validated['id_candidat'],
        ]);
    
        // Message de succès avec Toastr
        Toastr::success('Formation ajoutée avec succès!', 'Succès');
    
        return redirect()->to(route('candidat/add/page') . '?id_candidat=' . $validated['id_candidat']  . '#experiences');

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