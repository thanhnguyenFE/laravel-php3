@extends('admin.layouts.app')
@section('main-content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-flex align-items-center justify-content-between">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Movies /</span> {{$movie->title}}</h4>
            <form method="post" action="{{route('movies.destroy', $movie->id)}}">
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
                        <td>Thumbnail</td>
                        <td><img src="{{asset('storage/movies/'.$movie->thumbnail)}}" alt="{{$movie->title}}" class="img-fluid rounded me-3 w-[100px] h-[100px]"></td>
                    </tr>
                    <tr>
                        <td>Title</td>
                        <td>{{$movie->title}}</td>
                    </tr>
                    <tr>
                        <td>Slug</td>
                        <td>{{$movie->slug}}</td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>{{$movie->description}}</td>
                    </tr>
                    <tr>
                        <td>Release Date</td>
                        <td>{{$movie->release_date}}</td>
                    </tr>
                    <tr>
                        <td>Duration</td>
                        <td>{{$movie->duration}}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>
                            @if ($movie->status == 1)
                                <i class='bx bx-check-circle check icon text-success'></i> <!-- Check icon -->
                            @else
                                <i class='bx bx-x-circle cross icon text-danger'></i> <!-- Cross icon -->
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Categories</td>
                        <td>
                            @foreach($movie->categories as $category)
                                <span class="badge bg-label-primary me-1">{{ $category->name }}</span>
                            @endforeach
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
    </div>
@endsection
