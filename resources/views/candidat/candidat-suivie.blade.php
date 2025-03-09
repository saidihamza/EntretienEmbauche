@extends('layouts.master')

@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Suivre mes Candidats</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('candidat/list') }}">Candidats</a></li>
                                <li class="breadcrumb-item active">Tous les Candidats</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- Message --}}
            {!! Toastr::message() !!}
            
            <div class="candidat-group-form">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Rechercher par ID ...">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Rechercher par Nom ...">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Rechercher par Téléphone ...">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="search-candidat-btn">
                            <button type="button" class="btn btn-primary">Rechercher</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table comman-shadow">
                        <div class="card-body">
                            <div class="page-header">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h3 class="page-title">Candidats</h3>
                                    </div>
                                    <div class="col-auto text-end ms-auto download-grp">
                                        <a href="{{ route('candidat/list') }}" class="btn btn-outline-gray me-2 active"><i class="feather-list"></i></a>
                                        <a href="{{ route('candidat/grid') }}" class="btn btn-outline-gray me-2"><i class="feather-grid"></i></a>
                                        <a href="#" class="btn btn-outline-primary me-2"><i class="fas fa-download"></i> Télécharger</a>
                                        <a href="{{ route('candidat/add/page') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table border-0 table-hover table-center mb-0 datatable table-striped">
                                    <thead class="candidat-thread">
                                        <tr>
                                            <th>
                                                <div class="form-check check-tables">
                                                    <input class="form-check-input" type="checkbox" value="something">
                                                </div>
                                            </th>
                                            <th>Date</th>
                                            <th>Categorie</th>
                                            <th>Candidat</th>
                                            <th>Téléphone</th>
                                            <th>Email</th>
                                            <th class="text-end">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($candidatList as $key => $list)
                                            <tr>
                                                <td>
                                                    <div class="form-check check-tables">
                                                        <input class="form-check-input" type="checkbox" value="something">
                                                    </div>
                                                </td>
                                                <td>{{ $list->date_of_birth }}</td>
                                                <td>{{ $list->class }} {{ $list->section }}</td>
                                                <td>
                                                    <h2 class="table-avatar">
                                                        <a href="javascript:void(0);" class="avatar avatar-sm me-2" data-bs-toggle="modal" data-bs-target="#candidatDetailsModal" data-id="{{ $list->id }}" data-name="{{ $list->first_name }} {{ $list->last_name }}" data-phone="{{ $list->phone_number }}" data-email="{{ $list->email }}" data-image="{{ Storage::url('candidat-photos/'.$list->upload) }}">
                                                            <img class="avatar-img rounded-circle" src="{{ Storage::url('candidat-photos/'.$list->upload) }}" alt="Image du Candidat">
                                                        </a>
                                                        <a href="javascript:void(0);">{{ $list->first_name }} {{ $list->last_name }}</a>
                                                    </h2>
                                                </td>
                                                <td>{{ $list->phone_number }}</td>
                                                <td>{{ $list->email }}</td>
                                                <td class="text-end">
                                                    <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#candidatDetailsModal" data-id="{{ $list->id }}" data-name="{{ $list->first_name }} {{ $list->last_name }}" data-phone="{{ $list->phone_number }}" data-email="{{ $list->email }}" data-image="{{ Storage::url('candidat-photos/'.$list->upload) }}">
                                                        <i class="feather-eye"></i> Voir
                                                    </button>
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
        </div>
    </div>

    {{-- Modal for Viewing Candidat Details --}}
    <div class="modal fade" id="candidatDetailsModal" tabindex="-1" aria-labelledby="candidatDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="candidatDetailsModalLabel">Détails du Candidat</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"><i class="feather-x-circle"></i></button>
                </div>
                <div class="modal-body">
                    <div class="candidate-details">
                        <div class="row">
                            <div class="col-md-4">
                                <img id="candidatImage" src="" class="img-fluid rounded-circle" alt="Image du Candidat">
                            </div>
                            <div class="col-md-8">
                                <p><strong>Nom:</strong> <span id="candidatName"></span></p>
                                <p><strong>Téléphone:</strong> <span id="candidatPhone"></span></p>
                                <p><strong>Email:</strong> <span id="candidatEmail"></span></p>
                                <p><strong>Date de naissance:</strong> <span id="candidatDateOfBirth"></span></p>
                                <p><strong>Catégorie:</strong> <span id="candidatCategory"></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @section('script')
        <script>
            // Populate modal with candidate details
            $(document).on('click', '[data-bs-toggle="modal"]', function () {
                var name = $(this).data('name');
                var phone = $(this).data('phone');
                var email = $(this).data('email');
                var image = $(this).data('image');
                var id = $(this).data('id');

                // Set modal values
                $('#candidatName').text(name);
                $('#candidatPhone').text(phone);
                $('#candidatEmail').text(email);
                $('#candidatImage').attr('src', image);
            });
        </script>
    @endsection

@endsection
