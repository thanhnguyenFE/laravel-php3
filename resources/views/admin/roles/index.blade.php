@extends('admin.layouts.app')
@section('main-content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex align-items-center justify-content-between">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Roles /</span> List</h4>
            <a type="button" class="btn btn-outline-primary" href="{{route('roles.create')}}">Create</a>
        </div>
        <div class="card">
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                        <tr class="cursor-pointer">
                            <td>{{$role->role}}</td>
                            <td class="d-flex align-content-center">
                                <div class="d-flex align-items-center">
                                    <a  data-role-id="{{ $role->id }}" data-bs-toggle="modal" data-bs-target="#showRoleDetailModal"
                                    ><i class="bx bx-show me-1 text-info"></i> Show</a
                                    >
                                </div>
                                <div class="d-flex align-items-center ml-3">
                                    <a  href="{{route('roles.edit', $role->id)}}"
                                    ><i class="bx bx-edit-alt me-1 text-warning"></i> Edit</a
                                    >
                                </div>

                                <form method="post" action="{{route('roles.destroy', $role->id)}}" id="deleteForm-{{ $role->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="dropdown-item" data-role-id="{{ $role->id }}" data-bs-toggle="modal" data-bs-target="#confirmDeleteRoleModal">
                                        <i class="bx bx-trash me-1 text-danger"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot class="table-border-bottom-0">
                    <tr>
                        <th>Role</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="modal fade" id="confirmDeleteRoleModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-3xl text-secondary">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this role?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-outline-danger" id="confirmDeleteButton" data-bs-dismiss="modal">Delete</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="showRoleDetailModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div></div>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-3xl text-secondary">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body-role-detail">
                        <div class="card">
                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Value</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tbody-role-detail">
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
            let roleId;
            $('#confirmDeleteRoleModal').on('show.bs.modal', function (event) {
                let button = $(event.relatedTarget);
                roleId = button.data('role-id');
                console.log('role ID:', roleId);
            });

            $('#confirmDeleteButton').click(function() {
                $('#deleteForm-' + roleId).submit();
            });

            $('#showRoleDetailModal').on('show.bs.modal', function (event) {
                let button = $(event.relatedTarget);
                roleId = button.data('role-id');
                $.ajax({
                    url: '/admin/roles/show',
                    type: 'GET',
                    data: { role_id: roleId },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        var body = $('#tbody-role-detail');
                        console.log(data, body);
                        body.empty();
                        var content = `
                        <tr><td>Role</td> <td>${data.role}</td></tr>
                        <tr><td>Description</td> <td>${data.description ? data.description : ''}</td></tr>`
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
