<?php

namespace App\Http\Controllers;

use App\Models\Affectation;
use Illuminate\Http\Request;

class AffectationController extends Controller
{
    public function index()
    {
        $affectations = Affectation::all();
        return view('affectations.index', compact('affectations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'affectation' => 'required|string|max:255',
        ]);

        Affectation::create([
            'affectation' => $request->affectation,
        ]);

        return redirect()->back()->with('success', 'Affectation ajoutée avec succès.');
    }

    public function update(Request $request, Affectation $affectation)
    {
        $request->validate([
            'affectation' => 'required|string|max:255',
        ]);

        $affectation->update([
            'affectation' => $request->affectation,
        ]);

        return redirect()->route('affectations.index')->with('success', 'Affectation mise à jour avec succès.');
    }

    public function destroy($id)
    {
        Affectation::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Affectation supprimée avec succès.');
    }
}
