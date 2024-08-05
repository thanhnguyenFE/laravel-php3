@extends('admin.layouts.app')
@section('main-content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex align-items-center justify-content-between">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Movies /</span> List</h4>
            <a type="button" class="btn btn-outline-primary" href="{{route('movies.create')}}">Create</a>
        </div>
        <div class="p-4 bg-white">
            <label for="search" class="sr-only">Search</label>
            <div class="relative mt-1">
                <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="text"
                       name="search" id="search"
                       class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                       placeholder="Search for items">
            </div>
        </div>
        <div class="card">
            <div class="table-responsive text-nowrap">
                <table class="table" id="admin_table">
                    <thead>
                    <tr>
                        <th>Thumbnail</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Release Date</th>
                        <th>Status</th>
                        <th>Categories</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($movies as $movie)
                        <tr class="cursor-pointer">
                            <td><img
                                    src="{{ filter_var($movie->thumbnail, FILTER_VALIDATE_URL) ? $movie->thumbnail : asset('storage/movies/'.$movie->thumbnail)}}"
                                    alt="{{$movie->title}}" class="img-fluid rounded me-3 w-[100px] h-[100px]"></td>
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
                                @foreach($movie->categories as $category)
                                    <span class="badge bg-label-primary me-1">{{ $category->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('movies.show', $movie->id)}}"
                                        ><i class="bx bx-show me-1 text-info"></i> Show</a
                                        >
                                        <a class="dropdown-item" href="{{route('movies.edit', $movie->id)}}"
                                        ><i class="bx bx-edit-alt me-1 text-warning"></i> Edit</a
                                        >
                                        <form method="post" action="{{route('movies.destroy', $movie->id)}}"
                                              id="deleteForm-{{ $movie->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="dropdown-item" data-movie-id="{{ $movie->id }}"
                                                    data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
                                                <i class="bx bx-trash me-1 text-danger"></i> Delete
                                            </button>
                                        </form>
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
                        <th>Categories</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-3xl text-secondary">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this movie?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-outline-danger" id="confirmDeleteButton"
                                data-bs-dismiss="modal">Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            let movieId;
            $('#confirmDeleteModal').on('show.bs.modal', function (event) {
                let button = $(event.relatedTarget);
                movieId = button.data('movie-id');
                console.log('Movie ID:', movieId);
            });

            $('#confirmDeleteButton').click(function () {
                $('#deleteForm-' + movieId).submit();
            });
        });
    </script>
@endsection
