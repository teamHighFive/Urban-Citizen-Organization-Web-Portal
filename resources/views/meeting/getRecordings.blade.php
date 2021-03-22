@extends('layouts.dashboard')
@section('title','Dashboard')
@section('header')
    <script>
        var msg = '{{Session::get('alert')}}';
        var exist = '{{Session::has('alert')}}';
        if(exist){
        alert(msg);
        }
    </script>
@endsection
@section('content')

<div class="container" style="height:100vh">
        <?php
                $user = Auth::user();
                if($user['role_as'] == 'admin'){
        ?>

                <div class="container" style="min-height: 100VH; width:90%;">
                    <div class="jumbotron">
                        @if($message == "UNSUCCESS")
                            <h3 class="text-center">Somthing went wrong. Please try again later.</h3>
                        @elseif($message == "NODATA")
                            <h3 class="text-center">No recordings found.</h3>
                        @elseif($message == "SUCCESS")
                            <h3 class="text-center">Recordings</h3>
                            <table class="table">
                                <tr>
                                    <th></th>
                                    <th>Meeting ID</th>
                                    <th>Meeting Name</th>
                                    <th></th>
                                    <th></th>
                                </tr>

                                @foreach ($recordings as $recording)
                                <tr>
                                    <td><img src="{{$recording->playback->format->preview->images->image[0]}}"></td>
                                    <td>{{$recording->meetingID}}</td>
                                    <td>{{$recording->name}}</td>
                                    <td><a class="btn btn-info btn-sm" target="_blank" href="{{$recording->playback->format->url}}">View</a></td>
                                    <td><a class="btn btn-danger btn-sm" href="/delete-recording/{{$recording->recordID}}">Delete</a></td>
                                </tr>
                                @endforeach
                            </table>
                        @endif
                    </div>
                </div>

        <?php
                }else if($user['role_as'] == 'member'){
        ?>
                    <div class="container" style="min-height: 100VH; width:90%;">
                        <div class="jumbotron">
                            @if($message == "UNSUCCESS")
                                <h3 class="text-center">Somthing went wrong. Please try again later.</h3>
                            @elseif($message == "NODATA")
                                <h3 class="text-center">No recordings found.</h3>
                            @elseif($message == "SUCCESS")
                                <h3 class="text-center">Recordings</h3>
                                <table class="table">
                                    <tr>
                                        <th></th>
                                        <th>Meeting ID</th>
                                        <th>Meeting Name</th>
                                        <th></th>
                                    </tr>

                                    @foreach ($recordings as $recording)
                                    <tr>
                                        <td><img src="{{$recording->playback->format->preview->images->image[0]}}"></td>
                                        <td>{{$recording->meetingID}}</td>
                                        <td>{{$recording->name}}</td>
                                        <td><a class="btn btn-info btn-sm" target="_blank" href="{{$recording->playback->format->url}}">View</a></td>
                                    </tr>
                                    @endforeach
                                </table>
                            @endif
                        </div>
                    </div>
        <?php
                }
        ?>
</div>


@endsection

