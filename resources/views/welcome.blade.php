@extends('template')
@section('title','Unieke steden in de wereld')
@section('content')
    @php
    $products = App\Models\Category::find(1)->products; // Collection of products
    @endphp
    @foreach ($products as $product) 
        {{$product->name}} <hr>
    @endforeach
@endsection