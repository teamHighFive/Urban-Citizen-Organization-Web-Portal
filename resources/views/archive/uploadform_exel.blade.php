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
                        <input type="text" name="file_name" id= "file_Name" class="form-control my-1" placeholder="Submission file name">                        

                        <input type="text" name="Description" class="form-control my-1" placeholder="Description (optional)">

                        <!-- <input type="text" name="userId" class="form-control my-1" placeholder="User ID"> -->
                    <br>
                        
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

                        <br>

                        <!-- <button type="submit" name="submit" class="btn btn-primary mt-3">Upload</button> -->
                        <button type="submit" name="submit" class="btn btn-danger waves-effect waves-light" data-toggle="modal" data-target="#centralModal">Upload</button>

                        <!--button alert pop up code-->  
                            <!-- Central Modal Medium -->
                            <div class="modal fade" id="centralModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <!--Content-->
                                <div class="modal-content">
                                    <!--Header-->
                                    <div class="modal-body">
                                    <br>
                                    <center><button type="button" class="btn btn-success btn-lg">Uploaded</button></center>
                                    </div>
                                    <!-- Footer
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Done</button>                   
                                    </div> -->
                                </div>
                                    <!--/.Content-->
                                </div>
                                </div>
                        <br><br>

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
