@extends('layout')
@section('title','My cities')
@section('content')
    @foreach($cities as $city)
        {{$city->name}}<hr>
    @endforeach
@endsection