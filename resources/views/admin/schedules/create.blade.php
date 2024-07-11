@extends('admin.layouts.app')
@section('main-content')
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Create Schedule</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('schedules.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="movie_id" class="form-label">Movie</label>
                            <select class="form-control" id="movie_id" name="movie_id">
                                @foreach($movies as $movie)
                                    <option value="{{ $movie->id }}">{{ $movie->title }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="basic-default-date" >Date</label>
                            <input
                                type="date"
                                id="basic-default-date"
                                class="form-control"
                                name="date"
                            />
                        </div>

                        <div class="mb-3" id="start-at-container" style="display: none;">
                            <label class="form-label" for="basic-default-start-at">Start At</label>
                            <input
                                type="time"
                                id="basic-default-start-at"
                                class="form-control"
                                name="start_at"
                            />
                        </div>

                        <div class="mb-3" id="end-at-container" style="display: none;">
                            <label class="form-label" for="basic-default-end-at">End At</label>
                            <input
                                type="time"
                                id="basic-default-end-at"
                                class="form-control"
                                name="end_at"
                            />
                        </div>

                        <div class="mb-3" id="available-rooms-container" style="display: none;">
                            <label for="room" class="form-label">Rooms</label>
                            <select class="form-control" id="room" name="room_id"></select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label d-block" for="basic-default-status">Status</label>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" id="status" value="1" name="status"/>
                                <label class="form-check-label" for="status">Active</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-outline-primary mr-3" id="input-submit" disabled>Send</button>
                        <a type="button" class="btn btn-outline-warning" href="{{route('schedules.index')}}">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('#basic-default-date').on('change', function() {
                var show_date = $('#basic-default-date').val();
                if (show_date) {
                    $('#start-at-container').slideDown();
                    $('#end-at-container').slideDown();
                } else {
                    $('#start-at-container').slideUp();
                    $('#end-at-container').slideUp();
                }
                $('#basic-default-end-at, #basic-default-start-at').on('change', function() {
                    var start_at = $('#basic-default-start-at').val();
                    var end_at = $('#basic-default-end-at').val();
                    if(start_at && end_at) {
                        $.ajax({
                            url: '/admin/schedules/available-rooms',
                            type: 'GET',
                            data: { show_date: show_date,  start_at: start_at, end_at: end_at },
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            success: function(data) {
                                var rooms = $('#room');
                                rooms.empty();
                                if (data.length > 0) {
                                    $.each(data, function(index, room) {
                                        rooms.append('<option value="' + room.id + '">' + room.name + '</option>');
                                    });
                                } else {
                                    rooms.append('<option value="">No rooms available</option>');
                                }
                                $('#available-rooms-container').slideDown();
                                $('#input-submit').prop('disabled', false);
                            },
                            error: function(xhr, status, error) {
                                console.error(xhr.responseText);
                            }
                        });
                    }

                })

            });
        });
    </script>
@endsection

