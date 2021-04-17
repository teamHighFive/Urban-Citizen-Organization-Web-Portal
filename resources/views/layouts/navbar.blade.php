<nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
    <span class="navbar-brand">
        <a href="/"><img src="{{ asset('images/logo.png') }}" height="50" alt="logo"></a>
    </span>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">            
            <li class="nav-item dropdown">
                <span
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
                aria-expanded="false"
                href="/"
                >
                Home & Basics
                </span>
                <!-- Dropdown menu -->
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/">Home</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="/announcement">Announcements</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/#about">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/donation">Donations</a>
            </li>
            <!-- Navbar dropdown -->
            <li class="nav-item dropdown">
                <span
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
                aria-expanded="false"
                >
                Events
                </span>
                <!-- Dropdown menu -->
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/event-calendar">Event Calendar</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="/online-conferences">Online Conferences</a></li>
                </ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/posts">Blog</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/gallery">Gallery</a>
            </li>
            
            <!-- Navbar dropdown -->
            <li class="nav-item dropdown">
                <span
                class="nav-link dropdown-toggle"
                href="#"
                id="navbarDropdown"
                role="button"
                data-toggle="dropdown"
                aria-expanded="false"
                >
                Archives 
                </span>
                <!-- Dropdown menu -->
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="/arc"><i class="far fa-file-alt"></i>&nbsp; Documents</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="/event-arc"><i class="fas fa-file-pdf"></i>&nbsp; Events shedules and documents</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="/conffiles-arc"><i class="far fa-file-pdf"></i>&nbsp; Conferences schedules and documents</a></li>
                <li><hr class="dropdown-divider" /></li>
                <li><a class="dropdown-item" href="/upload_exel"><i class="fas fa-cloud-upload-alt"></i>&nbsp; Extra immeadiate submissions</a></li>
                </ul>
            </li>

            {{-- By theekshana start --}}
            @guest

            @else
                <li class="nav-item">
                    <a class="nav-link waves-effect" href="/dashboard" target="">Dashboard</a>
                </li>
            @endguest

            {{-- By theekshana end --}}
        </ul>
        <ul class="navbar-nav ml-auto">
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">

                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img src="{{asset(Auth::user()->avatar)}}" style="height:35px;width:35px;border-radius:50%;margin-right:15px" alt="" >{{ Auth::user()->fname.' '.Auth::user()->mname }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
