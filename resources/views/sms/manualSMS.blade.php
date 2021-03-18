@extends('layouts.main')

@section('title','SMS')
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
    <div class="container" style="min-height: 100VH">
        <div class="jumbotron">
            <h3 class="text-center">SMS Gateway</h3>
            @if(isset($balance))
                <h5 class="text-primary text-left">Credit Balance : LKR {{$balance}}</h5>
            @elseif (isset($balanceError))
                <h5 class="text-danger text-left">Credit Balance is not available.</h5>
                <p class="text-danger text-left">Error :  {{$balanceError}}</p>
            @endif
            <div class="row">
                <div class="col-md-6">
                    <div class="jumbotron">
                        <form action="/send-sms" method="POST">
                                {{csrf_field()}}
                                <!-- TODO - set correct sender ID dynamically -->
                                <input type="text" name="from" class="form-control my-1" value="From : Mora-FitB18" required disabled>
                                <!-- <input type="text" name="to" class="form-control my-1" placeholder="To" required> -->
                                <a href="#contact-list" class="form-control my-1" data-toggle="collapse">To</a>
                                <div id="contact-list" class="collapse my-1">
                                    <div style="overflow-y: auto; height: 350px;">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col"><input type="checkbox" name="All" value="1"/></th>
                                                <th scope="col" colspan="2">Select All</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($members as $member)
                                                <tr>
                                                    <td class="align-middle"><input type="checkbox" name="recipients[]" value="{{$member->contact}}"/></td>
                                                    <td><img src="{{$member->avatar}}" alt="Avatar" class="md-avatar rounded" style="width:40px"></td>
                                                    <td class="align-middle"><h5>{{$member->fname}} {{$member->mname}} {{$member->lname}}</h5></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </Table>
                                    </div>
                                </div>
                                <textarea name="text" cols="30" rows="2" class="form-control my-1" placeholder="Message" required></textarea>
                                <input type="submit" class="btn btn-primary mt-3" value="Send">
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="jumbotron">
                        @if(isset($inbox))
                            <table class="table">
                                <tr>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                </tr>

                                @foreach ($inbox as $message)
                                <tr>
                                    <td>{{$message->from}}</td>
                                    <td>{{$message->to}}</td>
                                    <td>{{$message->message}}</td>
                                    <td>{{$message->date}}</td>
                                </tr>
                                @endforeach

                            </table>
                        @elseif (isset($inboxError))
                            <h4 class="text-center">Inbox</h4>
                            <h5 class="text-danger text-center">{{$inboxError}}</h5>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
