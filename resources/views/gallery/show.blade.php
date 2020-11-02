@extends('layouts.main')
@section('content')
<div class="">
    <a class="btn btn-primary" href="/photo/create/{{$gallery->id}}" role="button">Add Photo</a>
    <br>
    <a href="/gallery">Back to Gallery</a>

</div>

    <div class="container">
       
        
        <div class="row">
            
               
                
           
           
            
                @foreach ($photos as $photo)

                    <div class="col-md-4">
                        <div class="thumbnail">

                            <a href="/photo/details/{{$photo->id}}">
                                <img class="thumbnail" src="/gallery-template/images/{{$photo->image}}" alt="..." style="width:100%">
                            </a>
                            <h5>{{$photo->title}}</h5> 
                            <div class="caption">
                                <h5>{{$photo->description}}</h5>
                            </div>
                        </div>
                    </div>
                    
                @endforeach
               
            
           
            </div>
        </div>
    </div>
        

@endsection

