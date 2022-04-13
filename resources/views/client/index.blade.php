@extends('base')

@section('content')
    <form action="">
        @csrf
        <input type="hidden" id="csrf_token" value="{{ csrf_token() }}">
    </form>
    <input type="hidden" id="response" value="{{$response}}">
    <main class="bg-gradient bg-primary">
        <nav class="navbar navbar-marketing navbar-expand-lg bg-transparent navbar-dark">
            <div class="container px-5">
                <a href="/" class="navbar-brand text-white fs-3 myLobster2">Wheather Tracker App</a>
                @guest
                    <a href="{{ route('login') }}">
                        <button class="btn btn-outline-light">Sign In</button>
                    </a>
                @else
                    <a href="{{ route('logout') }}">
                        <button class="btn btn-outline-light">Log out</button>
                    </a>
                @endguest
            </div>
        </nav>
        <div class="col-12 row justify-content-center mt-5">
            <div class="row justify-content-center" style="width: 1000px;">
                <div style="width: 180px;">
                    <select name="city" id="city" onchange="ChangeDataNow()"
                            class="form-select-lg bg-primary text-light
                            myLibre border-light btn-outline-light shadow">
                        <option value="Abu Dhabi">Abu Dhabi</option>
                        <option value="Dubai">Dubai</option>
                        <option value="Sharjah">Sharjah</option>
                    </select>
                    <button class="btn bg-gradient btn-success mt-5"
                            onclick="getCurrentWeather()">Refresh now</button>
                </div>
                <div style="width: 780px;">
                    <div class="row flex-wrap justify-content-center">
                        <div style="width: 250px; padding: 10px;">
                            <i class="wi wi-day-sleet-storm text-light bigIcon" id="iconNow"></i>
                            <div class="text-light fs-2 mt-5" id="descNow"></div>
                        </div>
                        <div style="max-width: 530px;" class="row flex-wrap">
                            <div style="width: 150px; color: white; margin: 10px 0 0 10px;">
                                <div>
                                    <i class="wi wi-thermometer mediumIcon"></i>
                                    <span style="font-size: 40px;" id="tempNow"></span>
                                    <i class="wi wi-degrees mediumIcon"></i>
                                </div>
                                <div>
                                    <span>Feels like: </span><span id="feelNow"></span>
                                    <i class="wi wi-degrees"></i>
                                </div>
                            </div>
                            <div style="width: 150px; color: white; margin: 10px 0 0 10px;">
                                <i class="wi wi-humidity mediumIcon"></i>
                                <span style="font-size: 40px;" id="humidityNow"></span>
                            </div>
                            <div style="width: 170px; color: white; margin: 10px 0 0 10px;">
                                <div>Pressure: <span id="pressureNow"></span> kPa</div>
                                <div>Visibility: <span id="visibNow"></span> km</div>
                            </div>
                            <div style="width: 230px; color: white; margin: 10px 0 0 10px;">
                                <i class="wi wi-strong-wind smallIcon"></i>
                                <span style="font-size: 30px;"><span id="windNow"></span> km/h</span>
                            </div>
                            <div style="width: 230px; color: white; margin: 10px 0 0 10px;">
                                <div class="row col-12">
                                    <div class="col-3">
                                        <i class="wi wi-sunrise smallIcon"></i>
                                    </div>
                                    <div class="col-9">
                                        <div>Sunrise at <span id="sunriseNow"></span></div>
                                    </div>
                                </div>
                                <div class="row mt-2 col-12">
                                    <div class="col-3">
                                        <i class="wi wi-sunset smallIcon"></i>
                                    </div>
                                    <div class="col-9">
                                        <div>Sunset at <span id="sunsetNow"></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div style="padding: 20px;">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-outline-info" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Filter
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header bg-gradient bg-info">
                        <h5 class="modal-title" id="exampleModalLabel">Filter</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-12 row justify-content-around bg-light">
                            <div class="card col-5 p-0 mt-2">
                                <div class="card-header">City</div>
                                <div class="card-body">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input cities" type="checkbox"
                                               id="abu_dhabi_check"
                                               data-name="Abu Dhabi" checked>
                                        <label class="form-check-label" for="abu_dhabi_check">Abu Dhabi, UAE</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input cities" type="checkbox"
                                               id="dubai_check"
                                               data-name="Dubai" checked>
                                        <label class="form-check-label" for="dubai_check">Dubai, UAE</label>
                                    </div>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input cities" type="checkbox"
                                               id="sharjah_check"
                                               data-name="Sharjah" checked>
                                        <label class="form-check-label" for="sharjah_check">Sharjah, UAE</label>
                                    </div>
                                </div>
                            </div>
                            <div class="card col-5 p-0 mt-2">
                                <div class="card-header">Date range</div>
                                <div class="card-body">
                                    <input class="form-control text-dark" id="dateStart" type="text"
                                           placeholder="begin date">
                                    <input class="form-control text-dark mt-2" id="dateEnd" type="text"
                                           placeholder="end date">
                                </div>
                            </div>
                            <div class="card col-5 p-0 mt-2">
                                <div class="card-header">Temperature</div>
                                <div class="card-body">
                                    <input class="form-control text-dark" id="temp_above" type="text"
                                           placeholder="above">
                                    <input class="form-control text-dark mt-2" id="temp_below" type="text"
                                           placeholder="below">
                                </div>
                            </div>
                            <div class="card col-5 p-0 mt-2">
                                <div class="card-header">Weather condition</div>
                                <div class="card-body">
                                    <select class="form-select" multiple aria-label="multiple select example"
                                            id="weather_conditions">
                                        @foreach($weather_conditions as $cond)
                                            <option selected value="{{$cond->condition_id}}">
                                                {{ $cond->condition_desc }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="imitateClose">Close</button>
                        <button type="button" class="btn btn-info"
                                onclick="showHistory()">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script src="{{asset('js/datepicker.min.js')}}"></script>
    <script src="{{asset('js/imask.js')}}"></script>
    <script>
        let datepickerOptions = {
            startDay: 1,
            position: 'br',
            customDays: ['Sat', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sun'],
            customMonths: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
            formatter: (input, date, instance) => {
                let day = (date.getDate() < 10 ? '0' : '') + date.getDate();
                let month = ((date.getMonth() + 1) < 10 ? '0' : '') + (date.getMonth() + 1);
                input.value = day + '.' + month + '.' + date.getFullYear();
            },
        }
        datepicker('#dateStart', datepickerOptions);
        datepicker('#dateEnd', datepickerOptions);

        let mask1 = IMask(
            document.getElementById('dateStart'), {
                mask: '00.00.0000'
            }
        ) , mask2 = IMask(
            document.getElementById('dateEnd'), {
                mask: '00.00.0000'
            }
        );
    </script>
    <script>
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function () {
            myInput.focus()
        })


    </script>
    <script>


        document.addEventListener('DOMContentLoaded', ()=>{
            ChangeDataNow();
            showHistory();
        });

        function ChangeDataNow()
        {
            let weatherNow = JSON.parse(document.getElementById('response').value);

            let city = document.getElementById('city').value;
            let data = weatherNow[city];

            let record = data.record,
                icon = document.getElementById('iconNow'),
                sunrise = new Date(record.sunrise * 1000),
                sunset = new Date(record.sunset * 1000),
                formattedSunrise = sunrise.getHours() + ':' + ('0' + sunrise.getMinutes()).substr(-2),
                formattedSunset = sunset.getHours() + ':' + ('0' + sunset.getMinutes()).substr(-2);

            icon.setAttribute('class', 'wi text-light bigIcon ' + data.day_icon);
            document.getElementById('descNow').innerHTML = record.weather_condition_desc;
            document.getElementById('tempNow').innerHTML = Math.trunc(record.temperature);
            document.getElementById('feelNow').innerHTML = Math.trunc(record.feels_like);
            document.getElementById('humidityNow').innerHTML = Math.trunc(record.humidity);
            document.getElementById('pressureNow').innerHTML = Math.trunc(record.pressure / 10);
            document.getElementById('visibNow').innerHTML = Math.trunc(record.visibility / 1000);
            document.getElementById('windNow').innerHTML = Math.trunc(record.wind_speed);
            document.getElementById('sunriseNow').innerHTML = formattedSunrise;
            document.getElementById('sunsetNow').innerHTML = formattedSunset;
        }

        function getCurrentWeather()
        {
            loaderOn();
            fetch('/current').then((response) => response.json()).then((data) => {

                document.getElementById('response').value = data;
                ChangeDataNow();
                loaderOff();
            });
        }

        async function showHistory()
        {
            loaderOn();
            document.getElementById('imitateClose').click();
            let oldData = document.querySelectorAll('.history');
            for (let el of oldData){
                el.remove();
            }

            let cities = [],
            citySelect = document.querySelectorAll('.cities');

            for(let el of citySelect){
                if (el.checked) {
                    cities.push(el.dataset.name);
                }
            }

            let date = new Date();

            let endDate = ('0' + date.getDate()).substr(-2,2) +
                '.' + ('0' + (date.getMonth()+1)).substr(-2, 2) +
                '.' + date.getFullYear();
            date = new Date(date.getFullYear(), date.getMonth(), date.getDate() - 14);

            let startDate = ('0' + date.getDate()).substr(-2,2) +
                '.' + ('0' + (date.getMonth()+1)).substr(-2, 2) +
                '.' + date.getFullYear();

            let dateStart = document.getElementById('dateStart').value ? document.getElementById('dateStart').value : startDate,
                dateEnd = document.getElementById('dateEnd').value ? document.getElementById('dateEnd').value : endDate,
                temp_above = document.getElementById('temp_above').value ? document.getElementById('temp_above').value : -30,
                temp_below = document.getElementById('temp_below').value ? document.getElementById('temp_below').value : 50;

            let options = [];
            for (let option of document.getElementById('weather_conditions').options) {
                if (option.selected) {
                    options.push(option.value);
                }
            }


            let formData = new FormData();
            formData.append('cities', cities);
            formData.append('startDate', dateStart);
            formData.append('endDate', dateEnd);
            formData.append('temp_above', temp_above);
            formData.append('temp_below', temp_below);
            formData.append('conditions', options);

            try{
                let response = await fetch('/getHistory', {
                    method: 'POST',
                    headers:{
                        'X-CSRF-TOKEN': document.getElementById('csrf_token').value
                    },
                    body: formData,
                });


                response = await response.json();



                let id = 0;
                for(let city in response.body){

                    if (!Object.keys(response.body[city]).length) continue;

                    id ++;
                    createHeader(id, city);
                    for(let date in response.body[city]){
                        createBody(id, date, response.body[city][date]);
                    }
                }
            }catch (e) {
                console.log(e);
            }

            loaderOff();
        }

        function createHeader(id, name){
            let div = document.createElement('div');
            div.setAttribute('class', 'col-12 p-3 history');
            div.innerHTML=
                '<div class="card">'+
                    `<div class="card-header bg-gradient bg-primary text-light myLibre fs-4">${name}</div>`+
                    `<div class="card-body row flex-wrap" id="qb${id}">`+

                    '</div>'+
                '</div>';

            document.querySelector('body').append(div);
        }

        function createBody(id, date, data){
            let div = document.getElementById('qb'+id);
            div.innerHTML +=
                '<div class="card shadow text-center text-light m-2" style="width: 150px; background: #BF55EC;">'+
                    `<div class="text-end">${date}</div>`+
                    '<div class="mt-3">'+
                        `<i class="wi ${data['day_icon']} mediumIcon"></i>`+
                    '</div>'+
                    `<div>${data['weather_condition_desc']}</div>`+
                    `<div class="fs-3">${data['temperature']}<i class="wi wi-degrees"></i></div>`+
                    `<div>Feels like: ${data['feels_like']}<i class="wi wi-degrees"></i></div>`+
                    `<div><i class="wi wi-humidity"></i>${data['humidity']}</div>`+
                    `<div><i class="wi wi-strong-wind">${data['visibility']} km/h</i></div>`+
                '</div>';
        }
    </script>
@endsection
