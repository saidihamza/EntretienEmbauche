@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header d-flex justify-content-between align-items-center">
                        <h5><i class="fas fa-users"></i> Gestion Des Motifs</h5>
                        
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMotifModal">
                            + Ajouter
                        </button>
                    </div>
                    <table class="table table-bordered mt-3" id="motifTable">
                        <thead>
                            <tr>
                                <th class="py-3">Motif</th>
                                <th class="py-3">Modifier</th>
                                <th class="py-3">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($motifs as $motif)
                            <tr>
                                <td class="py-3">{{ $motif->motif }}</td>
                                <td class="py-3">
                                    <button class="btn" data-bs-toggle="modal" data-bs-target="#editMotifModal{{ $motif->id }}">
                                        <i class="far fa-edit text-bleu"></i>
                                    </button>
                                </td>
                                <td class="py-3">
                                    <form action="{{ route('motifs.destroy', $motif->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn">
                                            <i class="fas fa-trash-alt text-red"></i>
                                        </button>
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
<div class="modal fade" id="addMotifModal" tabindex="-1" aria-labelledby="addMotifModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addMotifModalLabel">Ajouter un Motif</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('motifs.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="motif" class="form-label">Ajouter un Motif</label>
                        <input type="text" name="motif" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Valider</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modals d'édition pour chaque motif -->
@foreach($motifs as $motif)
<div class="modal fade" id="editMotifModal{{ $motif->id }}" tabindex="-1" aria-labelledby="editMotifModalLabel{{ $motif->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editMotifModalLabel{{ $motif->id }}">Modifier le Motif</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('motifs.update', $motif->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="motif" class="form-label">Motif</label>
                        <input type="text" name="motif" class="form-control" value="{{ $motif->motif }}" required>
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
