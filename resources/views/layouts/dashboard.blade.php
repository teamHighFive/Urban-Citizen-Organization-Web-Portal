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
                <?php
                $user = Auth::user();
                if($user['role_as'] == 'admin'){
                    ?>
                    @include('layouts.sidebar')
                    <?php
                }else if($user['role_as'] == 'member'){
                    ?>
                    @include('layouts.usersidebar')
                    <?php
                }
                ?>
            </header>

        {{-- Main Content --}}

        <main style="padding-left: 250px">
            <div class="mt-5 pt-5">
                @yield('content')
            </div>
        </main>

    </body>
</html>
