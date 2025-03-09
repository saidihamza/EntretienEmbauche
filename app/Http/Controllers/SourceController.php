<?php

namespace App\Http\Controllers;

use App\Models\Source;
use Illuminate\Http\Request;

class SourceController extends Controller
{
    public function index()
    {
        $sources = Source::all();
        return view('source.index', compact('sources'));
    }

    public function store(Request $request)
    {
        $request->validate(['source' => 'required|string|max:255']);
        Source::create(['source' => $request->source]);
    
        return redirect()->back()->with('success', 'Source ajouté avec succès.');
    }

    public function update(Request $request, Source $source)
    {
        $request->validate([
            'source' => 'required|string|max:255'
        ]);
    
        $source->update([
            'source' => $request->source
        ]);
    
        return redirect()->route('source.index')->with('success', 'Source mis à jour avec succès.');
    }
    

    public function destroy($id)
    {
        Source::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Source supprimé avec succès.');
    }
}
