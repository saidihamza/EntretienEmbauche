@extends('layouts.master')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12">

                        <!-- Zone de recherche -->
                        <div class="mb-4">
                            <input type="text" id="searchInput" class="form-control" placeholder="Rechercher...">
                        </div>

                        <!-- Table -->
                        <table class="table table-striped">
                            <thead class="candidat-thread">
                                <tr>
                                    <th>
                                        <div class="form-check check-tables">
                                            <input class="form-check-input" type="checkbox">
                                        </div>
                                    </th>
                                    <th>ID</th>
                                    <th>Date de Naissance</th>
                                    <th>Catégorie</th>
                                    <th>Candidat</th>
                                    <th>Téléphone</th>
                                    <th>Email</th>
                                    <th class="text-end">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="candidatTable">
                                @foreach ($candidatList as $list)
                                    <tr>
                                        <td>
                                            <div class="form-check check-tables">
                                                <input class="form-check-input" type="checkbox">
                                            </div>
                                        </td>
                                        <td>{{ $list->id }}</td>
                                        <td>{{ $list->date_of_birth }}</td>
                                        <td>{{ $list->categorie }}</td>
                                        <td>{{ $list->nom_complet ?? 'N/A' }}</td>
                                        <td>{{ $list->phone_number }}</td>
                                        <td>{{ $list->email }}</td>
                                        <td class="text-end">
                                            <div class="actions d-flex gap-2 justify-content-end">
                                                <a href="{{ url('candidat/edit/'.$list->id) }}" class="btn btn-sm bg-warning-light" title="Modifier">
                                                    <i class="feather-edit"></i>
                                                </a>
                                                <a href="#" 
                                                    class="btn btn-sm bg-danger-light candidat_delete" 
                                                    data-id="{{ $list->id }}" 
                                                    data-avatar="{{ $list->cv_upload }}" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#candidatUser" 
                                                    title="Supprimer">
                                                    <i class="feather-trash-2"></i>
                                                </a>
                                                <button type="button"
                                                    class="btn btn-sm bg-info-light btn-detail"
                                                    data-id="{{ $list->id }}">
                                                    <i class="feather-eye"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <!-- Modal enrichi -->
                        <div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
                          <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="detailsModalLabel">Détails du Candidat</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                              </div>
                              <div class="modal-body">
                                <p><strong>ID:</strong> <span id="detailId"></span></p>
                                <p><strong>Nom complet:</strong> <span id="detailNom"></span></p>
                                <p><strong>Date de Naissance:</strong> <span id="detailDob"></span></p>
                                <p><strong>Catégorie:</strong> <span id="detailCategorie"></span></p>
                                <p><strong>Téléphone:</strong> <span id="detailPhone"></span></p>
                                <p><strong>Email:</strong> <span id="detailEmail"></span></p>

                                <h6>Expériences</h6>
                                <ul id="detailExperiences"></ul>

                                <h6>Formations</h6>
                                <ul id="detailFormations"></ul>

                                <h6>Compétences</h6>
                                <ul id="detailCompetences"></ul>

                                <h6>CV</h6>
                                <div id="detailCvUpload"></div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- Scripts -->
                        <script>
                            // Recherche simple
                            document.getElementById("searchInput").addEventListener("keyup", function() {
                                const value = this.value.toLowerCase();
                                const rows = document.querySelectorAll("#candidatTable tr");
                                rows.forEach(row => {
                                    row.style.display = row.innerText.toLowerCase().includes(value) ? "" : "none";
                                });
                            });

                            // Remplir le modal avec AJAX
                            document.querySelectorAll('.btn-detail').forEach(button => {
                                button.addEventListener('click', function() {
                                    const id = this.getAttribute('data-id');

                                    fetch(`/candidat/details/${id}`)
                                        .then(response => response.json())
                                        .then(data => {
                                            // Infos basiques
                                            document.getElementById('detailId').innerText = data.id;
                                            document.getElementById('detailNom').innerText = data.nom_complet ?? 'N/A';
                                            document.getElementById('detailDob').innerText = data.date_of_birth;
                                            document.getElementById('detailCategorie').innerText = data.categorie;
                                            document.getElementById('detailPhone').innerText = data.phone_number;
                                            document.getElementById('detailEmail').innerText = data.email;

                                            // Expériences
                                            let expHtml = '';
                                            if(data.experiences.length){
                                                data.experiences.forEach(exp => {
                                                    expHtml += `<li><strong>${exp.poste}</strong> chez ${exp.societe} (${exp.date_debut} - ${exp.date_fin})</li>`;
                                                });
                                            } else {
                                                expHtml = '<li>Aucune expérience</li>';
                                            }
                                            document.getElementById('detailExperiences').innerHTML = expHtml;

                                            // Formations
                                            let formHtml = '';
                                            if(data.formations.length){
                                                data.formations.forEach(form => {
                                                    formHtml += `<li>${form.diplome} - ${form.ecole} (${form.date_debut} - ${form.date_fin})</li>`;
                                                });
                                            } else {
                                                formHtml = '<li>Aucune formation</li>';
                                            }
                                            document.getElementById('detailFormations').innerHTML = formHtml;

                                            // Compétences
                                            let compHtml = '';
                                            if(data.competences.length){
                                                data.competences.forEach(comp => {
                                                    compHtml += `<li>${comp.nom}</li>`;
                                                });
                                            } else {
                                                compHtml = '<li>Aucune compétence</li>';
                                            }
                                            document.getElementById('detailCompetences').innerHTML = compHtml;

                                            // CV Upload
                                            if(data.cv_upload){
                                                document.getElementById('detailCvUpload').innerHTML = `<a href="/storage/${data.cv_upload}" target="_blank" class="btn btn-primary btn-sm">Voir le CV</a>`;
                                            } else {
                                                document.getElementById('detailCvUpload').innerHTML = '<span>Aucun CV disponible</span>';
                                            }

                                            // Afficher le modal
                                            new bootstrap.Modal(document.getElementById('detailsModal')).show();
                                        });
                                });
                            });
                        </script>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
