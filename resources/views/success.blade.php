<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="https://fonts.googleapis.com/css2?family=Syne+Mono&display=swap" rel="stylesheet">
<style>
h2 {
  font-family: "Sofia";
  font-size: 22px;
}
h5 {
  font: italic bold 12px/30px Georgia, serif;
}
p {font-family: 'Syne Mono', monospace;}

form {font-family: 'Syne Mono', monospace;}
</style>
</head>


    <body>
    <form align="center">
      <div class="container">
      <div class="jumbotron">
          <h2>Uploaded successfuly</h2>
          <h5>files can be view in Warehouse</h5>
          <p>
              <form action="/archieves">
              <button type="submit" class="btn btn-info btn-lg">Back to my profile</button>
              </form> <br>
              <form action="/upload">
              <button type="submit" class="btn btn-success btn-lg">Upload another file</button>
              </form> <br>
              <form action="/table">
              <button type="submit" class="btn btn-warning btn-lg">View uploaded files</button>
              </form>
              </p>
      </div>
      </div>  
    </form>
   </body>
</html>