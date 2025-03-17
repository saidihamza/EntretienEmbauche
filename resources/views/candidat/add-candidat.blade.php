@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('candidat/add/page') }}" class="text-blue-500 hover:text-blue-700">Candidat</a></li>
                            <li class="breadcrumb-item active text-gray-600">Ajouter des Candidats</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        {!! Toastr::message() !!}
        
        <!-- Menu de navigation -->
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link" id="informations-tab" data-bs-toggle="tab" href="#informations" role="tab" aria-controls="informations" aria-selected="true">Informations Générales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="formation-tab" data-bs-toggle="tab" href="#formation" role="tab" aria-controls="formation" aria-selected="false">Formation</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="experiences-tab" data-bs-toggle="tab" href="#experiences" role="tab" aria-controls="experiences" aria-selected="false">Expériences professionnelles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="competences-tab" data-bs-toggle="tab" href="#competences" role="tab" aria-controls="competences" aria-selected="false">Compétences</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Contenu des sections -->
        <div class="tab-content" id="myTabContent">
            <!-- Informations Générales -->
            <div class="tab-pane fade" id="informations" role="tabpanel" aria-labelledby="informations-tab">
                @include('informations.add_informations')
            </div>

            <!-- Formation -->
            <div class="tab-pane fade" id="formation" role="tabpanel" aria-labelledby="formation-tab">
                @include('formation.add_formation')
            </div>

            <!-- Expériences professionnelles -->
            <div class="tab-pane fade" id="experiences" role="tabpanel" aria-labelledby="experiences-tab">
                @include('experiences.add_experiences')
            </div>

            <!-- Compétences -->
            <div class="tab-pane fade" id="competences" role="tabpanel" aria-labelledby="competences-tab">
                @include('competences.add_competences')
            </div>
        </div>
    </div>
</div>
@endsection

<script>
document.addEventListener('DOMContentLoaded', function () {
    const tabs = document.querySelectorAll('.nav-link');
    const idCandidat = new URLSearchParams(window.location.search).get('id_candidat'); // Récupère l'id_candidat de l'URL

    // Fonction pour mettre à jour l'URL avec l'ID et le hash
    function updateUrl(hash) {
        const newUrl = `${window.location.origin}/candidat/add/page?id_candidat=${idCandidat}#${hash}`;
        window.history.pushState(null, null, newUrl);
    }

    // Fonction pour activer l'onglet depuis l'URL
    function activateTabFromUrl() {
        const hash = window.location.hash.split('&')[0].substring(1); // Récupère uniquement la partie avant &id_candidat
        if (hash) {
            const targetTab = document.querySelector(`a[href="#${hash}"]`);
            if (targetTab) {
                new bootstrap.Tab(targetTab).show(); // Active l'onglet correspondant
            }
        } else {
            // Active le premier onglet si aucun hash n'est trouvé
            const firstTab = document.querySelector('.nav-link');
            if (firstTab) {
                new bootstrap.Tab(firstTab).show();
            }
        }
    }

    // Mettre à jour l'URL lors du clic sur un onglet
    tabs.forEach(tab => {
        tab.addEventListener('click', function (e) {
            const hash = tab.getAttribute('href').substring(1); // Récupère l'ID de la section
            updateUrl(hash); // Met à jour l'URL avec l'ID du candidat
        });
    });

    // Active l'onglet au chargement de la page en fonction de l'URL
    activateTabFromUrl();
});
</script>
