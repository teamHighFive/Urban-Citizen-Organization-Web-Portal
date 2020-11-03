@extends('layouts.main')

@section('title','Archives')
@section('content')
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
@endsection
