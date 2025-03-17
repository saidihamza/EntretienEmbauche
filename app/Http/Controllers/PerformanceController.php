<?php


namespace App\Http\Controllers;

use App\Models\Performance;
use App\Models\Employee; // Si vous souhaitez lier les performances aux employés
use Illuminate\Http\Request;

class PerformanceController extends Controller
{
    // Afficher les performances des employés
    public function index()
    {
        // Récupérer toutes les performances des employés depuis la base de données
        $performances = Performance::all();

        // Récupérer les étiquettes (noms des employés)
        $performanceLabels = $performances->pluck('employee_name')->toArray();

        // Récupérer les scores de performance
        $performanceScores = $performances->pluck('score')->toArray();

        // Passer les données à la vue
        return view('performances.index', compact('performances', 'performanceLabels', 'performanceScores'));
    }

    // Afficher les détails d'une performance spécifique
    public function show($id)
    {
        // Récupérer les détails de la performance par ID
        $performance = Performance::findOrFail($id);

        // Retourner la réponse JSON avec les détails de la performance
        return response()->json([
            'employee_name' => $performance->employee_name,
            'score' => $performance->score,
            'comments' => $performance->comments,  // Si vous avez des commentaires sur la performance
        ]);
    }

    // Méthode pour ajouter une nouvelle performance
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'employee_name' => 'required|string|max:255',
            'score' => 'required|integer|min:0|max:100',
            'comments' => 'nullable|string',
        ]);

        // Créer une nouvelle performance
        Performance::create([
            'employee_name' => $request->employee_name,
            'score' => $request->score,
            'comments' => $request->comments,
        ]);

        // Rediriger avec un message de succès
        return redirect()->route('performances.index')->with('success', 'Performance ajoutée avec succès.');
    }

    // Méthode pour modifier une performance existante
    public function update(Request $request, $id)
    {
        // Validation des données
        $request->validate([
            'employee_name' => 'required|string|max:255',
            'score' => 'required|integer|min:0|max:100',
            'comments' => 'nullable|string',
        ]);

        // Trouver la performance par ID et mettre à jour
        $performance = Performance::findOrFail($id);
        $performance->update([
            'employee_name' => $request->employee_name,
            'score' => $request->score,
            'comments' => $request->comments,
        ]);

        // Rediriger avec un message de succès
        return redirect()->route('performances.index')->with('success', 'Performance mise à jour avec succès.');
    }

    // Méthode pour supprimer une performance
    public function destroy($id)
    {
        // Trouver et supprimer la performance
        $performance = Performance::findOrFail($id);
        $performance->delete();

        // Rediriger avec un message de succès
        return redirect()->route('performances.index')->with('success', 'Performance supprimée avec succès.');
    }
}
