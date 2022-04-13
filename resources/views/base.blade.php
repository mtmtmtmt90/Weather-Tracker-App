<!DOCTYPE html>

<html lang="en">
    <head>
        <title>Weather Tracker</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="{{asset('js/bootstrap.bundle.min.js')}}" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="{{asset('js/bootstrap.min.js')}}" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Lobster+Two:wght@700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/weather-icons.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/weather-icons-wind.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/datepicker.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/alertify.min.css')}}">

        <style>
            .myLibre{
                font-family: 'Libre Baskerville', sans-serif !important;
            }
            .myLobster{
                font-family: 'Lobster', sans-serif !important;
            }
            .myPacifico{
                font-family: 'Pacifico', sans-serif !important;
            }
            .myLobster2{
                font-family: 'Lobster Two', sans-serif !important;
            }
            .bigIcon{
                font-size: 100px;
            }
            .mediumIcon{
                font-size: 50px;
            }
            .smallIcon{
                font-size: 30px;
            }
        </style>

        <style>
            html {
                height: 100%;
                margin: 0;
                padding: 0;
            }


            .loaderFrame{
                position: fixed;
                z-index: 11;
                width: 100%;
                height: 100%;
                background: rgba(0,0,0,0.5);
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
    <script src="{{asset('js/alertify.min.js')}}"></script>
    <script>
        window.onload = loaderOff();
    </script>

        @yield('content')

        @yield('script')
    </body>
</html>
