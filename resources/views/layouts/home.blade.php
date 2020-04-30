<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Covid-19 Cascavel</title>
        <meta name="title" content="Covid-19 Cascavel">
        <meta name="description" content="Informações sobre os casos de Corona Vírus (Covid19) no muninípio de Cascavel">
        <meta property="og:title" content="Covid-19 Cascavel" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="http://covid19-cascavel.herokuapp.com/" />
        <meta property="og:image" content="{{ asset('images/covid-19.jpg') }}" />
        <meta property="og:image:width" content="675" />
        <meta property="og:image:height" content="1000" />
        <!-- Fonts -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-165001958-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-165001958-1');
        </script>

    </head>
    <body>
    <div class="container bg-white">
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/report') }}">Reports</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                    @endauth
                </div>
            @endif
        </div>
            @yield('content')
        <div>
        <hr/>
            <div class="row text-center p-4">
                <div class="col">
                    Desenvolvido por:
                    <a href="https://www.instagram.com/jocelio.iam/">Jocélio Lima</a> |
                    <a href="https://www.instagram.com/benemota.ds/">Bené Mota</a> |
                    <a href="https://github.com/flavioVitoriano">Flávio Vitoriano</a> |
                    <a href="https://www.instagram.com/rodrigosoares.alb/">Rodrigo Soares</a>
                </div>
            </div>
        </div>
        </div>
    </body>
</html>
