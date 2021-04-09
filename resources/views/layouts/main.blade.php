<!doctype html>
<html lang="en">
    <head>
        @include('layouts.header')
        @yield('header')
        <style>
            #intro {
                height:auto;
                min-height: 100vh;
                background: url("../images/slider.png") no-repeat center center fixed;
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
            }
        </style>
    </head>
    <body>

        {{-- Navigation --}}
        <header>
            @include('layouts.navbar')
        </header>

        {{-- Main Content --}}
        <main id="intro">
            <div class="container mt-5 pt-5">
                @yield('content')
            </div>
        </main>

        {{-- Footer and Scripts  --}}
        @include('layouts.footer')

    </body>
</html>
