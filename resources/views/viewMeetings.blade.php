<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}" />

    <title>View Meetings</title>
</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <table class="table">
                <tr>
                    <th>Meeting ID</th>
                    <th>Meeting Name</th>
                    <th>Description</th>
                    <th>Join Via</th>
                </tr>

                @foreach ($meetings as $meeting)
                <tr>
                    <td>{{$meeting->meeting_id}}</td>
                    <td>{{$meeting->meeting_name}}</td>
                    <td>{{$meeting->meeting_description}}</td>
                    <td><a class="btn btn-info btn-sm" href="/join-details/{{$meeting->meeting_id}}">Join</a></td>
                </tr>
                @endforeach

            </table>
        </div>
    </div>
</body>
</html>
