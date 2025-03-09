@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header d-flex justify-content-between align-items-center">
                    <h5><i class="fas fa-users"></i> Gestion Des Sources</h5>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSourceModal">
                            + Ajouter
                        </button>
                    </div>
                    <table class="table table-bordered mt-3" id="sourceTable">
                        <thead>
                            <tr>
                                <th>Source</th>
                                <th class="py-3">Modifier</th>
                                <th class="py-3">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sources as $source)
                            <tr>
                                <td>{{ $source->source }}</td>
                                <td>
                                    <button class="btn" data-bs-toggle="modal" data-bs-target="#editSourceModal{{ $source->id }}"><i class="far fa-edit text-bleu"></i></button>
                                </td>
                                <td>    
                                    <form action="{{ route('source.destroy', $source->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn"><i class="fas fa-trash-alt text-red"></i></button>
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
<div class="modal fade" id="addSourceModal" tabindex="-1" aria-labelledby="addSourceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSourceModalLabel">Ajouter une Source</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('source.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="source" class="form-label">Source</label>
                        <input type="text" name="source" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modals d'édition pour chaque source -->
@foreach($sources as $source)
<div class="modal fade" id="editSourceModal{{ $source->id }}" tabindex="-1" aria-labelledby="editSourceModalLabel{{ $source->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSourceModalLabel{{ $source->id }}">Modifier la Source</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('source.update', $source->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="source" class="form-label">Source</label>
                        <input type="text" name="source" class="form-control" value="{{ $source->source }}" required>
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
