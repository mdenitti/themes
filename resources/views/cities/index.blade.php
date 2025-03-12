@extends('template')
@section('title','Unieke steden in de wereld')
@section('content')
    @foreach($cities as $city)
        {{$city->name}}<hr>
    @endforeach

    {{ Request::path()}}
@endsection