@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header d-flex justify-content-between align-items-center">
                        <h5><i class="fas fa-users"></i> Historique des Entretiens</h5>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEntretienModal">
                            + Ajouter un entretien
                        </button>
                    </div>
                    <table class="table table-bordered mt-3" id="EntretienTable">
                        <thead>
                            <tr>
                                <th>Nom du Candidat</th>
                                <th>Email</th>
                                <th>Date de l'entretien</th>
                                <th>Type d'entretien</th>
                                <th>Catégorie</th>
                                <th>Téléphone</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($entretiens as $entretien)
                            <tr>
                                <td>{{ $entretien->nom }}</td>
                                <td>{{ $entretien->email }}</td>
                                <td>{{ $entretien->date_entretien }}</td>
                                <td>{{ $entretien->type_entretien }}</td>
                                <td>{{ $entretien->categorie }}</td>
                                <td>{{ $entretien->candidat_tel }}</td>
                                <td>
                                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editEntretienModal{{ $entretien->id }}">
                                        <i class="far fa-edit"></i> Modifier
                                    </button>
                                    <form action="{{ route('entretiens.destroy', $entretien->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet entretien ?')">
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

<!-- Modal d'ajout d'entretien -->
<div class="modal fade" id="addEntretienModal" tabindex="-1" aria-labelledby="addEntretienModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEntretienModalLabel">Ajouter un Entretien</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addEntretienForm" action="{{ route('entretiens.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nom">Nom du Candidat</label>
                        <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom') }}" required>
                        <div class="invalid-feedback" id="nomError"></div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                        <div class="invalid-feedback" id="emailError"></div>
                    </div>
                    <div class="form-group">
                        <label for="date_entretien">Date de l'entretien</label>
                        <input type="date" name="date_entretien" id="date_entretien" class="form-control" value="{{ old('date_entretien') }}" required>
                        <div class="invalid-feedback" id="dateError"></div>
                    </div>
                    <div class="form-group">
                        <label for="type_entretien">Type d'entretien</label>
                        <input type="text" name="type_entretien" id="type_entretien" class="form-control" value="{{ old('type_entretien') }}" required>
                        <div class="invalid-feedback" id="typeError"></div>
                    </div>
                    <div class="form-group">
                        <label for="categorie">Catégorie</label>
                        <input type="text" name="categorie" id="categorie" class="form-control" value="{{ old('categorie') }}" required>
                        <div class="invalid-feedback" id="categorieError"></div>
                    </div>
                    <div class="form-group">
                        <label for="candidat_tel">Téléphone du Candidat</label>
                        <input type="text" name="candidat_tel" id="candidat_tel" class="form-control" value="{{ old('candidat_tel') }}" required>
                        <div class="invalid-feedback" id="telError"></div>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter l'entretien</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal d'édition pour chaque entretien -->
@foreach($entretiens as $entretien)
<div class="modal fade" id="editEntretienModal{{ $entretien->id }}" tabindex="-1" aria-labelledby="editEntretienModalLabel{{ $entretien->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editEntretienModalLabel{{ $entretien->id }}">Modifier l'entretien</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('entretiens.update', $entretien->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nom">Nom du Candidat</label>
                        <input type="text" name="nom" id="nom" class="form-control" value="{{ $entretien->nom }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="{{ $entretien->email }}" required>
                    </div>
                    <div class="form-group">
                        <label for="date_entretien">Date de l'entretien</label>
                        <input type="date" name="date_entretien" id="date_entretien" class="form-control" value="{{ $entretien->date_entretien }}" required>
                    </div>
                    <div class="form-group">
                        <label for="type_entretien">Type d'entretien</label>
                        <input type="text" name="type_entretien" id="type_entretien" class="form-control" value="{{ $entretien->type_entretien }}" required>
                    </div>
                    <div class="form-group">
                        <label for="categorie">Catégorie</label>
                        <input type="text" name="categorie" id="categorie" class="form-control" value="{{ $entretien->categorie }}" required>
                    </div>
                    <div class="form-group">
                        <label for="candidat_tel">Téléphone du Candidat</label>
                        <input type="text" name="candidat_tel" id="candidat_tel" class="form-control" value="{{ $entretien->candidat_tel }}" required>
                    </div>
                    <button type="submit" class="btn btn-warning">Mettre à jour l'entretien</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Validation de l'ajout d'entretien
        const addForm = document.getElementById('addEntretienForm');
        addForm.addEventListener('submit', function (event) {
            let isValid = true;
            const nom = document.getElementById('nom');
            const email = document.getElementById('email');
            const dateEntretien = document.getElementById('date_entretien');
            const typeEntretien = document.getElementById('type_entretien');
            const categorie = document.getElementById('categorie');
            const tel = document.getElementById('candidat_tel');

            // Réinitialiser les messages d'erreur
            resetErrors();

            // Validation des champs
            if (nom.value.trim() === '') {
                showError(nom, 'Nom du candidat est requis');
                isValid = false;
            }
            if (email.value.trim() === '') {
                showError(email, 'Email est requis');
                isValid = false;
            }
            if (dateEntretien.value.trim() === '') {
                showError(dateEntretien, 'Date de l\'entretien est requise');
                isValid = false;
            }
            if (typeEntretien.value.trim() === '') {
                showError(typeEntretien, 'Type d\'entretien est requis');
                isValid = false;
            }
            if (categorie.value.trim() === '') {
                showError(categorie, 'Catégorie est requise');
                isValid = false;
            }
            if (tel.value.trim() === '') {
                showError(tel, 'Téléphone est requis');
                isValid = false;
            }

            if (!isValid) {
                event.preventDefault();  // Empêche l'envoi du formulaire
            }
        });

        // Fonction pour afficher l'erreur
        function showError(element, message) {
            const errorElement = document.getElementById(element.id + 'Error');
            errorElement.textContent = message;
            element.classList.add('is-invalid');
        }

        // Réinitialiser les erreurs
        function resetErrors() {
            const inputs = document.querySelectorAll('.form-control');
            inputs.forEach(input => {
                input.classList.remove('is-invalid');
            });
            const errors = document.querySelectorAll('.invalid-feedback');
            errors.forEach(error => {
                error.textContent = '';
            });
        }
    });
</script>
@endsection
