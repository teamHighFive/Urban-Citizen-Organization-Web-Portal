<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

     <style>
 body, html {
  height: 100%;
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}

.bg-image {
  background-image: url("https://scontent.fcmb11-1.fna.fbcdn.net/v/t1.0-1/70484204_126149912087248_3842813892359094272_n.png?_nc_cat=109&ccb=2&_nc_sid=dbb9e7&_nc_ohc=VhF4zYh3p2YAX_56RhV&_nc_ht=scontent.fcmb11-1.fna&oh=612f145d6e89f4f5abcd25719c4d0b7a&oe=5FC4A016");
  filter: blur(8px);
  -webkit-filter: blur(8px);
  height: 100%; 
  
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
}

.bg-text {
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
  color: white;
  font-weight: bold;
  
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  z-index: 2;
  width: 80%;
  padding: 20px;
  text-align: center;
}

{
  box-sizing: border-box;
}
.column {
  float: left;
  width: 20%;
  padding: 25px;
}
/* Clearfix (clear floats) */
.row::after {
  content: "";
  clear: both;
  display: table;
}
</style>  

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

<div class="bg-image"></div>

<div class="bg-text">
  <h1><b> Hello,</b> <br><br> Select the document type you want to upload</h2>
  <p>&nbsp;</p>
    <div class="row py-15">
        <div class="column">
        <a href="upload_doc">
            <img height="130px" width="200px" src="images/Doc_logo.png" alt="doc" style="width:100%">
        </a>
        <p>&nbsp;</p><p>Doc files</p>
        </div>

        <div class="column">
        <a href="upload_exel">
            <img height="130px" width="200px" src="images/sheets-logo.png" alt="exel" style="width:100%">
        </a>
        <p>&nbsp;</p><p>Sheets</p>
        </div>
        
        <div class="column">
        <a href="upload_pdf">
            <img height="130px" width="200px" src="images/pdf-logo.jpg" alt="pdf" style="width:100%">
        </a>
        <p>&nbsp;</p><p>PDF files</p>
        </div>

        <div class="column">
        <a href="upload_images">
            <img height="130px" width="200px" src="images/images-logo.png" alt="image" style="width:100%">
        </a>
        <p>&nbsp;</p><p>Image files</p>
        </div>

        <div class="column">
        <a href="upload_videos">
            <img height="130px" width="200px" src="images/video-logo.jpg" alt="image" style="width:100%">
        </a>
        <p>&nbsp;</p><p>Video files</p>
        </div>

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