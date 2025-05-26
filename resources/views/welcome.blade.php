@extends('template')
@section('title','Welkom op onze themadagen website')
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
       Welcome gast, als je wilt meedoen moet je eerst registreren. of je kan alvast de prijs berekenen van je bagage.
    <ul class="nav nav-pills mt-3">
        <li class="nav-item">
         <a href="{{ route('register') }}" class="nav-link active">Registreren</a>
        </li>
        <li class="nav-item ms-2">
         <a href="{{ route('login') }}" class="nav-link active">Inloggen</a>
        </li>
      </ul>
    @endguest

    @livewire('luggage')
@endsection