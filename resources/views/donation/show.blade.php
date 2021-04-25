@extends('layouts.main')

@section('content')
<div class="container" style="min-height: 100vh">
    <h1  class="text-center cyan-text pt-5 mb-3">{{App\DonationEvent::find($id)->name}}</h1>
    <div class="jumbotron overflow-auto" style="overflow-x: scroll;">
        <table class="table table-striped table-bordered table-hover">
             <thead class="thead">
                 <tr class="color-block-dark indigo lighten-1-color-dark z-depth-2 white-text">
                     <th>Donor's Name</th>
                     <th>Donor's Address</th>
                     <th>Donor's Country</th>
                     <th>Donor's City</th>
                     <th>Phone No</th>
                     <th>Is Member</th>
                     <th>Email</th>
                     <th>Amount($)</th>
                     <th>Comments</th>
                 </tr>
             </thead>
           @foreach($donations as $donation)
                     <tbody>
                         <tr>
                             <td>{{$donation->donner_fullname}}</td>
                             <td>{{$donation->donner_address}}</td>
                             <td>{{$donation->donner_country}}</td>
                             <td>{{$donation->donner_city}}</td>
                             <td>{{$donation->donner_phone}}</td>
                             <td>{{$donation->is_member}}</td>
                             <td>{{$donation->donner_email}}</td>
                             <td>{{$donation->amount}}</td>
                             <td>{{$donation->comment}}</td>
                        </tr>
                    </tbody>
             @endforeach
        </table>
    </div>
</div>
@endsection