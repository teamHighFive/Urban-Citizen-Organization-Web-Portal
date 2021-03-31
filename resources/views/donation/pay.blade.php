@extends('layouts.main')

@section('content')

<div class="container" style="min-height: 100vh">
    <form class="w3-container w3-display-middle w3-card-4 " method="POST" id="payment-form"  action="{{route('paypal')}}">
        {{ csrf_field() }}
        <label class="w3-text-blue"><b>Enter Amount</b></label><br/>
        <input class="w3-input w3-border" name="amount" type="text"></p> 
            
        <input type="submit" value= "Pay">
      </form>
</div>
@endsection