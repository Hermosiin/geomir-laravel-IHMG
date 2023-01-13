<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/3e4c1a6931.js" crossorigin="anonymous"></script>

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md" >
            <div class="left">
                <img src="/img/logo.png" class="mida-logo"/>
                <h1 style="margin-left:20px; color:white;">GeoMir</h1>
            </div>
            <div class="center">

                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav me-auto">

                </ul>
                <div class="buscador">
                    <form class="d-flex" role="search">
                        <input style="background-color:white;" class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" style="background-color:#ffd74d; color:black; border:2px solid black;" type="submit">Search</button>
                    </form>
                </div>


            </div>

            <div class="right">
                <!-- Right Side Of Navbar -->
                <a class="btn" href="/about">Sobre Nosotros</a>
                <a class="btn" href="/contact">Contactanos</a>

                <ul class="navbar-nav ms-auto" style="margin-right:50px; color:white;">
                @include('partials.language-switcher')
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a style="color:white;"id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a style="background-color:black;" class="dropdown-item" href="{{ route('logout') }}"
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
            
        </nav>

        <main>
            @include('flash')
            @yield('content')   
        </main>
    </div>
</body>
</html>
