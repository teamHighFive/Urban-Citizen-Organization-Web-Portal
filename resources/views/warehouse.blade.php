<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <style>
    a { color: #000; } /* CSS link color */
    </style>    
</head>


<body>
    
    <div class="container">
        <div class="jumbotron">

            <div>
            <a href="archieves">
                <img alt="LOGO" src="https://images.cdn4.stockunlimited.net/clipart/home-button_1481470.jpg"
                width="50" height="50">
            </a>
            </div>
       
        <h2 style = "font-family:Georgia, serif ;font-weight:600; text-align: center;">
         The Document Warehouse
        </h2>
        <div class="links">
            <button type="submit" name="submit" class="btn btn-light btn-sm"><a href="warehouse">Upload another file</a></button>  
        </div>
        <br><br>
           
<table class="table table-stripped table-bordered">
    <thead class="thead-dark">
        <tr>
            <th scope="col">Document ID</th>
            <th scope="col">Document Name</th>
            <th scope="col">User ID</th>
            <th scope="col">Event Name</th>
            <th scope="col">File</th>
        </tr>
    </thead>
    
    <tbody>
        @foreach ($upload as $item)
        <tr>
        <tr>
            <th> {{$item->docId}}</th>
            <th> {{$item->docName}}</th>
            <th> {{$item->userId}}</th>
            <th> {{$item->event}}</th>
            <th> {{$item->file}} <br>
            <img src="{{ asset ('uploads/files/' . $item->file) }}" width="100px" height="100px" alt="file"></th>
        </tr>
        @endforeach
    </tbody>
</table>

        </div>
    </div>

</body>
</html>