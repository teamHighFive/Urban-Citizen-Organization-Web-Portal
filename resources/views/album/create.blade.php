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
        <div class="p-5 ">
            <div class="row column">
                <h3>Create Album</h3>
                <p class="lead ">Create a new Album and start uploading</p>
            </div>
        </div>
        <div class="container py-5">
            <div class="">
                <div class="md-form p-3">
                            {!!Form::open(array('action'=>'AlbumController@store','enctype'=>'multipart/form-data')) !!}
                            {!!Form::label('title','Title') !!}
                            {!!Form::text('title',$value=null,$attributes=['placeholder'=>'Album Title','name'=>'title']) !!}
                            {!!Form::label('description','Description') !!}
                            {!!Form::text('description',$value=null,$attributes=['placeholder'=>'Album Description ','name'=>'description']) !!}
                            {!!Form::file('coverimage',$attributes=['class' => 'file-path validate px-4','placeholder'=>'Upload your file'])!!}
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
