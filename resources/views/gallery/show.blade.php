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




    <div class="row mt-5 px-5">

        <h2>{{$album->title}}</h2>

    </div>
    <div class="row px-5">

        <a href="/gallery">Back to Gallery</a>

    </div>
    <div class="row mt-2">

        <div class="col px-5">
            <a class="btn btn-primary" href="/photo/create/{{$album->id}}" role="button">Add Photo</a>

        </div>
    </div>






        <div class="row px-5 py-5">
            @foreach ($photos as $photo)
            <div class="col-lg-4 col-md-12 mb-3">

                        <div class="thumbnail">
                            <a href="/photo/details/{{$photo->id}}">
                                <img class="img-fluid z-depth-1" src="/album-template/images/{{$photo->image}}" alt="responsive image">
                            </a>
                            <h5>{{$photo->caption}}</h5>
                            <div class="caption">
                                <h5>{{$photo->description}}</h5>
                            </div>
                        </div>
            </div>
            @endforeach

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
