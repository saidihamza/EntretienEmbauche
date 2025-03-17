<?php

// app/Http/Controllers/ExperienceController.php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function store(Request $request)
    {
        // Validate the input data
        $validated = $request->validate([
            'date_debut' => 'required|date',
            'date_fin' => 'required|date',
            'poste' => 'required|string|max:255',
            'societe' => 'required|string|max:255',
            'periode' => 'required|string|max:255',
            'id_candidat' => 'required|exists:candidats,id',
        ]);

        // Create the experience
        Experience::create($validated);

        // Redirect with the validated id_candidat
        return redirect()->to(route('candidat/add/page') . '?id_candidat=' . $validated['id_candidat'] . '#competences');
    }
}

