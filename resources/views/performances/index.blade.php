@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <h5><i class="fas fa-chart-line"></i> Suivi des Performances</h5>

        <!-- Tableau des performances -->
        <div class="card mb-4">
            <div class="card-header">
                <h6>Performances Mensuelles</h6>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom de l'Employé</th>
                            <th>Performance (Score)</th>
                            <th>Évaluation</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($performances as $index => $performance)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $performance->employee_name }}</td>
                                <td>{{ $performance->score }}</td>
                                <td>
                                    @if($performance->score >= 80)
                                        <span class="badge badge-success">Excellente</span>
                                    @elseif($performance->score >= 50)
                                        <span class="badge badge-warning">Moyenne</span>
                                    @else
                                        <span class="badge badge-danger">Insuffisante</span>
                                    @endif
                                </td>
                                <td>
                                    <!-- Détails de la performance -->
                                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#viewPerformanceModal" data-id="{{ $performance->id }}">
                                        Détails
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Graphique des Performances -->
        <div class="card mb-4">
            <div class="card-header">
                <h6>Graphique des Performances Mensuelles</h6>
            </div>
            <div class="card-body">
                <canvas id="performanceChart"></canvas>
            </div>
        </div>

        <!-- Modal Détails Performance -->
        <div class="modal fade" id="viewPerformanceModal" tabindex="-1" role="dialog" aria-labelledby="viewPerformanceModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="viewPerformanceModalLabel">Détails de la Performance</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Contenu dynamique des détails -->
                        <div id="performanceDetails">
                            <!-- Les détails seront chargés ici via JavaScript -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Data pour le graphique des performances mensuelles
    var performanceData = {
        labels: @json($performanceLabels), // Noms des mois ou des employés
        datasets: [{
            label: 'Performances des Employés',
            data: @json($performanceScores), // Scores de performance
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    };

    // Options du graphique
    var options = {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            tooltip: {
                callbacks: {
                    label: function(tooltipItem) {
                        return 'Score: ' + tooltipItem.raw;
                    }
                }
            }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    };

    // Création du graphique
    var ctx = document.getElementById('performanceChart').getContext('2d');
    var performanceChart = new Chart(ctx, {
        type: 'bar',
        data: performanceData,
        options: options
    });

    // Charger les détails d'une performance dans le modal
    $('#viewPerformanceModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var performanceId = button.data('id');

        // Charger les détails de la performance via AJAX ou d'autres méthodes
        $.ajax({
            url: '/performances/' + performanceId,
            method: 'GET',
            success: function(response) {
                $('#performanceDetails').html(`
                    <p><strong>Nom de l'Employé:</strong> ${response.employee_name}</p>
                    <p><strong>Score:</strong> ${response.score}</p>
                    <p><strong>Commentaires:</strong> ${response.comments}</p>
                `);
            }
        });
    });
</script>
@endpush
