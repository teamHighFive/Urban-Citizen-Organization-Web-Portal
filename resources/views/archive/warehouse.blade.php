<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
        <!-- Google Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
        <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
    <style>
    a { color: #000; } /* CSS link color */
    </style>    
</head>


<body>
    
    <div class="container">
        <div class="jumbotron">       
        <h2 style = "font-family:Georgia, serif ;font-weight:600; text-align: center;">
         The Document Warehouse
        </h2>
        <div class="links">
            <button type="submit" name="submit" class="btn btn-light btn-sm"><a href="/choose">Upload another file</a></button>  
        </div>
        <br><br>
           
<table class="table table-stripped table-bordered">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Document ID</th>
            <th scope="col">Document Name</th>
            <th scope="col">User ID</th>
            <th scope="col">Event Name</th>
            <th scope="col"><strong>File </strong><br> (click to view)</th>
        </tr>
    </thead>
    
    <tbody>
        @foreach ($upload as $item)
        <tr>
        <tr>
            
            <th> {{$item->document_id}}</th>
            <th> {{$item->document_name}}</th>
            <th> {{$item->created_by}}</th>
            <th> {{$item->event}}</th>
            <th>  
                @if($item->type == 'img')
                    <a target="_blank" href="{{ asset ('uploads/files/'.$item->type.'/' . $item->file) }}">
                        <h1 class="far fa-file-image"></h1>
                    </a>
                @endif
                
                @if($item->type == 'doc')
                    <a target="_blank" href="{{ asset ('uploads/files/'.$item->type.'/' . $item->file) }}">
                        <h1 class="fas fa-file-word"></h1>
                    </a>
                @endif

                @if($item->type == 'exel')
                    <a target="_blank" href="{{ asset ('uploads/files/'.$item->type.'/' . $item->file) }}">
                        <h1 class="far fa-file-excel "></h1>
                    </a>
                @endif

                @if($item->type == 'pdf')
                    <a target="_blank" href="{{ asset ('uploads/files/'.$item->type.'/' . $item->file) }}">
                        <h1 class="far fa-file-pdf"></h1>
                    </a>
                @endif

                @if($item->type == 'video')
                    <a target="_blank" href="{{ asset ('uploads/files/'.$item->type.'/' . $item->file) }}">
                        <h1 class="fas fa-video"></h1>
                    </a>
                @endif
            
            </th>
            
        </tr>
        @endforeach
    </tbody>
</table>

        </div>
    </div>

</body>
</html>