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
        <div class="card mt-4">
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>User</th>
                        <th>Movie</th>
                        <th>Content</th>
                        <th>Date</th>
                        <th>Rating</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($comments as $comment)
                        <tr class="cursor-pointer" data-bs-toggle="modal" data-bs-target="#modalShowDetailMovie">
                            <td>{{$comment->user->name}}</td>
                            <td>
                                {{$comment->movie->title}}
                            </td>
                            <td>{{$comment->content}}</td>
                            <td>{{$comment->date}}</td>
                            <td>
                                @for($i=1; $i<=$comment->rating; $i++)
                                    <i class='bx bxs-star text-warning'></i>
                                @endfor
                            </td>
                            <td>
                                @if ($comment->status == 1)
                                    <i class='bx bx-check-circle check icon text-success'></i> <!-- Check icon -->
                                @else
                                    <i class='bx bx-x-circle cross icon text-danger'></i> <!-- Cross icon -->
                                @endif
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{route('categories.show', $category->id)}}"
                                        ><i class="bx bx-show me-1 text-info"></i> Show</a
                                        >
                                        <a class="dropdown-item" href="{{route('categories.edit', $category->id)}}"
                                        ><i class="bx bx-edit-alt me-1 text-warning"></i> Edit</a
                                        >
                                        <form method="post" action="{{route('categories.destroy', $category->id)}}" id="deleteForm-{{ $category->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="dropdown-item" data-category-id="{{ $category->id }}" data-bs-toggle="modal" data-bs-target="#confirmDeleteCategoryModal">
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
                        <th>User</th>
                        <th>Movie</th>
                        <th>Content</th>
                        <th>Date</th>
                        <th>Rating</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
