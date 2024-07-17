@extends('admin.layouts.app')
@section('main-content')
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Create Banner</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('banners.update', $banner->id) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-title">Title</label>
                            <input type="text" class="form-control" id="basic-default-title" placeholder="John Doe" name="title" value="{{$banner->title}}"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-img">Image</label>
                            <input
                                type="file"
                                id="basic-default-img"
                                class="form-control"
                                name="image"
                            />
                            <img src="{{asset('storage/banners/'.$banner->image)}}" alt="{{$banner->title}}" class="img-fluid rounded me-3 w-[200px] h-[200px] mt-4">

                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-url">Link</label>
                            <input
                                type="text"
                                id="basic-default-url"
                                class="form-control"
                                name="url"
                                placeholder="https://example.com"
                                value="{{$banner->url}}"
                            />
                        </div>

                        <div class="mb-3">
                            <label class="form-label d-block" for="basic-default-status">Status</label>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" id="status" value="1" name="status" @if($banner->status == 1) checked @endif/>
                                <label class="form-check-label" for="status">Active</label>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-outline-primary mr-3">Send</button>
                        <a type="button" class="btn btn-outline-warning" href="{{route('banners.index')}}">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
