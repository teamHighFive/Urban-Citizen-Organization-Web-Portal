@extends('layouts.main')

@section('header')
    <style>
        .centered {
			position: absolute !important;
			top: 25vh;
			left: 50%;
			transform: translate(-50%, -50%);

		  }

		  .maintext{
			  font-size: 3.7vw;
			  color: rgb(255, 255, 255);
			  font-family:'Alegreya Sans SC';
			  text-shadow: 5px 0px 5px black;
		  }
    </style>
@endsection

@section('content')

<div class="container" style="height:auto;min-height: 100vh">
    <div class="row">

		<div class="col-md-12 mb-3">

			<img src="donation-resourses/events/images/donationthumbnail.jpg" class="img-fluid z-depth-1" alt="Responsive image" style="width:100%; height:40em">
            {{-- TODO goes down when no donation is available --}}
            <div class="mask flex-center waves-effect waves-light">
				<div class="centered maintext">Your Donation <br>
					is Others Inspiration</strong>
	  		</div>

		</div>
	</div>


	@if (Auth::check())
	<div class="container-fluid py-2">
		<a href="/createdonevent" class="btn aqua-gradient waves-effect">
			<div>
				<span>Create New event</span>
			</div>
		</a>
	</div>
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

					
					<a href="donate" class="btn aqua-gradient waves-effect">Donate</a>
					

					{{-- @if(Auth::user()->role_as == "admin")
					<a href="donate" class="btn aqua-gradient waves-effect">Donate</a>
					@endif --}}

					

					@if (Auth::check())
					<a class="btn aqua-gradient waves-effect" href="/donation/edit/{{$donevent->id}}" role="button">Edit</a>
					
					<div>
						<form action="/donation/{{$donevent->id}}" method="POST">
							@method('DELETE')
							@csrf
							<input type="submit" value="DELETE" class="btn btn-danger">
						</form>
					</div>
					@endif 

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
