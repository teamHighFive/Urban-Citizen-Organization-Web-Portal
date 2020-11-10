<!doctype html>
<html lang="en">
    <head>
        <link
        href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        rel="stylesheet"
        />
        <!-- Google Fonts -->
        <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
        rel="stylesheet"
        />
        <!-- MDB -->
        <link
        href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/1.0.0/mdb.min.css"
        rel="stylesheet"
        />
  
        <!--Bootstrap-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<style>
		.centered {
			position: absolute;
			top: 25vw;
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
    </head>
    <body>


	<div class="row">

		<div class="col-md-12 mb-3">
  
			<img src="donation-resourses/events/images/donationthumbnail.jpg" class="img-fluid z-depth-1" alt="Responsive image" style="width:100%; height:40em">
			<div class="mask flex-center waves-effect waves-light">
				<div class="centered maintext">Your Donation <br>
					is Others Inspiration</strong>
	  		</div>
  
		</div>
	</div>

	
	<div class="container-fluid py-2">
		<a href="/createdonevent" class="btn aqua-gradient waves-effect">
			<div>
				<span>Create New event</span>
			</div>
		</a>
	</div>
	



	{{-- <div class="row">
		@foreach($donevents ?? '' as $donevent)
		<div class="col-md-4 mb-4">
			
			
				<img class="card-img-top" src="donation-template/events/images/{{$donevent->coverimage}}" alt="Card image" style="width:100%">
				
					
						<div class="card-title"> {{$donevent->name}} </div>
							<p class="card-text">
								<span>{{$donevent->description}}</span>
							</p>
				
				
					<div class="card-img-overlay">
					<a href="/donate" class="btn btn-primary btn-md btn-d-lg-none">Donate</a>
					</div>
		</div>
		

		
		@endforeach 
		
	</div> --}}

	
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
					{{-- <div>
						<form action="/donation/{{$donevent->id}}" method="POST">
							@method('DELETE')
							@csrf
							<input type="submit" value="DELETE" class="btn btn-danger">
						</form>
					</div> --}}
					
				</div>
	
			</div>
		</div>	
		@endforeach 
		
	</div>

<div>
	{{ $donevents->links() }}
</div>

		

<!-- MDB -->
<script
type="text/javascript"
src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/1.0.0/mdb.min.js"
></script>


<!--Bootstrap-->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

</body>
</html>

