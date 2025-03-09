@extends('layouts.master')

@section('content')
<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col-sm-12">
                    <div class="page-sub-header">
                        <h3 class="page-title text-2xl font-bold text-gray-800">Modifier un Candidat</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('candidat/add/page') }}" class="text-blue-500 hover:text-blue-700">Candidat</a></li>
                            <li class="breadcrumb-item active text-gray-600">Modifier des Candidats</li>
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
                        <a class="nav-link active" id="informations-tab" data-bs-toggle="tab" href="#informations" role="tab" aria-controls="informations" aria-selected="true">Informations Générales</a>
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
            <div class="tab-pane fade show active" id="informations" role="tabpanel" aria-labelledby="informations-tab">
                @include('informations.edit_informations')
            </div>

            <!-- Formation -->
            <div class="tab-pane fade" id="formation" role="tabpanel" aria-labelledby="formation-tab">
                @include('formation.edit_formation')
            </div>

            <!-- Expériences professionnelles -->
            <div class="tab-pane fade" id="experiences" role="tabpanel" aria-labelledby="experiences-tab">
                @include('experiences.edit_experiences')
            </div>

            <!-- Compétences -->
            <div class="tab-pane fade" id="competences" role="tabpanel" aria-labelledby="competences-tab">
                @include('competences.edit_competences')
            </div>
        </div>
    </div>
</div>
@endsection
