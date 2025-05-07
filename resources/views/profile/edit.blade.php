@extends('template')
@section('title', 'Edit Profile')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- Profile Update Form --}}
            <div class="card mb-4"> {{-- Added margin bottom --}}
                <div class="card-header">Edit Profile Information</div>
                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- Current Avatar Display --}}
                        <div class="mb-3 text-center">
                            <label class="form-label">Current Avatar</label><br>
                            @if($user->avatar)
                                <img src="{{ asset('storage/' . $user->avatar) }}" alt="Current Avatar" class="rounded-circle img-thumbnail mb-2" width="100" height="100">
                            @else
                                {{-- Assuming you have a default avatar image --}}
                                <img src="{{ asset('images/default-avatar.png') }}" alt="Default Avatar" class="rounded-circle img-thumbnail mb-2" width="100" height="100">
                            @endif
                        </div>

                        {{-- Name Field --}}
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->name) }}" required>
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Email Field --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">Email Address</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" required>
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Single Avatar Upload Field --}}
                        <div class="mb-3">
                            <label for="avatar" class="form-label">Change Avatar (Optional)</label>
                            <input id="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar">
                            <small class="form-text text-muted">Max file size: 1MB. Allowed types: jpg, png, gif.</small>
                            @error('avatar')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Password Fields (Optional) --}}
                        {{-- 
                        <hr>
                        <h5>Change Password (Optional)</h5>
                        <div class="mb-3">
                            <label for="current_password" class="form-label">Current Password</label>
                            <input id="current_password" type="password" class="form-control @error('current_password') is-invalid @enderror" name="current_password">
                            @error('current_password')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="new_password" class="form-label">New Password</label>
                            <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password">
                            @error('new_password')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="new_password_confirmation" class="form-label">Confirm New Password</label>
                            <input id="new_password_confirmation" type="password" class="form-control" name="new_password_confirmation">
                        </div> 
                        --}}

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('profile.show') }}" class="btn btn-secondary me-2">Cancel</a>
                            <button type="submit" class="btn btn-primary">
                                Update Profile
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Travel Image Upload Form --}}
            <div class="card">
                <div class="card-header">Upload Travel Images</div>
                <div class="card-body">
                    {{-- Point this form to a new route/controller method --}}
                    <form method="POST" action="{{ route('profile.images.upload') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="images" class="form-label">Select Images</label>
                            <input id="images" type="file" class="form-control @error('images.*', 'imageUpload') is-invalid @enderror" name="images[]" multiple required> {{-- Added required --}}
                            <small class="form-text text-muted">You can upload multiple images. Max file size per image: 2MB. Allowed types: jpg, png, gif.</small>
                            {{-- Use a specific error bag 'imageUpload' to avoid conflicts --}}
                            @error('images.*', 'imageUpload')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success">
                                Upload Selected Images
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
