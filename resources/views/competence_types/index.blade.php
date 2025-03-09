@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header d-flex justify-content-between align-items-center">
                    <h5><i class="fas fa-users"></i> Liste des Types de Compétence</h5>
                        <!-- Bouton Ajouter -->
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCompetenceModal">
                        + Ajouter
                        </button>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Compétence</th>
                                <th>Type de Compétence</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($types as $index => $competenceType)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $competenceType->competence }}</td>
                                    <td>{{ $competenceType->type_competence }}</td>
                                    <td>
                                        <!-- Modifier Button -->
                                        <button class="btn" data-bs-toggle="modal" data-bs-target="#editCompetenceModal{{ $competenceType->id }}">
                                        <i class="far fa-edit text-bleu"></i>
                                        </button>
                                        <!-- Supprimer Button -->
                                        <form action="{{ route('competenceTypes.destroy', $competenceType->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn"><i class="fas fa-trash-alt text-red"></i></button>
                                        </form>
                                    </td>
                                </tr>

                                <!-- Modal Modifier -->
                                <div class="modal fade" id="editCompetenceModal{{ $competenceType->id }}" tabindex="-1" aria-labelledby="editCompetenceModalLabel{{ $competenceType->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editCompetenceModalLabel{{ $competenceType->id }}">Modifier une compétence</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Formulaire de modification -->
                                                <form action="{{ route('competenceTypes.update', $competenceType->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-3">
                                                        <label for="competence" class="form-label">Compétence</label>
                                                        <select name="competence" class="form-control" required>
                                                            <option value="">--- Sélectionner une compétence ---</option>
                                                            @foreach($competences as $competence)
                                                                <option value="{{ $competence->competence }}" {{ $competenceType->competence == $competence->competence ? 'selected' : '' }}>{{ $competence->competence }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="type_competence" class="form-label">Type de Compétence</label>
                                                        <input type="text" class="form-control" id="type_competence" name="type_competence" value="{{ $competenceType->type_competence }}" required>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Modifier</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Ajouter -->
<div class="modal fade" id="addCompetenceModal" tabindex="-1" aria-labelledby="addCompetenceModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addCompetenceModalLabel">Ajouter une compétence</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Formulaire d'ajout -->
        <form action="{{ route('competenceTypes.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="competence" class="form-label">Compétence</label>
                            <select name="competence" class="form-control" required>
                                <option value="">--- Sélectionner une compétence ---</option>
                                @foreach($competences as $competence)
                                    <option value="{{ $competence->competence }}">{{ $competence->competence }}</option>
                                @endforeach
                            </select>
            </div>
            <div class="mb-3">
                <label for="type_competence" class="form-label">Type de Compétence</label>
                <input type="text" class="form-control" id="type_competence" name="type_competence" required>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
      </div>
    </div>
  </div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        @if (session('success'))
            toastr.success("{{ session('success') }}");
        @elseif (session('error'))
            toastr.error("{{ session('error') }}");
        @elseif (session('warning'))
            toastr.warning("{{ session('warning') }}");
        @elseif (session('info'))
            toastr.info("{{ session('info') }}");
        @endif
    });
</script>
@endsection
