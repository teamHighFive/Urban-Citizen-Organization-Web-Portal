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


</head>
<body>

<h2 class="text-center orange-text pt-5 mb-3">Upload your image files in here</h2>   
<div class="container" >
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="jumbotron">       
                <form action="{{ route('uploadfileimg') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                        <input type="text" name="docName" class="form-control my-1" placeholder="Document name or description">
                            
                        <input type="hidden" name="userId" class="form-control my-1" value=1>
                    
                        <input type="text" name="event" class="form-control my-1" placeholder="Event or Function (optional)">
                    <br>
                        <label class="my-1">Set permission to view document</label>
                        <div class="row my-1 ml-1">
                            <div class="form-check col-md-4">
                                <input type="checkbox" class="form-check-input" name="permissionmember" value="editor">
                                <label for="permissionmember" class="form-check-label">Members</label>
                            </div>
                            <div class="form-check col-md-4">
                                <input type="checkbox" class="form-check-input" name="permissionvisitor" value="editor">
                                <label for="permissionvisitor" class="form-check-label">Visitors</label>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    <br>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" name="file" class="custom-file-input">
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>
                        
                        <button type="submit" name="submit" class="btn btn-warning mt-3">Upload</button>
                
                        <br><br>
                    
                        <div class="links">
                            <a href="table">View uploded files</a>  
                        </div>
                </form>
                        <div>
                            <a href="home">
                            <img align="right" alt="LOGO" src="https://images.cdn4.stockunlimited.net/clipart/home-button_1481470.jpg"
                            width="50" height="50">
                            </a>
                        </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>

</body>
</html>