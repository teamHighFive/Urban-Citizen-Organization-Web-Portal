@extends('layouts.main')

@section('content')

<div class="container" style="min-height: 100vh">
    <section>

        <div id="carouselExampleIndicators" class="carousel slide carousel-fade " data-ride="carousel">


            <ol class="carousel-indicators mt-5">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>

            </ol>

            <div class="carousel-inner"  style="max-height: 60vh"  role="listbox">
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


            <div class="row row-cols-1 row-cols-md-3 mt-5">
            @foreach($albums as $album)

            
                <div class="col mb-4">
                    <div class="card">
                        <div class="view overlay">
                            <img class="card-img-top" src="gallery-resourses/images/{{$album->coverimage}}" alt="snow" />

                        </div>

                        <div class="card-body">
                            <h4 class="card-title">{{$album->title}}</h4>
                            <p class="card-text">{{$album->description}}</p>
                            <a class="btn btn-primary" href="album/show/{{$album->id}}" role="button">See more</a>
                            {{-- <a class="btn btn-danger" href="album/delete/{{$album->id}}" role="button">Delete</a> --}}

                            @if (Auth::check())
                            <a class="btn aqua-gradient waves-effect" href="/album/edit/{{$album->id}}" role="button">Edit</a>
                            
                            <div>
                                    <form action="/album/{{$album->id}}" method="POST">
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

            @if (Auth::check())
            <div class="my-5">
                <a href="album/create" class="btn aqua-gradient waves-effect  ">Create New Album</a>
            </div>
            @endif

       
    </div>
@endsection
