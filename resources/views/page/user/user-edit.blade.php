@extends('layouts.app')
<link rel="stylesheet" href="dist/css/app.css" />
@section('content')

<div class="content">
    <h2 class="intro-y text-lg font-medium mt-10">
        Edit User Information 
    </h2>
    <div class="container py-6 mx-auto">

        <form method="post" action="{{ route('users.update', $user->id) }}">
            @method('patch')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">First Name</label>
                <input value="{{ $user->fname }}" 
                    type="text" 
                    class="form-control" 
                    name="fname" 
                    placeholder="First Name" required>

                @if ($errors->has('name'))
                    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Last Name</label>
                <input value="{{ $user->lname }}" 
                    type="text" 
                    class="form-control" 
                    name="lname" 
                    placeholder="Last Name" required>

                @if ($errors->has('name'))
                    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input value="{{ $user->email }}"
                    type="email" 
                    class="form-control" 
                    name="email" 
                    placeholder="Email address" required>
                @if ($errors->has('email'))
                    <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                @endif
            </div>
            {{-- <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input value="{{ $user->username }}"
                    type="text" 
                    class="form-control" 
                    name="username" 
                    placeholder="Username" required>
                @if ($errors->has('username'))
                    <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                @endif
            </div> --}}
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <select class="form-control" 
                    name="role" required>
                    <option value="">Select role</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}"
                            {{ in_array($role->name, $userRole) 
                                ? 'selected'
                                : '' }}>{{ $role->name }}</option>
                    @endforeach
                </select>
                @if ($errors->has('role'))
                    <span class="text-danger text-left">{{ $errors->first('role') }}</span>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Update user</button>
            <a href="{{ route('users.index') }}" class="btn btn-default">Cancel</button>
        </form>

    </div>
</div>
<!-- BEGIN: Delete Confirmation Modal -->
@include('page.modals.delete-confirmation')
<!-- END: Delete Confirmation Modal -->
@endsection