@extends('admin.layouts.app')
@section('main-content')
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Create Role</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('roles.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-role">Role</label>
                            <input type="text" class="form-control" id="basic-default-role" name="role"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-description">Description</label>
                            <textarea
                                id="basic-default-description"
                                class="form-control"
                                style="border-color: #6B7280"
                                rows="5"
                                name="description"
                            ></textarea>
                        </div>

                        <button type="submit" class="btn btn-outline-primary mr-3">Send</button>
                        <a type="button" class="btn btn-outline-warning" href="{{route('roles.index')}}">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
