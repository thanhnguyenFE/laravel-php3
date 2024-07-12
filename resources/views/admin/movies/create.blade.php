@extends('admin.layouts.app')
@section('styles')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/css/multi-select-tag.css">
@endsection
@section('main-content')
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Create Movie</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('movies.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-title">Title</label>
                            <input type="text" class="form-control" id="basic-default-title" placeholder="John Doe" name="title"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-slug">Slug</label>
                            <input type="text" class="form-control" id="basic-default-slug" placeholder="john-doe" name="slug"/>
                        </div>
                        <div class="mb-3">
                            <label for="category_ids" class="form-label">Categories</label>
                            <select class="form-control" id="category_ids" name="category_ids[]" multiple required>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="basic-default-img">Thumbnail</label>
                            <input
                                type="file"
                                id="basic-default-img"
                                class="form-control"
                                name="thumbnail"
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-date">Release Date</label>
                            <input
                                type="date"
                                id="basic-default-date"
                                class="form-control"
                                name="release_date"
                            />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-duration">Duration</label>
                            <input
                                type="number"
                                id="basic-default-duration"
                                class="form-control"
                                name="duration"
                                placeholder="minutes"
                            />
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
                        <button type="submit" class="btn btn-outline-primary mr-3">Send</button>
                        <a type="button" class="btn btn-outline-warning" href="{{route('movies.index')}}">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/js/multi-select-tag.js"></script>
    <script>
        new MultiSelectTag('category_ids',{
            tagColor: {
                textColor: '#696cff',
                borderColor: '#696cff',
                bgColor: 'rgba(105, 108, 255, 0.16)',
            },
        })  // id
    </script>
@endsection
