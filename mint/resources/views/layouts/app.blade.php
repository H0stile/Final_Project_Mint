<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    @yield('css')

</head>

<body>
    <div class="navbar-fixed">
        <nav>
            <div id="app">
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @auth
                <ul id="dropdown1" class="dropdown-content">
                    <li><a href="{{ route('logout') }}" class="logout">{{ __('Logout') }}</a></li>
                </ul>
                @endauth
                <div class="nav-wrapper">
                    <!--left side of navbar-->
                    <a class="brand-logo" href="{{ url('home') }}"><img src="{{ asset('img/') }}/logo.png" alt="logo" id="mint_logo">
                        <!--{{ config('app.name', 'Mint') }}--></a>
                    <a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>

                    <!--right side of navbar-->
                    <ul id="nav-mobile" class="right hide-on-med-and-down">


                        @guest
                        <li class="{{ Request::is('home') ? 'active ' : '' }}"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
                        <li class="{{ Request::is('login') ? 'active' : '' }}"><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
                        <!--@if (Route::has('register'))-->
                        <li class=" waves-effect waves-light btn-large {{ Request::is('register') ? 'active' : '' }}"><a href="#home-register" id="register_button">{{ __('Register') }}</a></li>

                        <!--@endif-->
                        @endguest
                        @auth
                        <!--<li><a id="navbarDropdown" class="nav-name nav-link dropdown-toggle text-capitalize" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span></a></li>-->
                        <li><a href="#!" class="dropdown-trigger" data-target="dropdown1">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}<i class="material-icons right">arrow_drop_down</i></a></li>
                        @if (Auth::user()->type == 'admin')
                        <li class="{{ Request::is('admin') ? 'active' : '' }}"><a href="{{ url('/admin')}}">Admin Dashboard</a></li>
                        @endif
                        @if (Auth::user()->type == 'mentor')
                        <li class="{{ Request::is('mentor') ? 'active' : '' }}"><a href="/mentor/{{Auth::user()->id}}"> My profile</a></li>
                        @endif
                        @if (Auth::user()->type == 'mentee')
                        <li class="{{ Request::is('mentee') ? 'active' : '' }}"><a href="/mentee/{{Auth::user()->id}}"> My profile</a></li>
                        <li class="{{ Request::is('searchmentor') ? 'active' : '' }}"><a href="/searchmentor/{{Auth::user()->id}}">Mentors</a></li>
                        @endif
                        @endauth
                    </ul>
                </div>
        </nav>
    </div>
    <main class="py-4">
        @yield('content')
    </main>


    <ul class="sidenav" id="mobile-demo">
        @guest
        <li><a href="{{ route('login') }}">{{ __('Login') }}</a></li>
        <li><a href="{{ route('register') }}">{{ __('Register') }}</a></li>
        @else
        <li><a href="{{ route('logout') }}" class="logout">{{ __('Logout') }}</a></li>
        @endguest
    </ul>
    </div>
    @include('footer')
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.sidenav').sidenav();
            $('.dropdown-trigger').dropdown();
            $('.logout').click(function(e) {
                e.preventDefault();
                $('#logout-form').submit();
            });

            $("ul li").click(function() {
                $('li').removeClass("active");
                $(this).addClass("active");
            });
        });
    </script>

    @yield('script')
</body>

</html>
