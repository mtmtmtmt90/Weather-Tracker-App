<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Weather Tracker App</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{asset('js/alertify.min.js')}}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/alertify.min.css')}}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster+Two:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/weather-icons.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/weather-icons-wind.min.css')}}">
{{--    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">--}}
{{--    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>--}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .myLibre {
            font-family: 'Libre Baskerville', sans-serif !important;
        }

        .myLobster {
            font-family: 'Lobster', sans-serif !important;
        }

        .myPacifico {
            font-family: 'Pacifico', sans-serif !important;
        }

        .myLobster2 {
            font-family: 'Lobster Two', sans-serif !important;
        }

        .bigIcon {
            font-size: 100px;
        }

        .mediumIcon {
            font-size: 50px;
        }

        .smallIcon {
            font-size: 30px;
        }
    </style>

    <style>
        html {
            height: 100%;
            margin: 0;
            padding: 0;
        }


        .loaderFrame {
            position: fixed;
            z-index: 11;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }

        .loader {
            position: fixed;
            top: calc(50% - 32px);
            left: calc(50% - 32px);
            width: 64px;
            height: 64px;
            border-radius: 50%;
            perspective: 800px;
        }

        .inner {
            position: absolute;
            box-sizing: border-box;
            width: 100%;
            height: 100%;
            border-radius: 50%;
        }

        .inner.one {
            left: 0%;
            top: 0%;
            animation: rotate-one 1s linear infinite;
            border-bottom: 3px solid #EFEFFA;
        }

        .inner.two {
            right: 0%;
            top: 0%;
            animation: rotate-two 1s linear infinite;
            border-right: 3px solid #EFEFFA;
        }

        .inner.three {
            right: 0%;
            bottom: 0%;
            animation: rotate-three 1s linear infinite;
            border-top: 3px solid #EFEFFA;
        }

        @keyframes rotate-one {
            0% {
                transform: rotateX(35deg) rotateY(-45deg) rotateZ(0deg);
            }
            100% {
                transform: rotateX(35deg) rotateY(-45deg) rotateZ(360deg);
            }
        }

        @keyframes rotate-two {
            0% {
                transform: rotateX(50deg) rotateY(10deg) rotateZ(0deg);
            }
            100% {
                transform: rotateX(50deg) rotateY(10deg) rotateZ(360deg);
            }
        }

        @keyframes rotate-three {
            0% {
                transform: rotateX(35deg) rotateY(55deg) rotateZ(0deg);
            }
            100% {
                transform: rotateX(35deg) rotateY(55deg) rotateZ(360deg);
            }
        }
    </style>

</head>
<body>
<div class="loaderFrame">
    <div class="loader">
        <div class="inner one innerOne"></div>
        <div class="inner two innerTwo"></div>
        <div class="inner three innerThree"></div>
    </div>
</div>
<script src="{{asset('js/helper.js')}}"></script>
<script>
    window.onload = loaderOff();
</script>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-gradient bg-primary shadow-sm">
        <div class="container">
            <a class="navbar-brand text-light myLibre" href="{{ url('/dashboard/') }}">
                Weather Tracker App Dashboard
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- Authentication Links -->
                    @guest
                        {{--                            @if (Route::has('login'))--}}
                        {{--                                <li class="nav-item">--}}
                        {{--                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
                        {{--                                </li>--}}
                        {{--                            @endif--}}

                        {{--                            @if (Route::has('register'))--}}
                        {{--                                <li class="nav-item">--}}
                        {{--                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
                        {{--                                </li>--}}
                        {{--                            @endif--}}
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
{{--    <div class="container-fluid mt-2">--}}
{{--        <nav aria-label="breadcrumb">--}}
{{--            <ol class="breadcrumb">--}}
{{--                <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
{{--                <li class="breadcrumb-item"><a href="#">Library</a></li>--}}
{{--                <li class="breadcrumb-item active" aria-current="page">Data</li>--}}
{{--            </ol>--}}
{{--        </nav>--}}
{{--    </div>--}}

    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
