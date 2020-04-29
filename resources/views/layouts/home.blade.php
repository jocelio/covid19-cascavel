<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Cascavel Covid 19</title>
        <meta name="title" content="Cascavel Covid 19">
        <meta name="description" content="Informações sobre o acompanhamento dos casos de Corona Vírus (Covid19) no muninípio de Cascavel">
        <meta property="og:title" content="Cascavel Covid 19" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="http://covid19-cascavel.herokuapp.com/" />
        <meta property="og:image" content="http://covid19-cascavel.herokuapp.com/images/covid-19.jpg" />
        <meta property="og:image:width" content="675" />
        <meta property="og:image:height" content="1000" />
        <!-- Fonts -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
            <div class="row text-center">
                <div class="col">
                    Desenvolvido por: Jocélio Lima |
                </div>
            </div>
        </div>
        </div>
    </body>
</html>
