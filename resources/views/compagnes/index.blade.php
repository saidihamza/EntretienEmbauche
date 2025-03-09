@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header d-flex justify-content-between align-items-center">
                    <h5><i class="fas fa-users"></i> Gestion des Campagnes</h5>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCompagneModal">
                            + Ajouter une campagne
                        </button>
                    </div>

                    <table class="table table-bordered mt-3" id="compagneTable">
                        <thead>
                            <tr>
                                <th>Libellé</th>
                                <th>Date Début</th>
                                <th>Date Fin</th>
                                <th class="py-3">Modifier</th>
                                <th class="py-3">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($compagnes as $compagne)
                            <tr>
                                <td>{{ $compagne->libelle }}</td>
                                <td>{{ $compagne->date_debut->format('d/m/Y') }}</td>
                                <td>{{ $compagne->date_fin->format('d/m/Y') }}</td>
                                <td>
                                    <!-- Modifier -->
                                    <button class="btn" data-bs-toggle="modal" data-bs-target="#editCompagneModal{{ $compagne->id }}"><i class="far fa-edit text-bleu"></i></button>
                                </td>
                                <td>    
                                    <!-- Supprimer avec confirmation -->
                                    <form action="{{ route('compagnes.destroy', $compagne->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette campagne ?');">
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
<div class="modal fade" id="addCompagneModal" tabindex="-1" aria-labelledby="addCompagneModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCompagneModalLabel">Ajouter une Campagne</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('compagnes.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="libelle" class="form-label">Libellé</label>
                        <input type="text" name="libelle" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="date_debut" class="form-label">Date Début</label>
                        <input type="date" name="date_debut" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="date_fin" class="form-label">Date Fin</label>
                        <input type="date" name="date_fin" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modals d'édition pour chaque campagne -->
@foreach($compagnes as $compagne)
<div class="modal fade" id="editCompagneModal{{ $compagne->id }}" tabindex="-1" aria-labelledby="editCompagneModalLabel{{ $compagne->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCompagneModalLabel{{ $compagne->id }}">Modifier la Campagne</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('compagnes.update', $compagne->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="libelle" class="form-label">Libellé</label>
                        <input type="text" name="libelle" class="form-control" value="{{ $compagne->libelle }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="date_debut" class="form-label">Date Début</label>
                        <input type="date" name="date_debut" class="form-control" value="{{ $compagne->date_debut->format('Y-m-d') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="date_fin" class="form-label">Date Fin</label>
                        <input type="date" name="date_fin" class="form-control" value="{{ $compagne->date_fin->format('Y-m-d') }}" required>
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
