@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-sub-header d-flex justify-content-between align-items-center">
                        <h5><i class="fas fa-users"></i> Liste des Employés</h5>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEmployeeModal">
                            + Ajouter
                        </button>
                    </div>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Email</th>
                                <th>Téléphone</th>
                                <th>Poste</th>
                                <th>Salaire</th>
                                <th>Date d'embauche</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $index => $employee)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $employee->nom }}</td>
                                    <td>{{ $employee->prenom }}</td>
                                    <td>{{ $employee->email }}</td>
                                    <td>{{ $employee->telephone }}</td>
                                    <td>{{ $employee->poste }}</td>
                                    <td>{{ $employee->salaire }}</td>
                                    <td>{{ $employee->date_embauche }}</td>
                                    <td>
                                        <button class="btn" data-bs-toggle="modal" data-bs-target="#editEmployeeModal{{ $employee->id }}">
                                            <i class="far fa-edit text-bleu"></i>
                                        </button>
                                        <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn"><i class="fas fa-trash-alt text-red"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                <div class="modal fade" id="editEmployeeModal{{ $employee->id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Modifier un Employé</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('employees.update', $employee->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-3">
                                                        <label class="form-label">Nom</label>
                                                        <input type="text" class="form-control" name="nom" value="{{ $employee->nom }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Prénom</label>
                                                        <input type="text" class="form-control" name="prenom" value="{{ $employee->prenom }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Email</label>
                                                        <input type="email" class="form-control" name="email" value="{{ $employee->email }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Téléphone</label>
                                                        <input type="text" class="form-control" name="telephone" value="{{ $employee->telephone }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Poste</label>
                                                        <input type="text" class="form-control" name="poste" value="{{ $employee->poste }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Salaire</label>
                                                        <input type="number" class="form-control" name="salaire" value="{{ $employee->salaire }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Date d'embauche</label>
                                                        <input type="date" class="form-control" name="date_embauche" value="{{ $employee->date_embauche }}" required>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Modifier</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addEmployeeModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajouter un Employé</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('employees.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Nom</label>
                        <input type="text" class="form-control" name="nom" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Prénom</label>
                        <input type="text" class="form-control" name="prenom" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Téléphone</label>
                        <input type="text" class="form-control" name="telephone" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Poste</label>
                        <input type="text" class="form-control" name="poste" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Salaire</label>
                        <input type="number" class="form-control" name="salaire" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Date d'embauche</label>
                        <input type="date" class="form-control" name="date_embauche" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
