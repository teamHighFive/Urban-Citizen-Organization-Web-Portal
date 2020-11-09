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

        <section> 
            
                <div id="carouselExampleIndicators" class="carousel slide carousel-fade " data-ride="carousel">
                        
                            
                    <ol class="carousel-indicators mt-5">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        
                    </ol>
                    
                    <div class="carousel-inner"  role="listbox">
                        @foreach($albums as $album)
                            
                            <div class="carousel-item  @if($loop->first) active @endif">
                                <img src="gallery-resourses/images/{{$album->coverimage}}" class="d-block w-100" alt="slide">
                            </div>
                            
                        @endforeach
                    </div>
                    <div>
                    
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                        </a>
                    
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                        </a>
                    </div>

                </div>
            

           
        </section>

                    
        <section>
                   
                    
                        <div class="card-deck mt-5">
                        @foreach($albums as $album)
                    
                         
                            <div class="card mb-4">
                                <div class="view overlay">
                                    <img class="card-img-top" src="gallery-resourses/images/{{$album->coverimage}}" alt="snow" />
                                        
                                </div>
                                
                                <div class="card-body">
                                    <h4 class="card-title">{{$album->title}}</h4>
                                    <p class="card-text">{{$album->description}}</p>
                                    <a class="btn btn-primary" href="album/show/{{$album->id}}" role="button">See more</a>
                                    {{-- <a class="btn btn-danger" href="album/delete/{{$album->id}}" role="button">Delete</a> --}}
                                    <a class="btn aqua-gradient waves-effect" href="album/edit/{{$album->id}}" role="button">Edit</a>
                                        <div>
                                            <form action="/album/{{$album->id}}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <input type="submit" value="DELETE" class="btn btn-danger">
                                            </form>
                                        </div>
                                    
                                </div>
                            </div>
                        
                            
                        @endforeach
                        </div>
                        
                        <div class="my-5">
                            <a href="album/create" class="btn aqua-gradient waves-effect  ">Create New Album</a>
                        </div>
                
                    
                    <div class="row justify-content-center">
                   
                        {{ $albums->links() }}
                    </div>

                    
                    
           
<script>
    
    $('.carousel slide').carousel({
        interval: 25
    })
</script>		
                   
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

