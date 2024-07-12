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
        <div class="d-flex align-items-center justify-content-between mt-4">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Comments /</span> List</h4>
        </div>
        <div class="card">
            <div class="table-responsive text-nowrap">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Avatar</th>
                        <th>User</th>
                        <th>Content</th>
                        <th>Date</th>
                        <th>Rating</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($comments as $comment)
                        <tr class="cursor-pointer">
                            <td><img src="{{$comment->user->avatar ? asset('storage/avatars/'.$comment->user->avatar) : asset('img/avatars/1.png')}}" alt="{{$comment->user->name}}" class="img-fluid rounded-full me-3 w-[50px] h-[50px]"></td>
                            <td>{{$comment->user->name}}</td>
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
                                        <a class="dropdown-item" data-comment-id="{{ $comment->id }}" data-bs-toggle="modal" data-bs-target="#showCommentDetailModal">
                                            <i class="bx bx-show me-1 text-info"></i> Show
                                        </a>
                                        <a class="dropdown-item" data-comment-id="{{ $comment->id }}" data-bs-toggle="modal" data-bs-target="#showCommentEditModal"
                                        ><i class="bx bx-edit-alt me-1 text-warning"></i> Edit</a
                                        >
                                        <form method="post" action="{{route('comments.destroy', $comment->id)}}" id="deleteForm-{{ $comment->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="dropdown-item" data-comment-id="{{ $comment->id }}" data-bs-toggle="modal" data-bs-target="#confirmDeleteCommentModal">
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
                        <th>Avatar</th>
                        <th>User</th>
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
        <div class="modal fade" id="confirmDeleteCommentModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-3xl text-secondary">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to delete this comment?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-outline-danger" id="confirmDeleteButton" data-bs-dismiss="modal">Delete</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="showCommentDetailModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div></div>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-3xl text-secondary">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body-comment-detail">
                        <div class="card">
                            <div class="table-responsive text-nowrap">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Value</th>
                                    </tr>
                                    </thead>
                                    <tbody id="tbody-comment-detail">
                                        <tr><td>Content</td><td>Hay</td></tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="showCommentEditModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <div></div>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true" class="text-3xl text-secondary">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="modal-body-comment-edit"></div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-primary mr-3" id="input-submit-edit">Send</button>
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            let commentId;
            $('#confirmDeleteCommentModal').on('show.bs.modal', function (event) {
                let button = $(event.relatedTarget);
                commentId = button.data('comment-id');
                console.log('comment ID:', commentId);
            });

            $('#confirmDeleteButton').click(function() {
                $('#deleteForm-' + commentId).submit();
            });

            $('#showCommentDetailModal').on('show.bs.modal', function (event) {
                let button = $(event.relatedTarget);
                commentId = button.data('comment-id');
                $.ajax({
                    url: '/admin/comments/show',
                    type: 'GET',
                    data: { comment_id: commentId },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        var body = $('#tbody-comment-detail');
                        body.empty();
                        var content = `
                        <tr><td>User</td> <td><img class="img-fluid rounded-full me-3 w-[50px] h-[50px] mb-2" src="${ data.user.avatar ? '/storage/' + data.user.avatar : '/img/avatars/1.png' }"> ${data.user.name}</td></tr>

                        <tr><td>Movie</td> <td>${data.movie.title}</td></tr>
                        <tr><td>Thumbnail</td> <td><img class="img-fluid rounded me-3 w-[100px] h-[100px] mb-2" src="${ data.movie.thumbnail ? '/storage/movies/' + data.movie.thumbnail : '/img/avatars/1.png' }"></td></tr>
                        <tr><td>Content</td> <td>${data.content}</td></tr>

                        <tr><td>Date</td> <td>${data.date}</td></tr>

                        <tr><td>Rating</td>
                        <td>`;
                        for (var i = 1; i <= data.rating; i++) {
                            content += "<i class='bx bxs-star text-warning'></i>";
                        }
                        content += `</td></tr>
                        <tr><td>Status</td>
                        <td>`;
                        content += data.status == 1 ? "<i class='bx bx-check-circle check icon text-success'></i>" : "<i class='bx bx-x-circle cross icon text-danger'></i>";
                        content += `</td></tr>`;
                        body.html(content);
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            });

            $('#showCommentEditModal').on('show.bs.modal', function (event) {
                let button = $(event.relatedTarget);
                commentId = button.data('comment-id');
                $.ajax({
                    url: '/admin/comments/show',
                    type: 'GET',
                    data: { comment_id: commentId },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(data) {
                        var body = $('#modal-body-comment-edit');
                        console.log(body);
                        body.empty();
                        var content = `
                        <form action="/admin/comments/${data.id}/update" method="POST" id="editForm-${data.id}">
                            <input type="hidden" name="_method" value="PATCH">
                            <input type="hidden" name="comment_id" value="${data.id}">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}">

                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="${data.movie.title}" disabled/>
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea class="form-control" id="content" name="content" rows="5">${data.content}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="rating" class="form-label">Rating</label>
                                <select class="form-control" id="rating" name="rating">
                                    <option value="1" ${data.rating == 1 ? 'selected' : ''}>1</option>
                                    <option value="2" ${data.rating == 2 ? 'selected' : ''}>2</option>
                                    <option value="3" ${data.rating == 3 ? 'selected' : ''}>3</option>
                                    <option value="4" ${data.rating == 4 ? 'selected' : ''}>4</option>
                                    <option value="5" ${data.rating == 5 ? 'selected' : ''}>5</option>
                                </select>
                            </div>
                            <div class="mb-3">
                            <label class="form-label d-block" for="basic-default-status">Status</label>
                            <div class="form-check form-check-inline">
                                <input type="checkbox" class="form-check-input" id="status" value="1" name="status" ${data.status == 1 ? 'checked' : ''}/>
                                <label class="form-check-label" for="status">Active</label>
                            </div>
                        </div>
                        </form>
                        `;
                        body.html(content);

                        $('#input-submit-edit').on('click', function(e) {
                            e.preventDefault();
                            $('#editForm-' + commentId).submit();
                        });

                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            })
        });
    </script>
@endsection
