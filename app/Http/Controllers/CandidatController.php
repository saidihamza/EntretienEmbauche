<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidat;
use App\Models\Categorie;
use App\Models\Source;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Brian2694\Toastr\Facades\Toastr;

class CandidatController extends Controller
{
    /** Afficher la liste des candidats */
    public function candidat()
    {
        $candidatList = Candidat::all();
        return view('candidat.candidat', compact('candidatList'));
    }

    /** Afficher la liste sous forme de grille */
    public function candidatGrid()
    {
        $candidatList = Candidat::all();
        return view('candidat.candidat-grid', compact('candidatList'));
    }

    /** Page d'ajout de candidat */
    public function candidatAdd()
    {
        $categories = Categorie::all();
        $sources = Source::all();

        return view('candidat.add-candidat', compact('categories', 'sources'));
    }
     /** show candidat */
     public function show($id)
    {
        $candidat = Candidat::with(['experiences', 'formations', 'competences'])->findOrFail($id);

        return response()->json($candidat);
    }

    /** Enregistrer un candidat */

        public function candidatSave(Request $request)
        {
            $request->validate([
                'first_name' => 'required|string|max:255',
                'date_of_birth' => 'required|date',
                'gender' => 'required|string|in:Female,Male,Others',
                'email' => 'required|email|max:255|unique:candidats,email',
                'phone_number' => 'nullable|string|max:20',
                'marital_status' => 'required|string|in:Single,Married,Divorced',
                'motorized' => 'required|string|in:Yes,No',
                'has_driving_license' => 'required|string|in:Yes,No',
                'has_visa' => 'required|string|in:Yes,No',
                'categorie' => 'required|string|max:255',
                'cv_source' => 'nullable|string|max:255',
                'cv_upload' => 'required|file|mimes:pdf,doc,docx|max:2048',
                'comment' => 'nullable|string',
            ]);

            DB::beginTransaction();
            try {
                $cvFileName = null;
                if ($request->hasFile('cv_upload')) {
                    $cvFileName = time() . '.' . $request->cv_upload->extension();
                    $request->cv_upload->storeAs('public/candidats-cv', $cvFileName);
                }

                // Créer un nouveau candidat
                $candidat = Candidat::create([
                    'first_name' => $request->input('first_name'),
                    'date_of_birth' => $request->input('date_of_birth'),
                    'gender' => $request->input('gender'),
                    'email' => $request->input('email'),
                    'phone_number' => $request->input('phone_number'),
                    'marital_status' => $request->input('marital_status'),
                    'motorized' => $request->input('motorized'),
                    'has_driving_license' => $request->input('has_driving_license'),
                    'has_visa' => $request->input('has_visa'),
                    'categorie' => $request->input('categorie'),
                    'cv_source' => $request->input('cv_source'),
                    'cv_upload' => $cvFileName,
                    'comment' => $request->input('comment'),
                ]);

                // Commencer la transaction
                DB::commit();

                // Rediriger vers l'URL avec l'ID du candidat
                Toastr::success('Ajout réussi :)', 'Succès');

                return redirect()->to(route('candidat/add/page') . '?id_candidat=' . $candidat->id . '#formation');

            } catch (\Exception $e) {
                DB::rollback();
                Toastr::error('Échec de l\'ajout :) ' . $e->getMessage(), 'Erreur');
                return redirect()->back()->withInput();
            }
        }


    /** Modifier un candidat */
    public function candidatEdit($id)
    {
        $candidat = Candidat::findOrFail($id);
        $categories = Categorie::all();
        $sources = Source::all();
        
        return view('candidat.edit-candidat', compact('candidat', 'categories', 'sources'));
    }

    /** Mettre à jour un candidat */
    public function candidatUpdate(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'gender' => 'required|string|in:Female,Male,Others',
            'email' => 'required|email|max:255|unique:candidats,email,' . $id,
            'phone_number' => 'nullable|string|max:20',
            'marital_status' => 'required|string|in:Single,Married,Divorced',
            'motorized' => 'required|string|in:Yes,No',
            'has_driving_license' => 'required|string|in:Yes,No',
            'has_visa' => 'required|string|in:Yes,No',
            'categorie' => 'required|string|max:255',
            'cv_source' => 'nullable|string|max:255',
            'cv_upload' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'comment' => 'nullable|string',
        ]);

        DB::beginTransaction();
        try {
            $candidat = Candidat::findOrFail($id);
            $cvFileName = $candidat->cv_upload;

            if ($request->hasFile('cv_upload')) {
                if ($cvFileName) {
                    Storage::delete('public/candidats-cv/' . $cvFileName);
                }
                $cvFileName = time() . '.' . $request->cv_upload->extension();
                $request->cv_upload->storeAs('public/candidats-cv', $cvFileName);
            }

            $candidat->update([
                'first_name' => $request->input('first_name'),
                'date_of_birth' => $request->input('date_of_birth'),
                'gender' => $request->input('gender'),
                'email' => $request->input('email'),
                'phone_number' => $request->input('phone_number'),
                'marital_status' => $request->input('marital_status'),
                'motorized' => $request->input('motorized'),
                'has_driving_license' => $request->input('has_driving_license'),
                'has_visa' => $request->input('has_visa'),
                'categorie' => $request->input('categorie'),
                'cv_source' => $request->input('cv_source'),
                'cv_upload' => $cvFileName,
                'comment' => $request->input('comment'),
            ]);

            Toastr::success('Mise à jour réussie :)', 'Succès');
            DB::commit();

            return redirect()->route('candidat.list');
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Échec de la mise à jour :) ' . $e->getMessage(), 'Erreur');
            return redirect()->back()->withInput();
        }
    }

    /** Supprimer un candidat */
    public function candidatDelete($id)
    {
        $candidat = Candidat::find($id);
        if ($candidat) {
            if ($candidat->cv_upload) {
                Storage::delete('public/candidats-cv/' . $candidat->cv_upload);
            }
            $candidat->delete();
            Toastr::success('Candidat supprimé avec succès :)', 'Succès');
        } else {
            Toastr::error('Candidat non trouvé :)', 'Erreur');
        }
        return redirect()->route('candidat.list');
    }
}
