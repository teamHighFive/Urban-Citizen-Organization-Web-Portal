@extends('layouts.main')

@section('content')

@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif

<div class="container" style="min-height: 100vh">
    <div class="jumbotron  blue-grey lighten-5">
        <div class="card" >

         <table class="table">
            @foreach($donevents as $donevent)
            <tr>
            <td>
                    <div class="card">
                        <div class="row">
                            <div class="col-lg-4">
                                <img src="/donation-resourses/events/images/{{$donevent->coverimage}}"  
                                class="img-fluid center-cropped"
                                style="height:30vh; object-fit: cover;width:100%;" alt="photo">
                            </div>
                            <div class="col-lg-8">
                                <div class="card-body">
                                    <h4 class="card-title">{{$donevent->name}} </h4>
                                    <p class="card-text">{{ str_limit($donevent->description, $limit = 150, $end = '...') }}</p>

                                    <a href="/donations/show/{{$donevent->id}}" class="btn btn-sm btn-success">Show Donations</a>
                                    @if($donevent->status == 2)
                                        <a href="/donation/finish/{{$donevent->id}}" class="btn btn-sm btn-warning">Finish Donation Event</a>
                                    @endif
                                    @if($donevent->status != 0)
                                        <a href="/donation/delete/{{$donevent->id}}" class="btn btn-sm btn-danger">Delete</a>
                                    @endif
                                    @if($donevent->status == 2)
                                        <a href="/donation/edit/{{$donevent->id}}" class="btn btn-sm btn-info">Edit</a>
                                    @endif
                                    

                                    <div>
                                        @if($donevent->status == 0)
                                            <span class="badge badge-pill btn-danger mt-3 px-3 py-2">Deleted</span>
                                        @elseif($donevent->status == 1)
                                            <span class="badge badge-pill btn-warning mt-3 px-3 py-2">Finished</span>
                                        @elseif($donevent->status == 2)
                                            <span class="badge badge-pill btn-success mt-3 px-3 py-2">Ongoing</span>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
            </td>
            </tr>
            @endforeach
        </table>

     </div>
</div>
@endsection