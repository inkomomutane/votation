<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 35px;
            }

            .links > a {
               
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            /* Style the video: 100% width and height to cover the entire window */
#myVideo {
  position: fixed;
  right: 0;
  bottom: 0;
  min-width: 100%;
}

/* Add some content at the bottom of the video/page */
.content {
  position: fixed;
  bottom: 0;
  background: rgba(255, 255, 255, 0.8);
  color: #0e0d0d;
  width: 100%;
  padding: 20px;
}

        </style>
    </head>
    <body class="content">
       
    <video   autoplay muted loop id="myVideo" preload="auto" >
        <source src="{{ asset('/storage/background.mp4') }}" type="video/mp4"></source>
    </video>

        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ route('voter.dashboard') }}">{{ __('Dashboard') }}</a>
                    @else
                        <a href="{{ route('login') }}">{{ __('Login') }}</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">{{ __('Register') }}</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Bem vindo ao Sistema de Votação Online
                </div>
                <small>
                    <strong  style="font-weight: bold">Antes de você votar, precisa criar uma conta ou <a href="{{ route('register') }}" style="text-decoration: none">{{ __('Register') }}</a> e receberas um email pedindo a confirmação deste.</strong>
                </small>
               
                <div class="">
                     <br>
                    <a href="{{ route('login') }}" style="font-weight: bold; color:blue;">Votar</a>
                </div>
                <br>
                <br>
                <strong style="font-weight: bold"> Criado por <a href="{{ url('mailto:nelson.mutane@uzambeze.ac.mz') }}">Nelson Alexandre Mutane</a></strong>
                <br><strong style="font-weight: bold"><a href="mailto:nelsonmutane@gmail.com">Gmail</a></strong>
                <strong style="font-weight: bold"><a href="{{ url('https://www.linkedin.com/in/nelson-mutane/') }}">Linkedin</a></strong>

            </div>
        </div>

    </body>
</html>
