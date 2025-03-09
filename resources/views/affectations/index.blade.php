@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header d-flex justify-content-between align-items-center">
                    <h5><i class="fas fa-users"></i> Gestion Des Affectations</h5>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addAffectationModal">
                            + Ajouter
                        </button>
                    </div>
                    <table class="table table-bordered mt-3" id="AffectationTable">
                        <thead>
                            <tr>
                                <th>Affectation</th>
                                <th class="py-3">Modifier</th>
                                <th class="py-3">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($affectations as $affectation)
                            <tr>
                                <td>{{ $affectation->affectation }}</td>
                                <td>
                                    <button class="btn" data-bs-toggle="modal" data-bs-target="#editAffectationModal{{ $affectation->id }}"><i class="far fa-edit text-bleu"></i></button>
                                </td>
                                <td>    
                                    <form action="{{ route('affectations.destroy', $affectation->id) }}" method="POST" style="display:inline;">
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
<div class="modal fade" id="addAffectationModal" tabindex="-1" aria-labelledby="addAffectationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAffectationModalLabel">Ajouter une Affectation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('affectations.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="affectation" class="form-label">Affectation</label>
                        <input type="text" name="affectation" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modals d'édition pour chaque affectation -->
@foreach($affectations as $affectation)
<div class="modal fade" id="editAffectationModal{{ $affectation->id }}" tabindex="-1" aria-labelledby="editAffectationModalLabel{{ $affectation->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAffectationModalLabel{{ $affectation->id }}">Modifier l'Affectation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('affectations.update', $affectation->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="affectation" class="form-label">Affectation</label>
                        <input type="text" name="affectation" class="form-control" value="{{ $affectation->affectation }}" required>
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
