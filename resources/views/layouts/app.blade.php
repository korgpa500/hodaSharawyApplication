<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.fullName', 'Houda Sharawy Language School') }}</title>

        <!-- Scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.js"></script>
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/myJs.js') }}" defer></script>


        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
        <!-- style for gallery -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/baguettebox.js/1.8.1/baguetteBox.min.css">
        <link href="{{ asset('css/gallery-grid.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">

        <!-- icon -->
        <link rel="icon" href="{{asset('images/logot.png')}}">
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-expand-md navbar-dark navbar-laravel fixed-top myNavBar">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'H.SH.L.S') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li><a class="nav-link" href="/eventsShow" id="itemsLink">{{ __('News') }}</a></li>
                        <li><a class="nav-link" href="/photos" id="itemsLink">{{ __('Gallery') }}</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ __('Sections') }}
                            </a>
                            <div class="dropdown-menu myColorBg" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/kg">K.G</a>
                                <a class="dropdown-item" href="/junior">Junior</a>
                                <a class="dropdown-item" href="/middle">Middle</a>
                                <a class="dropdown-item" href="/senior">Senior</a>
                            </div>
                        </li>
                        <li><a class="nav-link" href="/blog" id="itemsLink">{{ __('Posts') }}</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                        <li><a class="nav-link" id="itemsLink" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        {{--<li><a class="nav-link" id="itemsLink" href="{{ route('register') }}">Register</a></li>--}}
                        <li><a class="nav-link" id="itemsLink" href="{{ url('/users/register') }}">Register</a></li>
                        @else
                        @if(\App\User::find(Auth::user()->user_id)->type->type_name == "Admin")
                        <li><a class="nav-link" href="/notification" id="itemsLink">
                            @if((\App\Register::where('read' ,0)->count()) + (\App\Suggestion::where('read' ,0)->count()) > 0)
                            <span class="notificationY">
                                {{(\App\Register::where('read' ,0)->count()) + (\App\Suggestion::where('read' ,0)->count())}}
                            </span>
                            @endif
                            {{ __('Notification') }}
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                {{ __('Admin') }}
                            </a>
                            <div class="dropdown-menu myColorBg" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/types">Types</a>
                                <a class="dropdown-item" href="/sections">Sections</a>
                                <a class="dropdown-item" href="/photos/create">Photos</a>
                                <a class="dropdown-item" href="/events">News&Events</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/users">Users</a>
                            </div>
                        </li>
                        @endif
                        <li><a class="nav-link" id="itemsLink" href="{{ url('/home') }}">Home</a></li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu myColorBg" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                    </ul>
                </div>

            </nav>
            <div class="row justify-content-center">
                <div  class="logoBackGround mx-auto col-12 text-center">
                    <img src="{{asset('images/logot.png')}}" class="img-fluid">
                </div>
            </div>
            <div class="py-4">
                @yield('content')
            </div>
        </div>
    </body>
</html>
