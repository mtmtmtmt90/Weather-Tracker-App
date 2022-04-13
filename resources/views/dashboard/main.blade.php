@extends('layouts.app')

@section('content')
    <div class="container-fluid row flex-wrap">
        @foreach($cities as $city)
            <a href="{{ '/dashboard/city/'.$city->id }}" style="width: 300px; text-decoration: none;" class="m-1">
                <div class="card bg-gradient shadow">
                    <div class="card-body myLibre">
                        <div class="smallIcon">{{ $city->name }}</div>
                        <div>Latitude: {{ $city->latitude }}</div>
                        <div>Longitude: {{ $city->longitude }}</div>
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection
