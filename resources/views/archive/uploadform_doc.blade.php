@extends('layouts.main')

@section('title','Upcoming Meetings')
@section('content')
    <div class="container" >
        <h2 class="text-center cyan-text pt-5 mb-3">Upload your files in here</h2>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="jumbotron">
                    <form action="{{ route('uploadfiledoc') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}                            

                            <input type="text" name="docName" class="form-control my-1" placeholder="Document name or description">

                            <input type="hidden" name="userId" class="form-control my-1" value=1>

                            <input type="text" name="event" class="form-control my-1" placeholder="Event or Function (optional)">
                        <br>
                            <label class="my-1">Set permission to view document</label>
                            <div class="row my-1 ml-1">
                                <div class="form-check col-md-4">
                                    <input type="checkbox" class="form-check-input" name="permissionmember" value="editor" disabled checked>
                                    <label for="permissionmember" class="form-check-label">Admin</label>
                                </div>
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

                            <br>

                            <!-- <button type="submit" name="submit" class="btn btn-primary mt-3">Upload</button> -->
                            <button type="submit" name="submit" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#centralModal">Upload</button>

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
                                <a href="seperated-arc">View uploded files</a>
                            </div>
                    </form>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
@endsection
