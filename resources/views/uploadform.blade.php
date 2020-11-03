<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

</head>
<body>
    

<div class="container">
            <div>
            <a href="archieves">
                <img alt="LOGO" src="https://images.cdn4.stockunlimited.net/clipart/home-button_1481470.jpg"
                width="50" height="50">
            </a>
            </div>
        <div class="jumbotron">
        <h2 style="font-family:Garamond;"><strong>Upload your Document in here</strong></h2> <br>
        <form action="{{ route('uploadfile') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        
            <!-- <div class="form-group">
                <label>doc id</label>
                <input type="text" name="docId" class="form-control" placeholder="Enter id">
            </div> -->
            <div class="form-group">
                <label>Document name or description</label>
                <input type="text" name="docName" class="form-control" placeholder="Enter a detail to identify the document">
            </div>
            <!-- <div class="form-group">
                <label>location</label>
                <input type="text" name="location" class="form-control" placeholder="Enter location">
            </div> -->
            <div class="form-group">
                <label>Uploader's ID</label>
                <input type="text" name="userId" class="form-control" placeholder="Enter user ID">
            </div>
            <!-- <div class="form-group">
                <label>pE</label>
                <input type="text" name="pE" class="form-control" placeholder="Enter pE">
            </div>
            <div class="form-group">
                <label>pV</label>
                <input type="text" name="pV" class="form-control" placeholder="pV">
            </div>
            <div class="form-group">
                <label>pM</label>
                <input type="text" name="pM" class="form-control" placeholder="pM">
            </div> -->
            
            <div class="form-group">
                <label>Event or Function</label>
                <input type="text" name="event" class="form-control" placeholder="(optional)">
            </div> 

            <label>File</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" name="file" class="form-control">
                </div>
            </div>
            <br>
            <button type="submit" name="submit" class="btn btn-success btn-sm">Upload</button>
       
        <br><br>
        
            <div class="links">
                 <a href="table">View uploded files</a>  
                </div>
        
        </form>
        </div>
    </div>

</body>
</html>