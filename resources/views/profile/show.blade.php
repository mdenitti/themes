@extends('template')
@section('title', 'My Profile')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My Profile</div>

                <div class="card-body text-center">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($user->avatar)
                        <img src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->name }}'s Avatar" class="rounded-circle img-thumbnail mb-3" width="150" height="150">
                    @else
                        <img src="{{ asset('images/default-avatar.png') }}" alt="Default Avatar" class="rounded-circle img-thumbnail mb-3" width="150" height="150">
                    @endif

                    <h4>{{ $user->name }}</h4>
                    <p class="text-muted">{{ $user->email }}</p>

                    <a href="{{ route('profile.edit') }}" class="btn btn-primary">Edit Profile</a>
                </div>
            </div>

            {{-- Display Travel Images --}}
            @if($user->images->isNotEmpty())
            <div class="card mt-4"> {{-- Add margin top --}}
                <div class="card-header">My Travel Images</div>
                <div class="card-body">
                    <div class="row">
                        @foreach($user->images as $image)
                            <div class="col-md-4 mb-3">
                                <img src="{{ asset('storage/' . $image->path) }}" alt="User image" class="img-fluid img-thumbnail">
                                {{-- Optional: Add delete button or other actions here --}}
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
            {{-- End Display Travel Images --}}

        </div>
    </div>
</div>
@endsection
