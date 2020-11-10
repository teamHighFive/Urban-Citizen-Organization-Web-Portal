<!doctype html>
<html lang="en">
    <head>
        @include('layouts.header')
        @yield('header')
    </head>
    <body>




        {{-- Navigation --}}
        <header>
            @include('layouts.navbar')

        </header>

        {{-- Main Content --}}

        <main>
            <div class="row">

            </div>
            <div class="mt-5 pt-5">
                @include('layouts.sidebar')
                @yield('content')
            </div>
        </main>

        {{-- Footer and Scripts  --}}
        @include('layouts.footer')

    </body>
</html>
