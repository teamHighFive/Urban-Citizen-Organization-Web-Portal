@extends('layouts.main')

@section('content')

@foreach($donationEvents as $donationEvent)
<div>
<h3 class="text-center cyan-text pt-5 mb-3">{{$donationEvent->name}}</h3>


@endforeach

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <span onclick="this.parentElement.style.display='none'"
            class="w3-button w3-green w3-large w3-display-topright">&times;</span>
    <p>{!! $message !!}</p>
</div>
<?php Session::forget('success');?>
@endif

@if ($message = Session::get('error'))
<div class="alert alert-danger">
    <span onclick="this.parentElement.style.display='none'"
            class="w3-button w3-red w3-large w3-display-topright">&times;</span>
    <p>{!! $message !!}</p>
</div>
<?php Session::forget('error');?>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="container" style="min-height: 100vh">
    
    <div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6">
    <div class="jumbotron px-3">
            <div class="form-group">
<form action="{{route('paypal')}}" method="post">
    @csrf
    
    @foreach($donationEvents as $donationEvent)
    <input type="hidden" name="donation_event_id"  value="{{$donationEvent->id}}">
    @endforeach
    
    <div class="form-group">
        <label for="">Full Name</label>
        <input type="text" name="donner_fullname" id="" class="form-control" required>
        @if ($errors->has('donner_fullname'))
                    <span class="text-danger">{{ $errors->first('donner_fullname') }}</span>
                @endif
       
    </div>

    <div class="form-group">
      <label for="">Amount</label>
      <input type="text" name="amount" id="" placeholder="$" class="form-control">
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
        <input type="text" name="donner_email" id="" class="form-control" required >
    </div>

    <div class="form-group">
        <label for="">Mobile</label>
        <input type="text" name="donner_phone" id="" class="form-control" required>
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


    <button type="submit" class="btn btn-primary mt-3">Donate</button>


</form>
</div>
    </div>
    <div class="col-lg-3"></div>
    </div>
</div>


@endsection

