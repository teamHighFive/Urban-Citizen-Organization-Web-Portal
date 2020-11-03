@extends('layouts.main')
@section('title','Urban Citizens Organization|Gallery')


@section('content')



        <section class="page-section bg-light" id="portfolio">
            <div class="container-fluid">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">GALLERY</h2>
                </div>
                

                    <div class="container-fluid">
                        <a href="gallery/create" class="btn btn-primary btn-md btn-d-lg-none">Create New Gallery</a>
                    </div>

                    <div class="container">
                        <section>
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                                    
                                </ol>
                                
                                <div class="carousel-inner">
                                    @foreach($galleries as $gallery)
                                        
                                        <div class="carousel-item  @if($loop->first) active @endif">
                                            <img src="gallery-template/images/{{$gallery->coverimage}}" class="d-block w-100" alt="...">
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
                        </section>

                    </div>
                   
                    
            
                
           
        
                <div class="row">
                    @foreach($galleries as $gallery)
                
                     <div class="col-lg-4 col-sm-6 mb-4">
                    
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-toggle="modal" href="/">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="gallery-template/images/{{$gallery->coverimage}}" alt="" />
                            </a>
                            
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading">{{$gallery->name}}</div>
                                <div class="portfolio-caption-subheading text-muted">{{$gallery->description}}</div>
                                <a class="btn btn-success" href="/gallery/show/{{$gallery->id}}" role="button">See more</a>
                                <a class="btn btn-danger" href="/gallery/delete/{{$gallery->id}}" role="button">Delete</a>
                   
                                <a class="btn btn-primary" href="#" role="button">Edit</a>
                            </div>
                        </div>
                    
                    </div>
                    @endforeach 
                    
                    <div class="text-center">
                   
                        {{ $galleries->links() }}
                    </div>
           
                
              
            
           
               
                </div>
            </div>
        </section>
        


<script>
    
    $('.carousel slide').carousel({
        interval: 200
    })
</script>		
                   
@endsection

