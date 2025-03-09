<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Decision;

class DecisionController extends Controller
{
    public function index()
    {
        $decisions = Decision::all();
        return view('decisions.index', compact('decisions'));
    }

    public function store(Request $request)
    {
        $request->validate(['decision' => 'required|string|max:255']);
        Decision::create(['decision' => $request->decision]);

        return redirect()->back()->with('success', 'Décision ajoutée avec succès.');
    }

    public function update(Request $request, Decision $decision)
    {
        $request->validate(['decision' => 'required|string|max:255']);
        $decision->update(['decision' => $request->decision]);

        return redirect()->route('decisions.index')->with('success', 'Décision mise à jour avec succès.');
    }

    public function destroy($id)
    {
        Decision::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Décision supprimée avec succès.');
    }
}
