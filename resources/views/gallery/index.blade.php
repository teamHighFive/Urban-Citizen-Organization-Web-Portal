@extends('layouts.main')

@section('content')

@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif


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

    <h1  class="text-center cyan-text pt-5 mb-3">Albums</h1>
    <div class="row mt-5">
            @foreach($albums as $album)
                <div class="col-lg-4">
                    <div class="card">
                        <div class="view overlay">
                            <img class="card-img-top" src="gallery-resourses/images/{{$album->coverimage}}" alt="snow" />
                        </div>

                        <div class="card-body">
                            <h4 class="card-title">{{$album->title}}</h4>
                            <p>{{ str_limit($album->description, $limit = 150, $end = '...') }}</p>
                            <a class="btn btn-sm btn-primary btn-block mb-3" href="album/show/{{$album->id}}" role="button">See More</a>
                            @if(!Auth::guest())
                                @if(Auth::user()->role_as == "admin")
                                <div class="row">
                                    <div class="col-lg-6">
                                        <a class="btn btn-sm btn-warning btn-block" href="/album/edit/{{$album->id}}" role="button">Edit</a>
                                    </div>
                                    <div class="col-lg-6">
                                        <form action="/album/{{$album->id}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <input type="submit" value="DELETE" onclick="return confirm('Are you sure?')" class="btn btn-sm btn-danger btn-block">
                                        </form>
                                    </div>
                                </div>
                                @endif
                            @endif
                            
                            
                            <p class="card-text">Created date:  {{ date("d F Y",strtotime($album->created_at)) }} at {{ date("g:ha",strtotime($album->created_at)) }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
    </div>

            @if(Auth::user()->role_as == "admin")
            <div class="my-5">
                <a href="album/create" class="btn aqua-gradient waves-effect  ">Create New Album</a>
            </div>
            @endif
</div>
@endsection
<script>
    $('.addAttr').click(function() {
    var id = $(this).data('id');   
    $('#id').val(id); 
    } );
</script>
