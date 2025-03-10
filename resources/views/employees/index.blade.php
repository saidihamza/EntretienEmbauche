<!-- resources/views/employees/index.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Gestion des employés</h1>

    <!-- Liste des employés -->
    <h2>Liste des employés</h2>
    <ul>
        @foreach ($employees as $employee)
            <li>
                {{ $employee->name }} ({{ $employee->email }})
                - Salaire: {{ $employee->salary }} €
                - Performance: {{ $employee->performance_score }} %
            </li>
        @endforeach
    </ul>

    <!-- Ajouter un employé -->
    <h2>Ajouter un employé</h2>
    <form action="{{ route('employee.store') }}" method="POST">
        @csrf
        <label for="name">Nom :</label>
        <input type="text" name="name" id="name" required><br>

        <label for="email">Email :</label>
        <input type="email" name="email" id="email" required><br>

        <label for="salary">Salaire :</label>
        <input type="number" name="salary" id="salary" step="0.01"><br>

        <label for="performance_score">Performance :</label>
        <input type="number" name="performance_score" id="performance_score" step="0.01"><br>

        <button type="submit">Ajouter</button>
    </form>

    <!-- Gestion des salaires -->
    <h2>Gestion des salaires</h2>
    <p>Consulter et modifier les salaires des employés.</p>
    <ul>
        @foreach ($employees as $employee)
            <li>
                {{ $employee->name }} - Salaire actuel: {{ $employee->salary }} €
                <a href="{{ route('employee.salary') }}">Modifier</a>
            </li>
        @endforeach
    </ul>

    <!-- Suivi des performances -->
    <h2>Suivi des performances</h2>
    <p>Consulter et modifier les scores de performance des employés.</p>
    <ul>
        @foreach ($employees as $employee)
            <li>
                {{ $employee->name }} - Performance actuelle: {{ $employee->performance_score }} %
                <a href="{{ route('employee.performance') }}">Modifier</a>
            </li>
        @endforeach
    </ul>
@endsection
