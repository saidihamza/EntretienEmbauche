@extends('layouts.master')
@section('content')
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Candidats</h3>
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
                            <input type="text" id="searchById" class="form-control" placeholder="Search by ID ...">
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="form-group">
                            <input type="text" id="searchByName" class="form-control" placeholder="Search by Name ...">
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <div class="form-group">
                            <input type="text" id="searchByPhone" class="form-control" placeholder="Search by Phone ...">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="search-candidat-btn">
                            <button type="button" class="btn btn-primary" id="searchButton">Search</button>
                            <button type="button" class="btn btn-secondary" id="resetButton">Reset</button>
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
                                    <div class="col-auto text-end float-end ms-auto download-grp">
                                        <a href="{{ route('candidat/list') }}" class="btn btn-outline-gray me-2 active"><i class="feather-list"></i></a>
                                        <a href="{{ route('candidat/grid') }}" class="btn btn-outline-gray me-2"><i class="feather-grid"></i></a>
                                        <a href="#" class="btn btn-outline-primary me-2"><i class="fas fa-download"></i> Download</a>
                                        <a href="{{ route('candidat/add/page') }}" class="btn btn-primary"><i class="fas fa-plus"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table class="table border-0 star-candidat table-hover table-center mb-0 datatable table-striped">
                                    <thead class="candidat-thread">
                                        <tr>
                                            <th>
                                                <div class="form-check check-tables">
                                                    <input class="form-check-input" type="checkbox" value="something">
                                                </div>
                                            </th>
                                            <th>Date <i class="feather-chevron-up"></i></th> {{-- Example of sortable column --}}
                                            <th>Categorie</th>
                                            <th>Candidat</th>
                                            <th>Tel</th>
                                            <th>Email</th>
                                            <th class="text-end">Action</th>
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
                                                        <a href="candidat-details.html" class="avatar avatar-sm me-2">
                                                            <img class="avatar-img rounded-circle" src="{{ Storage::url('candidat-photos/'.$list->upload) }}" alt="User Image">
                                                        </a>
                                                        <a href="candidat-details.html">{{ $list->first_name }} {{ $list->last_name }}</a>
                                                    </h2>
                                                </td>
                                                <td>{{ $list->phone_number }}</td>
                                                <td>{{ $list->email }}</td>
                                                <td class="text-end">
                                                    <div class="actions">
                                                        <a href="{{ url('candidat/edit/'.$list->id) }}" class="btn btn-sm bg-danger-light">
                                                            <i class="feather-edit"></i>
                                                        </a>
                                                        <a class="btn btn-sm bg-danger-light candidat_delete" data-bs-toggle="modal" data-bs-target="#candidatUser">
                                                            <i class="feather-trash-2 me-1"></i>
                                                        </a>
                                                    </div>
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

    {{-- Modal for Deleting Candidat --}}
    <div class="modal fade contentmodal" id="candidatUser" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content doctor-profile">
                <div class="modal-header pb-0 border-bottom-0 justify-content-end">
                    <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close"><i class="feather-x-circle"></i></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('candidat/delete') }}" method="POST">
                        @csrf
                        <div class="delete-wrap text-center">
                            <div class="del-icon">
                                <i class="feather-x-circle"></i>
                            </div>
                            <input type="hidden" name="id" class="e_id" value="">
                            <input type="hidden" name="avatar" class="e_avatar" value="">
                            <h2>Are you sure you want to delete this candidat?</h2>
                            <div class="submit-section">
                                <button type="submit" class="btn btn-success me-2">Yes</button>
                                <a class="btn btn-danger" data-bs-dismiss="modal">No</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @section('script')
        {{-- Delete JS --}}
        <script>
            $(document).on('click', '.candidat_delete', function () {
                var _this = $(this).closest('tr');
                $('.e_id').val(_this.find('.id').text());
                $('.e_avatar').val(_this.find('.avatar').text());
            });

            // Add functionality for the search
            document.getElementById('searchButton').addEventListener('click', function () {
                // Filter functionality
            });

            // Reset button functionality
            document.getElementById('resetButton').addEventListener('click', function () {
                document.getElementById('searchById').value = '';
                document.getElementById('searchByName').value = '';
                document.getElementById('searchByPhone').value = '';
            });
        </script>
    @endsection

@endsection
