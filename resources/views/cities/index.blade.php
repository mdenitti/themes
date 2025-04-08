@extends('template')
@section('title','Cities Around the World')
@section('content')
    <div class="container">
       
        
        <div class="row">
            @foreach($cities as $city)
                <div class="col-md-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">{{ $city->name }}</h4>
                            <h6 class="card-subtitle mb-2 text-muted">{{ $city->country }} ({{ $city->continent }})</h6>
                            <p class="card-text">
                                Population: {{ number_format($city->population) }}<br>
                                @if($city->is_capital)
                                    <span class="badge bg-success">Capital City</span>
                                @endif
                                @if($city->annual_tourists)
                                    <span class="badge bg-info">{{ number_format($city->annual_tourists) }} million annual tourists</span>
                                @endif
                            </p>
                            <p class="card-text">
                                <small>Known for: {{ $city->known_for }}</small>
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="d-flex justify-content-center mt-4">
            {{ $cities->links('vendor.pagination.custom') }}
        </div>
    </div>
@endsection