<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" />
    </head>
    <body class="welcome-body">
        {{-- ToDo --}}
        {{-- Create the Home page here and give the top navigation menu to login or register --}}
        <div class="flex-center position-ref">
            <div class="content">
                <div class="title m-b-md">
                    Urban Citizen Organization
                </div>
                <div class="links">
                    <a href="">Home</a>
                    <a href="">Events</a>
                    <a href="">Gallery</a>
                    <a href="">Blog</a>
                    <a href="">Online Conferences</a>
                    <a href="">Donations</a>
                    <a href="">Archive</a>
                </div>
            </div>
        </div>
    </body>
</html>
