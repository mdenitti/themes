@extends('template')
@section('title','Unieke steden in de wereld')
@section('content')
  @auth {{-- Only show this if logged in --}}
  
    <div class="user-info mb-4 text-center">
        @if(Auth::user()->avatar)
            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->name }}'s Avatar" class="rounded-circle" width="80" height="80">
        @else
            {{-- Fallback image --}}
            <img src="{{ asset('images/default-avatar.png') }}" alt="Default Avatar" class="rounded-circle" width="80" height="80">
        @endif
        <h4 class="mt-2">Welcome, {{ Auth::user()->name }}!</h4>
    </div>
    @endauth

    @guest {{-- Show this if not logged in --}}
       Welcome gast, als je wilt meedoen moet je eerst registreren.
       <div class="">
           <a href="{{ route('register') }}" class="btn btn-primary">Registreren</a>
           <a href="{{ route('login') }}" class="btn btn-secondary">Inloggen</a>
         </div>
    @endguest
@endsection