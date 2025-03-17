<?php

// app/Http/Controllers/CompetenceController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Competence;

class CompetenceController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'competences' => 'required|array',
            'id_candidat' => 'required|exists:candidats,id'
        ]);

        foreach ($request->competences as $competence) {
            Competence::create([
                'id_candidat' => $request->id_candidat,
                'nom' => $competence
            ]);
        }


        return redirect()->to(route('candidat/add/page'));

    }
}
