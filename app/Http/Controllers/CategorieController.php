<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;

class CategorieController extends Controller
{
    // Afficher la liste des catégories
    public function index()
    {
        $categories = Categorie::all();
        return view('categories.index', compact('categories'));
    }

    // Ajouter une catégorie
    public function store(Request $request)
    {
        $request->validate([
            'categorie' => 'required|string|max:255|unique:categories,categorie',
        ]);

        Categorie::create([
            'categorie' => $request->categorie,
        ]);

        return redirect()->back()->with('success', 'Catégorie ajoutée avec succès !');
    }

    // Mettre à jour une catégorie
    public function update(Request $request, $id)
    {
        $request->validate([
            'categorie' => 'required|string|max:255|unique:categories,categorie,'.$id,
        ]);

        $categorie = Categorie::findOrFail($id);
        $categorie->update([
            'categorie' => $request->categorie,
        ]);

        return redirect()->back()->with('success', 'Catégorie mise à jour avec succès !');
    }

    // Supprimer une catégorie
    public function destroy($id)
    {
        $categorie = Categorie::findOrFail($id);
        $categorie->delete();

        return redirect()->back()->with('success', 'Catégorie supprimée avec succès !');
    }
}
