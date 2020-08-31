<nav>
    <div class="nav-wrapper">
 <!-- logo Of Navbar -->
        <a class="brand-logo" href="{{ url('/') }}">
            <img src="{{ asset('images/') }}/logo.png" alt="mint logo." width="60">
            {{ config('app.name', 'LetzShare') }}
        </a>

        <!-- Right Side Of Navbar -->
        <ul class="nav-mobile" class="right hide-on-med-and-down">
            <!-- Authentication Links -->
            @guest
            <li>
                <a class="{{ (current_page('login')) ? 'active' : '' }}"
                    href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
                @if (Route::has('register'))
            <li >
                <a class="{{ (current_page('register')) ? 'active' : '' }}"
                    href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
            @endguest
            @auth
            <li>
                <a id="navbarDropdown" class="nav-name nav-link dropdown-toggle text-capitalize" href="#"
                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                     @if (Auth::user()->type === 'admin')
                <a class="dropdown-item {{ (current_page('admin')) ? 'active' : '' }}"
                    href="{{ url('/admin')}}">Admin Dashboard</a>
                    @endif
                    @if (Auth::user()->type === 'mentor')
                <a class="dropdown-item {{ (current_page('userprofile')) ? 'active' : '' }}"
                    href="/userprofile/{{Auth::user()->id}}">
                    My profile
                </a>
                @endif
                            
                <a href="{{ route('logout') }}" class="logout">{{ __('Logout') }}</a>
                </div>
            </li>
            @endauth
        </ul>
    </div>
</nav>