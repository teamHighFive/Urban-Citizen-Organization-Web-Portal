@extends('layouts.dashboard')
@section('header')
    <script>
        function copyToClipboard(id) {
            var copyText = document.getElementById(id);

            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */

            /* Copy the text inside the text field */
            document.execCommand("copy");

            /* Alert the copied text */
            alert("Copied Link: " + copyText.value);
        }
    </script>
@endsection
@section('title','Dashboard')
@section('content')

<div class="container" style="min-height:100vh">

                <div class="container" style="min-height: 100VH; width:90%;">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif
                    <div class="jumbotron">
                        @if($message == "UNSUCCESS")
                            <h3 class="text-center">Somthing went wrong. Please try again later.</h3>
                        @elseif($message == "NODATA")
                            <h3 class="text-center">No recordings found.</h3>
                        @elseif($message == "SUCCESS")
                            <h3 class="text-center">Recordings</h3>
                            <table class="table">
                                @foreach ($recordings as $recording)
                                <tr>
                                    <td>
                                        <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">{{$recording->name}} (Meeting ID : {{$recording->meetingID}})</h5>
                                            <img src="{{$recording->playback->format->preview->images->image[0]}}"> 
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <a class="btn btn-info btn-sm" target="_blank" href="{{$recording->playback->format->url}}">View</a>
                                                    @if(!Auth::guest())
                                                    @if (Auth::user()->role_as == "admin")
                                                        <a class="btn btn-danger btn-sm" href="/delete-recording/{{$recording->recordID}}">Delete</a>
                                                    @endif
                                                    @endif
                                                </div>
                                                <div class="col-lg-6 input-group mb-1">
                                                    <input class="form-control" type="text" id="{{$recording->meetingID}}" value="{{$recording->playback->format->url}}">
                                                    <div class="input-group-append">
                                                        <button class="btn btn-warning btn-sm my-0 mx-0" type="button" onclick="copyToClipboard('{{$recording->meetingID}}')">Copy Link</button>
                                                    </div>
                                                </div>
                                            </div>   
                                        </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        @endif
                    </div>
                </div>
</div>


@endsection

