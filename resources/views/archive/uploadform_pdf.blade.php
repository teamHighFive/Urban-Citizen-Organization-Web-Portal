@extends('layouts.main')

@section('title','Upcoming Meetings')
@section('content')
    <h2 class="text-center red-text pt-5 mb-3">Upload your pdf files in here</h2>
    <div class="container" >
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="jumbotron">
                    <form action="{{ route('uploadfilepdf') }}" method="POST" enctype="multipart/form-data">
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

                            <button type="submit" name="submit" class="btn btn-danger mt-3">Upload</button>

                            <br><br>

                            <div class="links">
                                <a href="table">View uploded files</a>
                            </div>
                    </form>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
@endsection
