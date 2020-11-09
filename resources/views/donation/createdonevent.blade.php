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
    </head>
    <body>
<div class="container-fluid">

    
    <h3 class="mt-5 py-5">Create New Donation Event</h3>
        
    <div class="row small-up-2 medium-up-3 large-up-4">
            <div class="form-group row">

                {!!Form::open(array('action'=>'DonationController@store','enctype'=>'multipart/form-data')) !!}
                @csrf
                {!!Form::label('name','Name') !!}
                {!!Form::text('name',$value=null,$attributes=['placeholder'=>'Event Name','name'=>'name']) !!}
                {!!Form::label('description','Description') !!}
                {!!Form::text('name',$value=null,$attributes=['placeholder'=>'Event Description','name'=>'description']) !!}
                {!!Form::label('coverimage') !!}
                {!!Form::file('coverimage')!!}
                {!!Form::submit('Submit',$attributes=['class'=>'btn btn-primary btn-sm '])!!}
                {!!Form::close() !!}
        

            </div>
    </div>
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