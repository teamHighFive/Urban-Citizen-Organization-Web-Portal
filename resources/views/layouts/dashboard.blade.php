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
            @include('layouts.sidebar')
        </header>

        {{-- Main Content --}}

        <main style="padding-left: 200px">

            <div class="mt-5 pt-5">

                @yield('content')
            </div>
        </main>

        {{-- Footer and Scripts  --}}
        @include('layouts.footer')

    </body>
</html>
