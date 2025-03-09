@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header d-flex justify-content-between align-items-center">
                    <h5><i class="fas fa-users"></i> Gestion Des Avis d'Evaluation</h5>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addevaluationModal">
                            + Ajouter
                        </button>
                    </div>
                    <table class="table table-bordered mt-3" id="evaluationTable">
                        <thead>
                            <tr>
                                <th>Avis Evaluation </th>
                                <th class="py-3">Modifier</th>
                                <th class="py-3">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($evaluations as $evaluation)
                            <tr>
                                <td>{{ $evaluation->evaluation }}</td>
                                <td>
                                    <button class="btn" data-bs-toggle="modal" data-bs-target="#editevaluationModal{{ $evaluation->id }}"><i class="far fa-edit text-bleu"></i></button>
                                </td>
                                <td>    
                                    <form action="{{ route('evaluations.destroy', $evaluation->id) }}" method="POST" style="display:inline;">
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
<div class="modal fade" id="addevaluationModal" tabindex="-1" aria-labelledby="addevaluationModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addevaluationModalLabel">Ajouter un evaluation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('evaluations.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="evaluation" class="form-label">Avis Evaluation </label>
                        <input type="text" name="evaluation" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modals d'édition pour chaque evaluation -->
@foreach($evaluations as $evaluation)
<div class="modal fade" id="editevaluationModal{{ $evaluation->id }}" tabindex="-1" aria-labelledby="editevaluationModalLabel{{ $evaluation->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editevaluationModalLabel{{ $evaluation->id }}">Modifier le evaluation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('evaluations.update', $evaluation->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="evaluation" class="form-label">Avis Evaluation </label>
                        <input type="text" name="evaluation" class="form-control" value="{{ $evaluation->evaluation }}" required>
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