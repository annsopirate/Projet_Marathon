<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'azert') }}</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{'images/Logo_stream_rond.png'}}" />
    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
@guest
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('images/Logo_stream.png') }}" alt="LookMe"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('liste') }}">Liste de toutes les séries</a>
                </li>
            </ul>
        </div>
    </nav>

    <nav>
        <ul>
            @else
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('images/Logo_stream.png') }}" alt="LookMe"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            @if (Auth::user())
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('logout') }}"onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('liste') }}">Liste de toutes les séries</a>
                                </li>
                            @endif
                        </ul>
                        <a href="{{ route('profile') }}" style="padding-left: 70%"><img src="{{asset('images/avatar.png')}}"></a>
                    </div>
                </nav>
                <h1 class="mb-5 d-flex justify-content-center row" style="max-width: 101%">Bonjour {{ Auth::user()->name }} !</h1>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            @endguest
        </ul>
    </nav>
    <div id="main">
        @yield('content')

    </div>
    <!-- Scripts -->
</body>
</html>
