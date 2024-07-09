@extends('admin.layouts.app')
@section('main-content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex align-items-center justify-content-between">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Movies /</span> List</h4>
            <a type="button" class="btn btn-outline-primary" href="{{route('movies.create')}}">Create</a>
        </div>
        <div class="card">
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Thumbnail</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Release Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($movies as $movie)
                        <tr class="cursor-pointer" data-bs-toggle="modal" data-bs-target="#modalShowDetailMovie">
                            <td><img src="{{asset('storage/movies/'.$movie->thumbnail)}}" alt="{{$movie->title}}" class="img-fluid rounded me-3 w-[100px] h-[100px]"></td>
                            <td>{{$movie->title}}</td>
                            <td>
                                {{$movie->slug}}
                            </td>
                            <td>{{$movie->release_date}}</td>
                            <td>
                                @if ($movie->status == 1)
                                    <i class='bx bx-check-circle check icon text-success'></i> <!-- Check icon -->
                                @else
                                    <i class='bx bx-x-circle cross icon text-danger'></i> <!-- Cross icon -->
                                @endif
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="javascript:void(0);"
                                        ><i class="bx bx-edit-alt me-1"></i> Edit</a
                                        >
                                        <a class="dropdown-item" href="javascript:void(0);"
                                        ><i class="bx bx-trash me-1"></i> Delete</a
                                        >
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot class="table-border-bottom-0">
                    <tr>
                        <th>Thumbnail</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Release Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <!-- Bootstrap Table with Header - Footer -->
        <div class="col-lg-4 col-md-6">
            <small class="text-light fw-semibold">Vertically centered</small>
            <div class="mt-3">
                <!-- Modal -->
                <div class="modal fade" id="modalShowDetailMovie" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalCenterTitle">Modal title</h5>
                                <button
                                    type="button"
                                    class="btn-close"
                                    data-bs-dismiss="modal"
                                    aria-label="Close"
                                ></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="nameWithTitle" class="form-label">Name</label>
                                        <input
                                            type="text"
                                            id="nameWithTitle"
                                            class="form-control"
                                            placeholder="Enter Name"
                                        />
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col mb-0">
                                        <label for="emailWithTitle" class="form-label">Email</label>
                                        <input
                                            type="text"
                                            id="emailWithTitle"
                                            class="form-control"
                                            placeholder="xxxx@xxx.xx"
                                        />
                                    </div>
                                    <div class="col mb-0">
                                        <label for="dobWithTitle" class="form-label">DOB</label>
                                        <input
                                            type="text"
                                            id="dobWithTitle"
                                            class="form-control"
                                            placeholder="DD / MM / YY"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
