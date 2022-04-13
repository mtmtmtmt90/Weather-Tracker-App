@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h1 class="myLibre text-primary">{{ $city->name.'  '.$weather->created_at->format('d.m.Y H:i:s') }}</h1>
        <form action="{{ '/dashboard/record/save/'.$weather->id }}" method="POST" id="form">
            <input type="hidden" id="token" value="{{ csrf_token() }}">
            <div class="card">
                <div class="card-header bg-info text-light fs-4">Edit</div>
                <div class="card-body row flex-wrap fs-4 justify-content-around">
                    <input type="hidden" name="record_id" value="{{ $weather->id }}">
                    <div class="col-12 col-md-5 m-1">
                        <label for="condition" class="form-label">Weather condition</label>
                        <select name="condition" id="condition" class="form-select">
                            @foreach($conditions as $condition)
                                <option value="{{$condition->condition_id}}"
                                    {{ $condition->condition_id === $weather->weather_condition_id ? 'selected' : '' }}
                                >
                                    {{ $condition->condition_desc }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-md-5 m-1">
                        <label for="temperature" class="form-label">Temperature</label>
                        <input type="text" class="form-control" name="temperature"
                               id="temperature" value="{{ $weather->temperature }}">
                    </div>
                    <div class="col-12 col-md-5 m-1">
                        <label for="feels_like" class="form-label">Feels like</label>
                        <input type="text" class="form-control" name="feels_like"
                               id="feels_like" value="{{ $weather->feels_like }}">
                    </div>
                    <div class="col-12 col-md-5 m-1">
                        <label for="humidity" class="form-label">Humidity</label>
                        <input type="text" class="form-control" name="humidity"
                               id="humidity" value="{{ $weather->humidity }}">
                    </div>
                    <div class="col-12 col-md-5 m-1">
                        <label for="wind_speed" class="form-label">Wind speed</label>
                        <input type="text" class="form-control" name="wind_speed"
                               id="wind_speed" value="{{ $weather->wind_speed }}">
                    </div>
                    <div class="col-12 col-md-5 m-1"></div>
                </div>
                <div class="card-footer text-center">
                    <button type="button" onclick="saveData()"
                            class="btn btn-outline-success col-4">Save</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        function saveData()
        {
            loaderOn();
            let data = new FormData(document.getElementById('form'))
            fetch('{{ '/dashboard/record/save/'.$weather->id }}', {
                method: 'POST',
                headers:{
                    'X-CSRF-TOKEN': document.getElementById('token').value
                },
                body: data
            }).then(response => response.json()).then((data) => {
                if (data.status) {
                    alertify.notify(data.message, 'success');
                } else {
                    alertify.notify(data.message, 'error');
                }
                loaderOff();
            }).catch((e) => {
                console.log(e);
                alertify.notify('Something went wrong', 'error');
                loaderOff();
            });
        }
    </script>
@endsection


