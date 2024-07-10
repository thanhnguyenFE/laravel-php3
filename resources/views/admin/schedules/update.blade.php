@extends('admin.layouts.app')
@section('main-content')
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit Schedule</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('schedules.update', $schedule->id) }}">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="movie_id" class="form-label">Movie</label>
                            <select class="form-control" id="movie_id" name="movie_id">
                                @foreach($movies as $movie)
                                    <option value="{{ $movie->id }}" @if($movie->id == $schedule->movie_id) selected @endif>{{ $movie->title }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="basic-default-date">Date</label>
                            <input
                                type="date"
                                id="basic-default-date"
                                class="form-control"
                                name="date"
                                value="{{$schedule->date}}"
                            />
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="basic-default-start-at">Start At</label>
                            <input
                                type="time"
                                id="basic-default-start-at"
                                class="form-control"
                                name="start_at"
                                value="{{$schedule->start_at}}"
                            />
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="basic-default-end-at">End At</label>
                            <input
                                type="time"
                                id="basic-default-end-at"
                                class="form-control"
                                name="end_at"
                                value="{{$schedule->end_at}}"
                            />
                        </div>

                        <div class="mb-3">
                            <label for="room_id" class="form-label">Rooms</label>
                            <select class="form-control" id="room_id" name="room_id">
                                @foreach($rooms as $room)
                                    <option value="{{ $room->id }}" @if($room->id == $schedule->room_id) selected @endif>{{ $room->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label d-block" for="basic-default-status">Status</label>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" id="status" value="1" name="status" @if($schedule->status == 1) checked @endif/>
                                <label class="form-check-label" for="status">Active</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-outline-primary mr-3">Send</button>
                        <a type="button" class="btn btn-outline-warning" href="{{route('schedules.index')}}">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

