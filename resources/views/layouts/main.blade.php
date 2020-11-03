<!doctype html>
<html lang="en">
    <head>
        @include('partials._header')
    </head>
    <body>
        {{-- @include('partials._nav') --}}
        @include('layouts.app')
        <div class="mt-3">
            <section class="page-section bg-light">
                @yield('content')
            </section>
        </div>
        @include('partials._footer')
        @include('partials._javascripts')
    </body>
</html>
