@extends('admin.layouts.app')
@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/css/multi-select-tag.css">
@endsection
@section('main-content')
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Create Ticket</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('tickets.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="user_id" class="form-label">User</label>
                            <select class="form-control" id="user_id" name="user_id">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="schedule_id" class="form-label">Schedule</label>
                            <select class="form-control" id="schedule_id" name="schedule_id">
                                @foreach($schedules as $schedule)
                                    <option value="{{ $schedule->id }}">{{ $schedule->id }}</option>
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
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-price">Price</label>
                            <input type="text" class="form-control" id="basic-default-price" placeholder="1000000VNĐ" name="total_price"/>
                        </div>
                        <div class="mb-3">
                            <label for="payment_method" class="form-label">Payment Method</label>
                            <select class="form-control" id="payment_method" name="payment_method">
                                <option value="Chuyển khoản">Chuyển khoản</option>
                                <option value="Tiền mặt">Tiền mặt</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="seat_ids" class="form-label">Seats</label>
                            <select class="form-control" id="seat_ids" name="seat_ids[]" multiple required>
                                @php
                                    $rows = ['A', 'B', 'C', 'D', 'E', 'F'];
                                    for ($i = 0; $i < count($rows); $i++) {
                                        for ($j = 1; $j <= 6; $j++) {
                                            echo '<option value="' . $rows[$i] . sprintf('%02d', $j) . '">' . $rows[$i] . sprintf('%02d', $j) . '</option>';
                                        }
                                    }
                                @endphp
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label d-block" for="payment_status">Payment Status</label>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" id="payment_status" value="1" name="payment_status"/>
                                <label class="form-check-label" for="status">Hoàn thành</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-primary mr-3">Send</button>
                        <a type="button" class="btn btn-outline-warning" href="{{route('tickets.index')}}">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/js/multi-select-tag.js"></script>
    <script>
        new MultiSelectTag('seat_ids',{
            tagColor: {
                textColor: '#696cff',
                borderColor: '#696cff',
                bgColor: 'rgba(105, 108, 255, 0.16)',
            },
        })  // id
    </script>
@endsection
