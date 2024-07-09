@extends('admin.layouts.app')
@section('main-content')
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Create Category</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('categories.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-title">Name Category</label>
                            <input type="text" class="form-control" id="basic-default-title" placeholder="John Doe" name="name"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-slug">Slug</label>
                            <input type="text" class="form-control" id="basic-default-slug" placeholder="john-doe" name="slug"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-description">Description</label>
                            <textarea
                                id="basic-default-description"
                                class="form-control"
                                style="border-color: #6B7280"
                                placeholder="Hi, Do you have a moment to talk Joe?"
                                rows="5"
                                name="description"
                            ></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label d-block" for="basic-default-status">Status</label>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" id="status" value="1" name="status"/>
                                <label class="form-check-label" for="status">Active</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
