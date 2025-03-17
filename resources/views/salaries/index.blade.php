@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <h5><i class="fas fa-money-bill"></i> Gestion des Salaires</h5>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Salaires (€)</th>
                </tr>
            </thead>
            <tbody>
                @foreach($salaries as $index => $salaire)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $salaire }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection