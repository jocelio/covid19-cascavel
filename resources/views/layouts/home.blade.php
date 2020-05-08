<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Covid-19 Cascavel</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="msapplication-tap-highlight" content="no">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="title" content="Covid-19 Cascavel">
    <meta name="description" content="
        Informações sobre os casos de Corona Vírus (Covid-19) no muninípio de Cascavel
        @if(Request::is('/'))
        - Confirmados {{$lastReport->confirmed}}
        - Descartados {{$lastReport->discarded}}
        - Em Investigação {{$lastReport->under_investigation}}
        @endif
        ">
    <meta property="og:title" content="Covid-19 Cascavel" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Covid-19 Cascavel" />
    <meta property="og:description" content="
        Informações sobre os casos de Corona Vírus (Covid-19) no muninípio de Cascavel
        @if(Request::is('/'))
        - Confirmados {{$lastReport->confirmed}}
        - Descartados {{$lastReport->discarded}}
        - Em Investigação {{$lastReport->under_investigation}}
    @endif
        " />
    <meta property="fb:app_id" content="653243382188137" />
    <meta property="og:url" content={{config('app.url')}} />
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
    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="https://www.gstatic.com/firebasejs/4.8.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/4.8.1/firebase-messaging.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link href="{{ asset('css/main.css') }}" rel="stylesheet"></head>
<body>
<script>

    // Your web app's Firebase configuration
    var firebaseConfig = {
        apiKey: "AIzaSyBShG9W1Yf1ssg7kuuQBKm2VYH2oyCAe5A",
        authDomain: "covid19cascavel.firebaseapp.com",
        databaseURL: "https://covid19cascavel.firebaseio.com",
        projectId: "covid19cascavel",
        storageBucket: "covid19cascavel.appspot.com",
        messagingSenderId: "884857282315",
        appId: "1:884857282315:web:a87fa86dd3cd4116264c0e"
    };
    // Initialize Firebase

    var project = firebase.initializeApp(firebaseConfig);
    var messaging = project.messaging();

    messaging.requestPermission().then(() => {
        messaging.getToken().then(token => {
            console.log(token)
            subscribeTokenToTopic(token, 'all')
        });
    }).catch(e => {
        console.log(e);
    });
    messaging.onMessage(() => {
        document.querySelector('.new-notification').style.display = 'block';
    })

    function subscribeTokenToTopic(token, topic) {
        axios.post('https://iid.googleapis.com/iid/v1/'+token+'/rel/topics/'+topic, {},{
            headers: {
                'Authorization': 'key=AAAAzgWanws:APA91bFkL99px6HKhYevNCE0eC9aLtsjRUZflws13ndl2ven9SxNSqiZ07HdM-3uiIkOaFj4h8fXqTJ7m6oyDeEVgKl-pRQArY9s9uvmhKRW1cd3rIstYRxD_Qccs25DCFBJOLclw5e2'
            }
        }).then(response => {
            if (response.status < 200 || response.status >= 400) {
                throw 'Error subscribing to topic: '+response.status + ' - ' + response.text();
            }
            console.log('Subscribed to "'+topic+'"');
        }).catch(error => {
            console.error(error);
        })
    }

</script>
<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
    <div class="app-header header-shadow">
        <div class="app-header__logo">
            <div class="logo-src">
                Covid19Cascavel
            </div>
            <div class="header__pane ml-auto">
                <div>
                    <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="app-header__mobile-menu">
            <div>
                <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                </button>
            </div>
        </div>
        <div class="app-header__menu">
            <span>
                <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                    <span class="btn-icon-wrapper">
                        <i class="fa fa-ellipsis-v fa-w-6"></i>
                    </span>
                </button>
            </span>
        </div>    <div class="app-header__content">
            <div class="app-header-left">
                <div class="search-wrapper">
                    <button class="close"></button>
                </div>
        </div>
            <div class="app-header-right">
                <div class="header-btn-lg pr-0">
                    <div class="widget-content p-0">
                        <div class="widget-content-wrapper">
                            <div class="widget-content-left">
                                <div class="btn-group">
                                </div>
                            </div>
                            <div class="widget-content-left  ml-3 header-user-info">
                                @if (Route::has('login'))
                                    @auth
                                    <div class="widget-heading">
                                        {{ Auth::user()->name }}
                                    </div>
                                    <div class="widget-subheading">
                                        <a href="{{ url('/report') }}">Reports</a>
                                    </div>
                                    @else
                                        <a href="{{ route('login') }}">Login</a>
                                    @endauth
                                @endif
                            </div>
                            <div class="widget-content-right header-user-info ml-3">
                                <button type="button" class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">
                                    <i class="fa text-white fa-calendar pr-1 pl-1"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>        </div>
        </div>
    </div>
    <div class="ui-theme-settings">
        <button type="button" id="TooltipDemo" class="btn-open-options btn btn-warning">
            <i class="fa fa-cog fa-w-16 fa-spin fa-2x"></i>
        </button>

    </div>
    <div class="app-main">
        <div class="app-sidebar sidebar-shadow">
            <div class="app-header__logo">
                <div class="logo-src"></div>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>
            <div class="scrollbar-sidebar">
                <div class="app-sidebar__inner">
                    <ul class="vertical-nav-menu">
                        <li class="app-sidebar__heading">Dashboards</li>
                        <li>
                            <a href="/" class="@if(Request::is('/')) mm-active @endif">
                                <i class="metismenu-icon pe-7s-graph1"></i>
                                Dashboard
                            </a>
                        </li>
                        <li>
                            <a href="/supporters" class="@if(Request::is('supporters')) mm-active @endif">
                                <i class="metismenu-icon pe-7s-diamond"></i>
                                Apoiadores
                            </a>
                        </li>
                        <li>
                            <a href="/about" class="@if(Request::is('about')) mm-active @endif">
                                <i class="metismenu-icon pe-7s-rocket"></i>
                                Sobre nós
                            </a>
                        </li>
                        @auth
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="metismenu-icon pe-7s-power"></i>
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        @endauth
                        <li class="app-sidebar__heading">Compartilhe</li>
                        <li>
                            <a class="" href="whatsapp://send?text={{ config('app.url') }}">
                                <img src="{{ asset('images/whatsapp-48.png') }}" alt="Compartilhe no Whatsapp" title="Compartilhe no Whatsapp" width="30"/>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="app-main__outer">
            <div class="app-main__inner">
                @yield('content')
            </div>
            <div class="app-wrapper-footer">
                <div class="app-footer">
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ asset('scripts/main.js') }}"></script></body>
</html>

