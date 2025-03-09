@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header d-flex justify-content-between align-items-center">
                        <h5><i class="fas fa-comments"></i> Feedback des Entretiens</h5>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addFeedbackModal">
                            + Ajouter un Feedback
                        </button>
                    </div>
                    <table class="table table-bordered mt-3" id="FeedbackTable">
                        <thead>
                            <tr>
                                <th>Nom du Candidat</th>
                                <th>Email</th>
                                <th>Date de l'entretien</th>
                                <th>Feedback</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($feedbacks as $feedback)
                            <tr>
                                <td>{{ $feedback->nom }}</td>
                                <td>{{ $feedback->email }}</td>
                                <td>{{ $feedback->date_entretien }}</td>
                                <td>{{ $feedback->commentaire }}</td>
                                <td>
                                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editFeedbackModal{{ $feedback->id }}">
                                        <i class="far fa-edit"></i> Modifier
                                    </button>
                                    <form action="{{ route('feedback.destroy', $feedback->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce feedback ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger"><i class="fas fa-trash-alt"></i> Supprimer</button>
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

<!-- Modal d'ajout de Feedback -->
<div class="modal fade" id="addFeedbackModal" tabindex="-1" aria-labelledby="addFeedbackModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addFeedbackModalLabel">Ajouter un Feedback</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addFeedbackForm" action="{{ route('feedback.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="candidat_id">Candidat</label>
                        <select name="candidat_id" id="candidat_id" class="form-control" required>
                            <option value="">Sélectionner un candidat</option>
                            @foreach($candidats as $candidat)
                                <option value="{{ $candidat->id }}">{{ $candidat->nom }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="commentaire">Feedback</label>
                        <textarea name="commentaire" id="commentaire" class="form-control" rows="4" required>{{ old('commentaire') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter le Feedback</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal d'édition de Feedback -->
@foreach($feedbacks as $feedback)
<div class="modal fade" id="editFeedbackModal{{ $feedback->id }}" tabindex="-1" aria-labelledby="editFeedbackModalLabel{{ $feedback->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editFeedbackModalLabel{{ $feedback->id }}">Modifier le Feedback</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('feedback.update', $feedback->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="candidat_id">Candidat</label>
                        <select name="candidat_id" id="candidat_id" class="form-control" required>
                            <option value="">Sélectionner un candidat</option>
                            @foreach($candidats as $candidat)
                                <option value="{{ $candidat->id }}" {{ $feedback->candidat_id == $candidat->id ? 'selected' : '' }}>
                                    {{ $candidat->nom }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="commentaire">Feedback</label>
                        <textarea name="commentaire" id="commentaire" class="form-control" rows="4" required>{{ $feedback->commentaire }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-warning">Mettre à jour le Feedback</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Validation de l'ajout de Feedback
        const addForm = document.getElementById('addFeedbackForm');
        addForm.addEventListener('submit', function (event) {
            let isValid = true;
            const candidatId = document.getElementById('candidat_id');
            const commentaire = document.getElementById('commentaire');

            // Réinitialiser les messages d'erreur
            resetErrors();

            // Validation des champs
            if (candidatId.value.trim() === '') {
                showError(candidatId, 'Le candidat est requis');
                isValid = false;
            }
            if (commentaire.value.trim() === '') {
                showError(commentaire, 'Le feedback est requis');
                isValid = false;
            }

            if (!isValid) {
                event.preventDefault();  // Empêche l'envoi du formulaire
            }
        });

        // Fonction pour afficher l'erreur
        function showError(element, message) {
            const errorElement = document.createElement('div');
            errorElement.classList.add('invalid-feedback');
            errorElement.textContent = message;
            element.classList.add('is-invalid');
            element.parentNode.appendChild(errorElement);
        }

        // Réinitialiser les erreurs
        function resetErrors() {
            const inputs = document.querySelectorAll('.form-control');
            inputs.forEach(input => {
                input.classList.remove('is-invalid');
                const error = input.parentNode.querySelector('.invalid-feedback');
                if (error) {
                    error.remove();
                }
            });
        }
    });
</script>
@endsection
