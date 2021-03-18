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
                <div class="col-md-6 jumbotron">
                    <form action="/send-sms" method="POST">
                            {{csrf_field()}}
                            <!-- TODO - set correct sender ID dynamically -->
                            <input type="text" name="from" class="form-control my-1" value="From : Mora-FitB18" required disabled>
                            <input type="text" name="to" class="form-control my-1" placeholder="To (with county code)" required>
                            <textarea name="text" cols="30" rows="2" class="form-control my-1" placeholder="Message" required></textarea>
                            <input type="submit" class="btn btn-primary mt-3" value="Send">
                    </form>
                </div>
                <div class="col-md-6 jumbotron">
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
@endsection
