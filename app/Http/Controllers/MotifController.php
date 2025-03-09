<?php

namespace App\Http\Controllers;

use App\Models\Motif;
use Illuminate\Http\Request;

class MotifController extends Controller
{
    public function index()
    {
        $motifs = Motif::all();
        return view('motifs.index', compact('motifs'));
    }

    public function store(Request $request)
    {
        $request->validate(['motif' => 'required|string|max:255']);
        Motif::create(['motif' => $request->motif]);
    
        return redirect()->back()->with('success', 'Motif ajouté avec succès.');
    }
    
    public function update(Request $request, Motif $motif)
    {
        $request->validate(['motif' => 'required|string|max:255']);
        $motif->update(['motif' => $request->motif]);
    
        return redirect()->route('motifs.index')->with('success', 'Motif mis à jour avec succès.');
    }
    
    public function destroy($id)
    {
        Motif::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Motif supprimé avec succès.');
    }
    
}
