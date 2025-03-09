<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evaluation; // ✅ Import du modèle

class EvaluationController extends Controller
{
    /** Afficher la liste des evaluations */
    public function index()
    {
        $evaluations = Evaluation::all();
        return view('evaluations.index', compact('evaluations'));
    }

    public function store(Request $request)
    {
        $request->validate(['evaluation' => 'required|string|max:255']);
        Evaluation::create(['evaluation' => $request->evaluation]);
    
        return redirect()->back()->with('success', 'Evaluation ajouté avec succès.');
    }
    
    public function update(Request $request, Evaluation $evaluation)
    {
        $request->validate(['evaluation' => 'required|string|max:255']);
        $evaluation->update(['evaluation' => $request->evaluation]);
    
        return redirect()->route('evaluations.index')->with('success', 'evaluation mis à jour avec succès.');
    }
    
    public function destroy($id)
    {
        Evaluation::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Evaluation supprimé avec succès.');
    }
    
}
