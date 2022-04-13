@extends('layouts.app')

@section('content')
    <div class="container-fluid row flex-wrap">
        <h1 class="myLibre text-primary">{{ $city->name }}</h1>
        @foreach($list as $key=>$val)
            <a href="{{ '/dashboard/city/'.$city->id.'/date/'.$val }}" style="width: 300px; text-decoration: none;">
                <div class="card bg-gradient shadow">
                    <div class="card-body myLibre">
                        {{ $key }}
                    </div>
                </div>
            </a>
        @endforeach
    </div>
@endsection
