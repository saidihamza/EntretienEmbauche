<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Candidat;
use Illuminate\Support\Facades\DB;
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
        return view('candidat.add-candidat');
    }

    /** Enregistrer un candidat */
    public function candidatSave(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'gender' => 'required|string|in:Female,Male,Others',
            'date_of_birth' => 'required|date',
            'roll' => 'nullable|string|max:255',
            'email' => 'required|email|max:255|unique:candidats,email',
            'section' => 'required|string|in:A,B,C',
            'phone_number' => 'nullable|string|max:20',
            'upload' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        DB::beginTransaction();
        try {
            $upload_file = null;
            if ($request->hasFile('upload')) {
                $upload_file = rand() . '.' . $request->upload->extension();
                $request->upload->move(storage_path('app/public/candidat-photos/'), $upload_file);
            }

            $candidat = new Candidat();
            $candidat->first_name = $request->input('first_name');
            $candidat->gender = $request->input('gender');
            $candidat->date_of_birth = $request->input('date_of_birth');
            $candidat->roll = $request->input('roll');
            $candidat->email = $request->input('email');
            $candidat->section = $request->input('section');
            $candidat->phone_number = $request->input('phone_number');
            $candidat->upload = $upload_file;
            $candidat->save();

            Toastr::success('Ajout réussi :)', 'Succès');
            DB::commit();

            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Échec de l\'ajout :)', 'Erreur');
            return redirect()->back();
        }
    }

    /** Suivi des candidats */
    public function candidatSuivie()
    {
        $candidatList = Candidat::all();
        return view('candidat.candidat-suivie', compact('candidatList'));
    }

    /** Page d'édition d'un candidat */
    public function candidatEdit($id)
    {
        $candidat = Candidat::findOrFail($id);
        return view('candidat.edit_candidat', compact('candidat'));
    }
    

    /** Mettre à jour un candidat */
    public function candidatUpdate(Request $request)
    {
        DB::beginTransaction();
        try {
            $candidat = Candidat::findOrFail($request->id);

            if ($request->hasFile('upload')) {
                if (!empty($candidat->upload) && file_exists(storage_path('app/public/candidat-photos/' . $candidat->upload))) {
                    unlink(storage_path('app/public/candidat-photos/' . $candidat->upload));
                }

                $upload_file = rand() . '.' . $request->upload->extension();
                $request->upload->move(storage_path('app/public/candidat-photos/'), $upload_file);
            } else {
                $upload_file = $candidat->upload;
            }

            $candidat->update([
                'upload' => $upload_file,
            ]);

            Toastr::success('Mise à jour réussie :)', 'Succès');
            DB::commit();

            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Échec de la mise à jour :)', 'Erreur');
            return redirect()->back();
        }
    }

    /** Supprimer un candidat */
    public function candidatDelete(Request $request)
    {
        DB::beginTransaction();
        try {
            $candidat = Candidat::find($request->id);

            if ($candidat) {
                if (!empty($candidat->upload) && file_exists(storage_path('app/public/candidat-photos/' . $candidat->upload))) {
                    unlink(storage_path('app/public/candidat-photos/' . $candidat->upload));
                }

                $candidat->delete();
                DB::commit();
                Toastr::success('Candidat supprimé avec succès :)', 'Succès');
            } else {
                Toastr::error('Candidat non trouvé :)', 'Erreur');
            }

            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Échec de la suppression :)', 'Erreur');
            return redirect()->back();
        }
    }

    /** Page de profil du candidat */
    public function candidatProfile($id)
    {
        $candidatProfile = Candidat::findOrFail($id);
        return view('candidat.candidat-profile', compact('candidatProfile'));
    }
}
