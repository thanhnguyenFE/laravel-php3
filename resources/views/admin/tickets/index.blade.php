@extends('admin.layouts.app')
@section('main-content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex align-items-center justify-content-between">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tickets /</span> List</h4>
            <a type="button" class="btn btn-outline-primary" href="{{route('tickets.create')}}">Create</a>
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
                        <th>Code</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Movie</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tickets as $ticket)
                        <tr class="cursor-pointer" data-bs-toggle="modal" data-bs-target="#modalShowDetailMovie">
                            <td><span class="badge bg-label-primary me-1">{{$ticket->ticket_code}}</span></td>
                            <td>{{$ticket->user->name}}</td>
                            <td>
                                {{$ticket->user->phone}}
                            </td>
                            <td>
                                {{$ticket->schedule->movie->title}}
                            </td>
                            <td>
                                {{\App\Helpers\formatDate($ticket->schedule->date)}}
                            </td>
                            <td>
                                @if ($ticket->payment_status == 1)
                                    <i class='bx bx-check-circle check icon text-success'></i> <!-- Check icon -->
                                @else
                                    <i class='bx bx-x-circle cross icon text-danger'></i> <!-- Cross icon -->
                                @endif
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" data-ticket-id="{{ $ticket->id }}"
                                           data-bs-toggle="modal" data-bs-target="#showTicketDetailModal"
                                        ><i class="bx bx-show me-1 text-info"></i> Show</a
                                        >
                                        <a class="dropdown-item" href="{{route('tickets.edit', $ticket->id)}}"
                                        ><i class="bx bx-edit-alt me-1 text-warning"></i> Edit</a
                                        >
                                        <form method="post" action="{{route('tickets.destroy', $ticket->id)}}"
                                              id="deleteForm-{{ $ticket->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="dropdown-item"
                                                    data-ticket-id="{{ $ticket->id }}" data-bs-toggle="modal"
                                                    data-bs-target="#confirmDeleteTicketModal">
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
                        <th>Code</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Movie</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="modal fade" id="confirmDeleteTicketModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-3xl text-secondary">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this ticket?
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
        <div class="modal fade" id="showTicketDetailModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div></div>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-3xl text-secondary">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body-ticket-detail">
                        <div class="card">
                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Value</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tbody-ticket-detail">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <a type="button" class="btn btn-outline-warning" data-bs-dismiss="modal">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            let ticketId;
            $('#confirmDeleteTicketModal').on('show.bs.modal', function (event) {
                let button = $(event.relatedTarget);
                ticketId = button.data('ticket-id');
                console.log('ticket ID:', ticketId);
            });

            $('#confirmDeleteButton').click(function () {
                $('#deleteForm-' + ticketId).submit();
            });

            $('#showTicketDetailModal').on('show.bs.modal', function (event) {
                let button = $(event.relatedTarget);
                ticketId = button.data('ticket-id');
                $.ajax({
                    url: '/admin/tickets/show',
                    type: 'GET',
                    data: {ticket_id: ticketId},
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (data) {
                        var body = $('#tbody-ticket-detail');
                        console.log(data);
                        body.empty();
                        var content = `
                        <tr><td>User</td> <td><img class="img-fluid rounded-full me-3 w-[50px] h-[50px] mb-2" src="${data.user.avatar ? '/storage/avatars/' + data.user.avatar : '/img/avatars/1.png'}"> ${data.user.name}</td></tr>

                        <tr><td>Phone</td> <td>${data.user.phone}</td></tr>
                        <tr><td>Movie</td> <td>${data.schedule.movie.title}</td></tr>
                        <tr><td>Thumbnail</td> <td><img class="img-fluid rounded me-3 w-[100px] h-[100px] mb-2" src="${data.schedule.movie.thumbnail ? '/storage/movies/' + data.schedule.movie.thumbnail : '/img/avatars/1.png'}"></td></tr>
                        <tr><td>Room</td> <td>${data.schedule.room.name}</td></tr>

                        <tr><td>Date</td> <td>${data.schedule.date}</td></tr>

                        <tr><td>Status</td>
                        <td>`;
                        content += data.payment_status == 1 ? "<i class='bx bx-check-circle check icon text-success'></i>" : "<i class='bx bx-x-circle cross icon text-danger'></i>";
                        content += `</td></tr>`;
                        body.html(content);
                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
