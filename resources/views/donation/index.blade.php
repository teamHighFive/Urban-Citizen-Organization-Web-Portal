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

	@if (Auth::user()->role_as == "admin")
	<div class="container-fluid py-2">
		<a href="/createdonevent" class="btn aqua-gradient waves-effect">
			<div>
				<span>Create New Donation event</span>
			</div>
		</a>
	</div>
	<!-- <div class="container-fluid py-2">
		<a href="/donations/show" class="btn aqua-gradient waves-effect">
			<div>
				<span>Show Donations</span>
			</div>
		</a>
	</div> -->
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
					<p class="card-text white-text">{{ str_limit($donevent->description, $limit = 150, $end = '...') }}</p>

					
					<a href="donate/{{$donevent->id}}" class="btn aqua-gradient waves-effect">Donate</a>
					

					<!-- {{-- @if(Auth::user()->role_as == "admin")
					<a href="donate/{{$donevent->id}}" class="btn aqua-gradient waves-effect">Donate</a>
					@endif --}} -->

					

					<!-- @if (Auth::check())
					<a class="btn aqua-gradient waves-effect" href="/donation/edit/{{$donevent->id}}" role="button">Edit</a>
					
					<div>
						<form action="/donation/{{$donevent->id}}" method="POST">
							@method('DELETE')
							@csrf
							<input type="submit" value="DELETE" onclick="return confirm('Are you sure?')" class="btn btn-danger">
						</form>
					</div>
					@endif  -->

				</div>

			</div>
		</div>
		@endforeach
	</div>

	<div>
		{{ $donevents->links() }}
	</div>
</div>
@endsection
