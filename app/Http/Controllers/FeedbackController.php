<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feedback;
use App\Models\Candidat; // Import du modèle Candidat

class FeedbackController extends Controller
{
    // Afficher tous les feedbacks
    public function index()
    {
        $feedbacks = Feedback::with('candidat')->get(); // Inclut les informations sur le candidat
        $candidats = Candidat::all(); // Tous les candidats
        return view('feedback.index', compact('feedbacks', 'candidats'));
    }

    // Afficher le formulaire de création de feedback
    public function create()
    {
        $candidats = Candidat::all(); // Récupère tous les candidats
        return view('feedback.create', compact('candidats'));
    }

    // Enregistrer un nouveau feedback
    public function store(Request $request)
    {
        $request->validate([
            'candidat_id' => 'required|exists:candidats,id', // Validation que le candidat existe
            'commentaire' => 'required|string|max:500', // Validation du commentaire
        ]);

        // Création du feedback dans la base de données
        Feedback::create([
            'candidat_id' => $request->candidat_id,
            'commentaire' => $request->commentaire,
        ]);

        return redirect()->route('feedback.index')->with('success', 'Feedback ajouté avec succès!');
    }

    // Afficher le formulaire d'édition du feedback
    public function edit(Feedback $feedback)
    {
        $candidats = Candidat::all(); // Récupère tous les candidats
        return view('feedback.edit', compact('feedback', 'candidats'));
    }

    // Mettre à jour le feedback
    public function update(Request $request, Feedback $feedback)
    {
        $request->validate([
            'candidat_id' => 'required|exists:candidats,id', // Validation que le candidat existe
            'commentaire' => 'required|string|max:500', // Validation du commentaire
        ]);

        // Mise à jour du feedback
        $feedback->update([
            'candidat_id' => $request->candidat_id,
            'commentaire' => $request->commentaire,
        ]);

        return redirect()->route('feedback.index')->with('success', 'Feedback mis à jour avec succès!');
    }

    // Supprimer un feedback
    public function destroy(Feedback $feedback)
    {
        // Suppression du feedback
        $feedback->delete();
        return redirect()->route('feedback.index')->with('success', 'Feedback supprimé avec succès!');
    }
}
