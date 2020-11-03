<!doctype html>
<html lang="en">
    <head>
        @include('partials._header')
        @yield('title')
    </head>
    <body>
        @include('partials._nav')
        <div class="container-flouid">

            @yield('content')
        </div>
        @include('partials._footer')
        @include('partials._javascripts')
    </body>
</html>
