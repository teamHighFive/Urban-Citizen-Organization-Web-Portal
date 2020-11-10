<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            <div>
            <a href="https://www.facebook.com/ColomboUrbanCitizens/">
                <img alt="LOGO" src="https://scontent.fcmb11-1.fna.fbcdn.net/v/t1.0-1/70484204_126149912087248_3842813892359094272_n.png?_nc_cat=109&ccb=2&_nc_sid=dbb9e7&_nc_ohc=VhF4zYh3p2YAX_56RhV&_nc_ht=scontent.fcmb11-1.fna&oh=612f145d6e89f4f5abcd25719c4d0b7a&oe=5FC4A016"
                width="400" height="400">
            </a>
            </div>
            <div class="content">
                <div class="title m-b-md">
                    Document Warehouse
                </div>

                <div class="links">
                    <a href="type">Upload Document</a>
                    <a href="table">View or Download Document</a>
                </div>
            </div>
        </div>
    </body>
</html>
