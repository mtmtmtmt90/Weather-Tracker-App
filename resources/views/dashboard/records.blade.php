@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="myLibre text-primary">{{ $city->name.'  '.$weathers->first()->created_at->format('d.m.Y') }}</h1>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Weather Condition Description</th>
                    <th scope="col">Temperature <i class="wi wi-degrees"></i></th>
                    <th scope="col">Feels like <i class="wi wi-degrees"></i></th>
                    <th scope="col">Humidity %</th>
                    <th scope="col">Wind speed km/h</th>
                    <th scope="col">Time</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($weathers as $key=>$weather)
                    <tr>
                        <th scope="row">{{$weather->id}}</th>
                        <td>{{ $weather->weather_condition_desc }}</td>
                        <td>{{ $weather->temperature }}</td>
                        <td>{{ $weather->feels_like }}</td>
                        <td>{{ $weather->humidity }}</td>
                        <td>{{ $weather->wind_speed }}</td>
                        <td>{{ $weather->created_at->format('H:i:s') }}</td>
                        <td>
                            <a href="{{'/dashboard/record/edit/'.$weather->id}}">
                                <i class="wi wi-refresh-alt text-warning smallIcon"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $weathers->links() }}
    </div>
@endsection
