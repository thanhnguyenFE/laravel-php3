@extends('admin.layouts.app')
@section('main-content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex align-items-center justify-content-between">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Rooms /</span> List</h4>
            <a type="button" class="btn btn-outline-primary" href="{{route('rooms.create')}}">Create</a>
        </div>
        <div class="card">
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($rooms as $room)
                        <tr class="cursor-pointer" data-bs-toggle="modal" data-bs-target="#modalShowDetailMovie">
                            <td>{{$room->name}}</td>
                            <td>
                                {{$room->slug}}
                            </td>
                            <td>
                                @if ($room->status == 1)
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
                                        <a class="dropdown-item" href="{{route('rooms.show', $room->id)}}"
                                        ><i class="bx bx-show me-1 text-info"></i> Show</a
                                        >
                                        <a class="dropdown-item" href="{{route('rooms.edit', $room->id)}}"
                                        ><i class="bx bx-edit-alt me-1 text-warning"></i> Edit</a
                                        >
                                        <form method="post" action="{{route('rooms.destroy', $room->id)}}" id="deleteForm-{{ $room->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="dropdown-item" data-category-id="{{ $room->id }}" data-bs-toggle="modal" data-bs-target="#confirmDeleteCategoryModal">
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
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="modal fade" id="confirmDeleteCategoryModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-3xl text-secondary">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this Room?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-outline-danger" id="confirmDeleteButton" data-bs-dismiss="modal">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            let categoryId;
            $('#confirmDeleteCategoryModal').on('show.bs.modal', function (event) {
                let button = $(event.relatedTarget);
                categoryId = button.data('category-id');
                console.log('category ID:', categoryId);
            });

            $('#confirmDeleteButton').click(function() {
                $('#deleteForm-' + categoryId).submit();
            });
        });
    </script>
@endsection
