@extends('admin.layouts.app')
@section('main-content')
    <div class="row">
        <div class="col-xl">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Edit User</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('users.update', $user->id) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="role_id" class="form-label">Role</label>
                            <select class="form-control" id="role_id" name="role_id">
                                @foreach($roles as $role)
                                    <option value="{{ $role->id }}" @if($role->id == $user->role_id) selected @endif>{{ $role->role }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-name">Name</label>
                            <input type="text" class="form-control" id="basic-default-name" placeholder="John Doe" name="name" value="{{ $user->name }}"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-email">Email</label>
                            <input type="email" class="form-control" id="basic-default-email" placeholder="johndoe@example.com" name="email" value="{{ $user->email }}"/>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="basic-default-password">Password</label>
                            <input type="text" class="form-control" id="basic-default-password" placeholder="●●●●●●●●" name="password" value="{{$user->password}}"/>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="basic-default-phone">Phone Number</label>
                            <input type="number" class="form-control" id="basic-default-phone" placeholder="08123456789" name="phone" value="{{ $user->phone }}"/>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="basic-default-avatar">Avatar</label>
                            <input
                                type="file"
                                id="basic-default-avatar"
                                class="form-control"
                                name="avatar"
                            />
                            <img src="{{filter_var($user->avatar, FILTER_VALIDATE_URL) ? $user->avatar : asset('storage/avatars/'.$user->avatar)}}" alt="{{$user->name}}" class="img-fluid rounded me-3 w-[200px] h-[200px] mt-4">
                        </div>
                        <button type="submit" class="btn btn-outline-primary mr-3">Send</button>
                        <a type="button" class="btn btn-outline-warning" href="{{route('users.index')}}">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

