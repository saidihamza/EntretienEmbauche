@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header d-flex justify-content-between align-items-center">
                    <h5><i class="fas fa-users"></i> Gestion des Décisions</h5>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDecisionModal">
                            + Ajouter
                        </button>
                    </div>
                    <table class="table table-bordered mt-3" id="decisionTable">
                        <thead>
                            <tr>
                                <th>Décision</th>
                                <th class="py-3">Modifier</th>
                                <th class="py-3">Supprimer</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($decisions as $decision)
                            <tr>
                                <td>{{ $decision->decision }}</td>
                                <td>
                                    <button class="btn" data-bs-toggle="modal" data-bs-target="#editDecisionModal{{ $decision->id }}"><i class="far fa-edit text-bleu"></i></button>
</td>    
                                <td>    
                                    <form action="{{ route('decisions.destroy', $decision->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette décision ?')">
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
<div class="modal fade" id="addDecisionModal" tabindex="-1" aria-labelledby="addDecisionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDecisionModalLabel">Ajouter une Décision</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('decisions.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="decision" class="form-label">Décision</label>
                        <input type="text" name="decision" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modals d'édition pour chaque décision -->
@foreach($decisions as $decision)
<div class="modal fade" id="editDecisionModal{{ $decision->id }}" tabindex="-1" aria-labelledby="editDecisionModalLabel{{ $decision->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDecisionModalLabel{{ $decision->id }}">Modifier la Décision</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('decisions.update', $decision->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="decision" class="form-label">Décision</label>
                        <input type="text" name="decision" class="form-control" value="{{ $decision->decision }}" required>
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
            toastr.success("{!! session('success') !!}");
        @elseif (session('error'))
            toastr.error("{!! session('error') !!}");
        @elseif (session('warning'))
            toastr.warning("{!! session('warning') !!}");
        @elseif (session('info'))
            toastr.info("{!! session('info') !!}");
        @endif
    });
</script>

@endsection
