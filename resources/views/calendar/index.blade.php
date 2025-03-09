@extends('layouts.master')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-10 col-lg-8">
                <!-- Utilisation de classes Bootstrap pour le style du calendrier -->
                <div id="calendar" class="shadow p-4 bg-white rounded"></div>
            </div>
        </div>
    </div>

    <!-- Modal pour ajouter/modifier un événement -->
    <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <!-- Ajout de "rounded" pour arrondir les bords -->
            <div class="modal-content rounded">
                <div class="modal-header bg-light border-bottom">
                    <h5 class="modal-title" id="eventModalLabel">Ajouter/Modifier un Événement</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="eventForm">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="eventType" class="form-label">Type d'événement :*</label>
                                <select class="form-select" id="eventType" required>
                                    <option value="Entretien">Entretien</option>
                                    <option value="Contrat">Contrat</option>
                                    <option value="Autre">Autre</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="candidate" class="form-label">Candidat :*</label>
                                <select class="form-select" id="candidate" required>
                                    <option value="">--- Choix de candidat ---</option>
                                    <option value="Hamzea saidi">Hamzea saidi</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="interviewType" class="form-label">Type d'entretien :*</label>
                                <select class="form-select" id="interviewType" required>
                                    <option value="">--- Choix de Type Entretien ---</option>
                                    <option value="physique">Physique</option>
                                    <option value="meet">Meet</option>
                                    <option value="Téléphone">Téléphone</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="evaluator" class="form-label">Évaluateur :*</label>
                                <select class="form-select" id="evaluator" required>
                                    <option value="">--- Choix d'Évaluateur ---</option>
                                    <option value="Chef de projet">Chef de projet</option>
                                    <option value="RH">RH</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="startDate" class="form-label">Date de début :*</label>
                                <input type="datetime-local" class="form-control" id="startDate" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="endDate" class="form-label">Date de fin :*</label>
                                <input type="datetime-local" class="form-control" id="endDate" required>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer d-flex justify-content-between border-top">
                    <button type="button" class="btn btn-primary" id="saveEvent">
                        Ajouter/Modifier
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery et Bootstrap Bundle -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    // Configuration du token CSRF pour les requêtes AJAX
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'fr',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            events: '/events',
            editable: true,
            selectable: true,
            dateClick: function(info) {
                $('#eventModal').modal('show');
                $('#startDate').val(info.dateStr + 'T00:00');
                $('#endDate').val(info.dateStr + 'T23:59');
                $('#saveEvent').data('action', 'create');
            },
            eventClick: function(info) {
                $('#eventModal').modal('show');
                $('#eventType').val(info.event.extendedProps.eventType);
                $('#candidate').val(info.event.extendedProps.candidate);
                $('#interviewType').val(info.event.extendedProps.interviewType);
                $('#evaluator').val(info.event.extendedProps.evaluator);
                $('#startDate').val(info.event.start.toISOString().slice(0, 16));
                $('#endDate').val(info.event.end ? info.event.end.toISOString().slice(0, 16) : '');
                $('#saveEvent').data('action', 'update').data('event-id', info.event.id);
            }
        });
        calendar.render();
        
        $('#saveEvent').on('click', function() {
            var eventData = {
                _token: $('meta[name="csrf-token"]').attr('content'),
                eventType: $('#eventType').val(),
                candidate: $('#candidate').val(),
                interviewType: $('#interviewType').val(),
                evaluator: $('#evaluator').val(),
                start: $('#startDate').val(),
                end: $('#endDate').val()
            };

            var action = $(this).data('action');
            var url = action === 'create' ? '/events' : '/events/' + $(this).data('event-id');
            var method = action === 'create' ? 'POST' : 'PUT';

            $.ajax({
                url: url,
                method: method,
                data: eventData,
                success: function(response) {
                    calendar.refetchEvents();
                    $('#eventModal').modal('hide');

                    // Affichage du toaster de succès
                    toastr.success(action === 'create' ? "Événement ajouté avec succès !" : "Événement mis à jour avec succès !");
                },
                error: function(error) {
                    console.error('Erreur lors de l\'enregistrement de l\'événement', error);
                    
                    // Affichage du toaster d'erreur
                    toastr.error("Erreur lors de l'enregistrement de l'événement !");
                }
            });
        });
    });
</script>

@endsection
