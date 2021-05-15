@extends('layouts.main')
@section('title','Announcements')
@section('content')
    <div class="container" style="min-height: 100vh">
        <div class="jumbotron">
            <center><h1 class="display-6 mb-3" style = "font-family:Georgia, serif ;font-weight:600; text-align: center;" >All Announcements</h1></center>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th scope="col">Announcement-ID</th>
                        <th scope="col">Annoucment Topic</th>
                        <th scope="col">Added by</th>    
                        <th>Time period</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($upload as $item)
                    <tr>
                        <th> {{$item->id}}</th>
                        <th> {{$item->topic}}</th>
                        <th> {{App\User::find($item->user_id)->fname}}</th>
                        <th> {{$item->schedulestart}}<b> &nbsp; - &nbsp;</b> {{$item->scheduleend}}</th>
                        <th> <a href="/deletetableann/{{$item->id}}" class="btn btn-outline-danger btn-sm" aria-hidden="true">Delete announcement</a>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>        
@endsection
