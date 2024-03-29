@extends('layouts.main')

@section('title','SMS')
@section('header')
    <script>
        function c(){
            var recipients = document.getElementsByName('recipients[]');
            console.log(recipients.length);
            if (document.getElementById('all').checked) {
                for(var i=0; i<recipients.length; i++){  
                    if(recipients[i].type=='checkbox')  
                    recipients[i].checked=true;  
                }  
            } else {
                for(var i=0; i<recipients.length; i++){  
                    if(recipients[i].type=='checkbox')  
                    recipients[i].checked=false;  
                } 
            }
        }
    </script>
@endsection
@section('content')
    <div class="container" style="min-height:100VH; width:90%;">
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
            <h3 class="text-center">SMS Gateway</h3>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    @if(isset($balance))
                        <h5 class="text-primary text-left">Credit Balance : LKR {{$balance}}</h5>
                    @elseif (isset($balanceError))
                        <h5 class="text-danger text-left">Credit Balance is not available.</h5>
                        <p class="text-danger text-left">Error :  {{$balanceError}}</p>
                    @endif
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <div class="jumbotron">
                        <form action="/send-sms" method="POST">
                                {{csrf_field()}}
                                <!-- TODO - set correct sender ID dynamically -->
                                <input type="text" name="from" class="form-control my-1" value="From : {{getenv('NEWSLETTERS_SENDER_ID')}}" required disabled>
                                <!-- <input type="text" name="to" class="form-control my-1" placeholder="To" required> -->
                                <a href="#contact-list" class="form-control my-1" data-toggle="collapse">To</a>
                                <div id="contact-list" class="collapse my-1">
                                    <div style="overflow-y: auto; height: 350px;">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th scope="col"><input onClick="c()" type="checkbox" id="all" value="1"/></th>
                                                <th scope="col" colspan="2">Select All</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($members as $member)
                                                <tr>
                                                    <td class="align-middle"><input name="recipients[]" type="checkbox"  value="{{$member->contact}}"/></td>
                                                    <td><img src="{{$member->avatar}}" alt="Avatar" class="md-avatar rounded" style="width:40px"></td>
                                                    <td class="align-middle"><h6><b>{{$member->fname}} {{$member->mname}} {{$member->lname}}<b></h6></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </Table>
                                    </div>
                                </div>
                                <textarea name="text" cols="30" rows="3" class="form-control my-1" placeholder="Message" required></textarea>
                                <input type="submit" class="btn btn-primary mt-3" value="Send">
                        </form>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
    </div>
@endsection