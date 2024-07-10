@extends('admin.layouts.app')
@section('main-content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex align-items-center justify-content-between">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Schedule /</span> {{$schedule->movie->title}}</h4>
            <form method="post" action="{{route('schedules.destroy', $schedule->id)}}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-danger">Delete</button>
            </form>
        </div>
        <div class="card">
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Value</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Name Movie</td>
                        <td>{{$schedule->movie->title}}</td>
                    </tr>
                    <tr>
                        <td>Name Room</td>
                        <td>{{$schedule->room->name}}</td>
                    </tr>
                    <tr>
                        <td>Start At</td>
                        <td>{{$schedule->start_at}}</td>
                    </tr>
                    <tr>
                        <td>End At</td>
                        <td>{{$schedule->end_at}}</td>
                    </tr>
                    <tr>
                        <td>Date</td>
                        <td>{{$schedule->date}}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>
                            @if ($schedule->status == 1)
                                <i class='bx bx-check-circle check icon text-success'></i> <!-- Check icon -->
                            @else
                                <i class='bx bx-x-circle cross icon text-danger'></i> <!-- Cross icon -->
                            @endif
                        </td>
                    </tr>
                    </tbody>
                    <tfoot class="table-border-bottom-0">
                    <tr>
                        <th>Name</th>
                        <th>Value</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="mt-3">
            <a type="button" class="btn btn-outline-primary mr-3" href="{{route('schedules.edit', $schedule->id)}}">Edit</a>
            <a type="button" class="btn btn-outline-warning" href="{{route('schedules.index')}}">Cancel</a>
        </div>
    </div>
@endsection
