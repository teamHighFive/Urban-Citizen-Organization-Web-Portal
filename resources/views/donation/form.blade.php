@extends('layouts.main')

@section('content')

{{-- @foreach($donationEvents as $donationEvent)
<div>
<h2>{{$donationEvent->name}}</h2>
<h2>{{$donationEvent->description}}</h2>
</div>
@endforeach --}}


<h3>Donation Information</h3>

@if ($message = Session::get('success'))
<div class="w3-panel w3-green w3-display-container">
    <span onclick="this.parentElement.style.display='none'"
            class="w3-button w3-green w3-large w3-display-topright">&times;</span>
    <p>{!! $message !!}</p>
</div>
<?php Session::forget('success');?>
@endif

@if ($message = Session::get('error'))
<div class="w3-panel w3-red w3-display-container">
    <span onclick="this.parentElement.style.display='none'"
            class="w3-button w3-red w3-large w3-display-topright">&times;</span>
    <p>{!! $message !!}</p>
</div>
<?php Session::forget('error');?>
@endif



<form action="{{route('paypal')}}" method="post">
    @csrf

    {{-- <input type="hidden" name="donation_event_id"  value="{{$donevent->id}}"> --}}
    <input type="hidden" name="donation_event_id"  value="1">
    <div class="form-group">
        <label for="">Full Name</label>
        <input type="text" name="donner_fullname" id="" class="form-control">
       
    </div>

    <div class="form-group">
      <label for="">Amount</label>
      <input type="text" name="amount" id="" class="form-control">
    </div>

    <div class="form-group">
        <label for="">Country</label>
        <input type="text" name="donner_country" id="" class="form-control">
    </div>

    <div class="form-group">
        <label for="">City</label>
        <input type="text" name="donner_city" id="" class="form-control">
    </div>

    <div class="form-group">
        <label for="">Address</label>
        <input type="text" name="donner_address" id="" class="form-control">
    </div>

    <div class="form-group">
        <label for="">Email</label>
        <input type="text" name="donner_email" id="" class="form-control">
    </div>

    <div class="form-group">
        <label for="">Mobile</label>
        <input type="text" name="donner_phone" id="" class="form-control">
    </div>

    <div class="form-group">
      <label for="">Comment</label>
      <textarea name="comment" id="" class="form-control"></textarea>
    </div>

  <div class="form-check">
    <label class="form-check-label">Membership:</label>
    </br>
        <input type="radio" class="form-check-input" name="is_member" id="" value="Yes">
        <label >Member</label>
    </br>
        <input type="radio" class="form-check-input" name="is_member" id="" value="No">
        <label>Not a Member</label>
    </label>
  </div>
</br>

    <div class="form-check">
        <label class="form-check-label">Payment method:</label>
        </br>
            <input type="radio" class="form-check-input" name="payment_method" id="" value="paypal">
            <label>Paypal</label>
        </br>
            <input type="radio" class="form-check-input" name="payment_method" id="" value="bank deposit">
            <label>Bank Deposit</label>
        </label>
    </div>


    <button type="submit" class="btn btn-primary mt-3">Donate</button>


</form>


@endsection

