@extends('layouts.main')

@section('content')

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

<div class="container" style="height:auto; min-height: 100vh">
    <div class="row">
		<div class="col-md-12 mb-3">
			<h1 class="text-center cyan-text pt-5 mb-3">Your Donation is Other's Inspiration</h1>
		</div>
	</div>

	@if(!Auth::guest())
	@if (Auth::user()->role_as == "admin")
	<div class="container-fluid py-2">
		<a href="/createdonevent" class="btn aqua-gradient waves-effect">
			<div>
				<span>Create New Donation event</span>
			</div>
		</a>
	</div>
	@endif
	@endif

    <div class="row">
		@foreach($donevents as $donevent)
		<div class="col-md-4 mb-4">
			<div class="card default-color-dark">
				<div class="view">
					<img src="donation-resourses/events/images/{{$donevent->coverimage}}" class="card-img-top" alt="photo">
				</div>


				<div class="card-body text-center">
					<h4 class="card-title white-text">{{$donevent->name}} </h4>
					<p class="card-text white-text">{{$donevent->description}}</p>

					
					<a href="donate/{{$donevent->id}}" class="btn aqua-gradient waves-effect">Donate</a>

				</div>

			</div>
		</div>
		@endforeach
	</div>
	<div class="card">
  		<div class="card-header">Wire Transfers, Bank Accounts</div>
  		<div class="card-body">
    		<h5 class="card-title">For local donations (LKR)</h5>
    		<p class="card-text">
			Bank Name    : Commercial Bank of Ceylon PLC
			Bank Account : xxxxxxxxxxx
			Currency     : LKR
			Bank Address : No.766, Galle Road, Idama, Moratuwa, Sri Lanka.
			Swift Code   : CCEYLKLXXXX
    		</p>
  </div>
</div>

	<div>
		{{ $donevents->links() }}
	</div>
</div>
@endsection
