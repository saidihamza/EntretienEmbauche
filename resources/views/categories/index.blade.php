@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header d-flex justify-content-between align-items-center">
                        <h2>Gestion Des Catégories Emlploi</h2>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCategorieModal">
                            + Ajouter
                        </button>
                    </div>
                    <table class="table table-bordered mt-3" id="categorieTable">
                        <thead>
                            <tr>
                                <th>Catégorie Emlploi</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $categorie)
                            <tr>
                                <td>{{ $categorie->categorie }}</td>
                                <td>
                                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editCategorieModal{{ $categorie->id }}">✏️</button>
                                    <form action="{{ route('categories.destroy', $categorie->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">🗑️</button>
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
<div class="modal fade" id="addCategorieModal" tabindex="-1" aria-labelledby="addCategorieModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCategorieModalLabel">Ajouter une Catégorie</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('categories.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="categorie" class="form-label">Catégorie</label>
                        <input type="text" name="categorie" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modals d'édition pour chaque catégorie -->
@foreach($categories as $categorie)
<div class="modal fade" id="editCategorieModal{{ $categorie->id }}" tabindex="-1" aria-labelledby="editCategorieModalLabel{{ $categorie->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCategorieModalLabel{{ $categorie->id }}">Modifier la Catégorie</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('categories.update', $categorie->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="categorie" class="form-label">Catégorie</label>
                        <input type="text" name="categorie" class="form-control" value="{{ $categorie->categorie }}" required>
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
