@extends('layouts.main')

@section('title','Archives')
@section('content')
    <div class="container" >
        <h2 class="text-center red-text pt-5 mb-3">Upload your extra submissions in here</h2>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="jumbotron">
                <form action="{{ route('uploadfileexel') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                        <input type="text" name="file_name" id= "file_Name" class="form-control my-1" placeholder="Submission file name" required>                        

                        <input type="text" name="Description" class="form-control my-1" placeholder="Description (optional)">

                        <!-- <input type="text" name="userId" class="form-control my-1" placeholder="User ID"> -->
                    <br>
                        
                    <br>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                            </div>
                            <div class="custom-file">
                                <input type="file" name="file" class="custom-file-input" required>
                                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                            </div>
                        </div>

                        <br>

                        <!-- <button type="submit" name="submit" class="btn btn-primary mt-3">Upload</button> -->
                        <button type="submit" name="submit" class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#centralModal">Upload</button>

          
                        <div class="links">
                            <a href="submission_table">View uploded files</a>
                        </div>
                </form>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    </div>
@endsection
