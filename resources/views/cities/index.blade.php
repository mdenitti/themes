@extends('template')
@section('title','Unieke steden in de wereld')
@section('content')
    @foreach ($cities as $city)
    <div class="city">
        <h2>{{ $city->name }}</h2>
        <p>{{ $city->country }} ({{ $city->continent }})</p>
        <p>Population: {{ number_format($city->population) }}</p>
    </div>
@endforeach

{{ $cities->links('vendor.pagination.custom') }}
@endsection