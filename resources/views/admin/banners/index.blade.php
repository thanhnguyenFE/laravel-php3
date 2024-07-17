@extends('admin.layouts.app')
@section('main-content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex align-items-center justify-content-between">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Banners /</span> List</h4>
            <a type="button" class="btn btn-outline-primary" href="{{route('banners.create')}}">Create</a>
        </div>
        <div class="card">
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($banners as $banner)
                        <tr class="cursor-pointer">
                            <td>{{$banner->title}}</td>
                            <td>
                                <img src="{{asset('storage/banners/'.$banner->image)}}" alt="banner image" width="100">
                            </td>
                            <td>
                                @if ($banner->status == 1)
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
                                        <a class="dropdown-item" data-banner-id="{{ $banner->id }}" data-bs-toggle="modal" data-bs-target="#showBannerDetailModal"
                                        ><i class="bx bx-show me-1 text-info"></i> Show</a
                                        >
                                        <a class="dropdown-item" href="{{route('banners.edit', $banner->id)}}"
                                        ><i class="bx bx-edit-alt me-1 text-warning"></i> Edit</a
                                        >
                                        <form method="post" action="{{route('banners.destroy', $banner->id)}}" id="deleteForm-{{ $banner->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="dropdown-item" data-banner-id="{{ $banner->id }}" data-bs-toggle="modal" data-bs-target="#confirmDeleteBannerModal">
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
                        <th>Title</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="modal fade" id="confirmDeleteBannerModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-3xl text-secondary">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this banner?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-outline-danger" id="confirmDeleteButton" data-bs-dismiss="modal">Delete</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="showBannerDetailModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div></div>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-3xl text-secondary">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body-banner-detail">
                        <div class="card">
                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Value</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tbody-banner-detail">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            let bannerId;
            $('#confirmDeleteBannerModal').on('show.bs.modal', function (event) {
                let button = $(event.relatedTarget);
                bannerId = button.data('banner-id');
                console.log('banner ID:', bannerId);
            });

            $('#confirmDeleteButton').click(function() {
                $('#deleteForm-' + bannerId).submit();
            });

            $('#showBannerDetailModal').on('show.bs.modal', function (event) {
                let button = $(event.relatedTarget);
                bannerId = button.data('banner-id');
                $.ajax({
                    url: '/admin/banners/show',
                    type: 'GET',
                    data: { banner_id: bannerId },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        var body = $('#tbody-banner-detail');
                        console.log(data, body);
                        body.empty();
                        var content = `
                        <tr><td>Title</td> <td>${data.title}</td></tr>
                        <tr><td>Image</td> <td><img class="img-fluid rounded me-3 w-[100px] mb-2" src="${ data.image ? '/storage/banners/' + data.image : '/img/avatars/1.png' }"></td></tr>
                        <tr><td>Link</td> <td>${data.url ? data.url : ''}</td></tr>
                        <tr><td>Status</td>
                        <td>`;
                        content += data.status == 1 ? "<i class='bx bx-check-circle check icon text-success'></i>" : "<i class='bx bx-x-circle cross icon text-danger'></i>";
                        content += `</td></tr>`;
                        body.html(content);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
