@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header d-flex justify-content-between align-items-center">
                    <h5><i class="fas fa-users"></i>  Gestion Des Types de Compétence</h5>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCompetenceModal">
                            + Ajouter
                        </button>
                    </div>
                    <table class="table table-bordered mt-3" id="CompetenceTable">
                        <thead>
                            <tr>
                                <th>Type Compétence</th>
                                <th class="py-3">Modifier</th>
                                <th class="py-3">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($competences as $competence)
                            <tr>
                                <td>{{ $competence->competence }}</td>
                                <td>
                                    <button class="btn" data-bs-toggle="modal" data-bs-target="#editCompetenceModal{{ $competence->id }}"><i class="far fa-edit text-bleu"></i></button>
                                </td>    
                                <td>    
                                    <form action="{{ route('competences.destroy', $competence->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <i class="fas fa-trash-alt text-red"></i>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal d'ajout -->
<div class="modal fade" id="addCompetenceModal" tabindex="-1" aria-labelledby="addCompetenceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCompetenceModalLabel">Ajouter une Competence</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('competences.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="competence" class="form-label">Competence</label>
                        <input type="text" name="competence" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modals d'édition pour chaque competence -->
@foreach($competences as $competence)
<div class="modal fade" id="editCompetenceModal{{ $competence->id }}" tabindex="-1" aria-labelledby="editCompetenceModalLabel{{ $competence->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCompetenceModalLabel{{ $competence->id }}">Modifier la Competence</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('competences.update', $competence->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="competence" class="form-label">Competence</label>
                        <input type="text" name="competence" class="form-control" value="{{ $competence->competence }}" required>
                    </div>
                    <button type="submit" class="btn btn-success">Modifier</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

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
