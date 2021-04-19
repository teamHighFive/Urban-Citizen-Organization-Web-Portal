@extends('layouts.main')

@section('content')
<div class="container" style="min-height: 100vh">
    <div class="jumbotron overflow-auto" style="overflow-x: scroll;">
        <table class="table table-striped table-bordered table-hover">
             <thead class="thead">
                 <tr class="warning">
                     <th>Donation event ID</th>
                     <th>Donner Name</th>
                     <th>Donner Address</th>
                     <th>Donner Country</th>
                     <th>Donner City</th>
                     <th>Phone No</th>
                     <th>Is Member</th>
                     <th>Email</th>
                     <th>Amount</th>
                     <th>Payment Method</th>
                     <th>Comments</th>
                 </tr>
             </thead>
           @foreach($donations as $donation)
                     <tbody>
                         <tr>
                             <td>{{$donation->donation_event_id}}</td>
                             <td>{{$donation->donner_fullname}}</td>
                             <td>{{$donation->donner_address}}</td>
                             <td>{{$donation->donner_country}}</td>
                             <td>{{$donation->donner_city}}</td>
                             <td>{{$donation->donner_phone}}</td>
                             <td>{{$donation->is_member}}</td>
                             <td>{{$donation->donner_email}}</td>
                             <td>{{$donation->amount}}</td>
                             <td>{{$donation->payment_method}}</td>
                             <td>{{$donation->comment}}</td>
                        </tr>
                    </tbody>
             @endforeach
        </table>
    </div>
</div>
@endsection