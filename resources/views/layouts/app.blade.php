<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Aimeel</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style type="text/css">
        html, body {
            background-image: url('/images/school.jpg');
            background-size: cover;
            background-position: top;
            color: black;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }
        nav{
            display: flex;
            background-color: rgb(222,0,222);
            justify-content: space-around;
            align-items: center;
            min-height: 8vh;
            position: sticky;
            position: -webkit-sticky;
            top: 0;
        }
        .logo{
            color: black;
            letter-spacing: 5px;
            font-size: 30px;
        }
        .nav-links{
            display: flex;
            justify-content: space-around;
            width: 50%;
        }
        .nav-links li{
            list-style: none;
        }
        .nav-links a{
            color: black;
            text-decoration: none;
            letter-spacing: 2px;
            font-weight: bold;
            font-size: 20px;
        }
        #app{
            background-color: rgba(0,0,0,0.7);
            height: 100%;
            overflow-y: scroll;
        }
        .maincard{
            width: 100%;
            display: inline-grid;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <!-- Left Side Of Navbar -->
            <div class="logo">
                <h1>Aimeel</h1>
            </div>

            <!-- Right Side Of Navbar -->
            <ul class="nav-links ml-auto">
                <li><a href="http://127.0.0.1:8000">HOME</a></li>
                <li><a href="vacancies">ADMISSIONS</a></li>
                <li><a href="blog">BLOG</a></li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('LOGIN') }}</a>
                    </li>
                @else
                    <li><a href="home">DASHBOARD</a></li>
                    <li class="nav-item dropdown"><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">{{ Auth::user()->name }}: {{ __('Logout') }} </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                            </form>
                    </li>
                @endguest
            </ul>
        </nav>
        <div class="maincard">
            <main>
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
