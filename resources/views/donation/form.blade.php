@extends('layouts.main')

@section('content')

<h2>Donation</h2>


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

    {{-- <input type="hidden" name="donation_id"  value="{{$donation_id}}"> --}}
    <div class="form-group">
        <label for="">Full Name</label>
        <input type="text" name="shipping_fullname" id="" class="form-control">
    </div>
    <div class="form-group">
      <label for="">Amount</label>
      <input type="text" name="amount" id="" class="form-control">
  </div>

    <div class="form-group">
        <label for="">Country</label>
        <input type="text" name="country" id="" class="form-control">
    </div>

    <div class="form-group">
        <label for="">City</label>
        <input type="text" name="shipping_city" id="" class="form-control">
    </div>

    <div class="form-group">
        <label for="">Address</label>
        <input type="number" name="shipping_zipcode" id="" class="form-control">
    </div>

    <div class="form-group">
        <label for="">Email</label>
        <input type="text" name="shipping_address" id="" class="form-control">
    </div>

    <div class="form-group">
        <label for="">Mobile</label>
        <input type="text" name="shipping_phone" id="" class="form-control">
    </div>

    <div class="form-group">
      <label for="">Comments</label>
      <textarea name="comments" id="" class="form-control"></textarea>
  </div>

  <div class="form-check">
    <label class="form-check-label">Membership:
    </br>
        <input type="radio" class="form-check-input" name="payment_method" id="" value="Yes">
        Member
    </br>
        <input type="radio" class="form-check-input" name="payment_method" id="" value="No">
        Not a member
    </label>
  </div>
</br>

    <div class="form-check">
        <label class="form-check-label">Payment method:
        </br>
            <input type="radio" class="form-check-input" name="payment_method" id="" value="paypal">
            Paypal
        </br>
            <input type="radio" class="form-check-input" name="payment_method" id="" value="bank deposit">
            Bank Deposit
        </label>
    </div>


    <button type="submit" class="btn btn-primary mt-3">Donate</button>


</form>


@endsection

