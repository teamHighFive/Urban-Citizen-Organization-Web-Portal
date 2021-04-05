@extends('layouts.main')

@section('title','Upcoming Meetings')
@section('content')
    <div class="container" >
        <h2 class="text-center cyan-text pt-5 mb-3">Edit file</h2>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="jumbotron">
                    <form action="/updatefile/{{ $upload->id }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}                
                    {{ method_field('PUT')}}
                            <input type="hidden" name="id" id="id" value="{{$upload->id}}">

                            <input type="text" name="document_name" class="form-control my-1" placeholder="Document name or description" value="{{$upload->document_name}}">
                            
                            <!-- <input type="hidden" name="location" class="form-control my-1" value="one">

                            <input type="hidden" name="created_by" class="form-control my-1" value=1> -->

                            <input type="text" name="event" class="form-control my-1" placeholder="Event or Function (optional)" value="{{$upload->event}}">
                        <br>
                            <label class="my-1">Set permission to view document</label>
                            <div class="row my-1 ml-1">
                                <div class="form-check col-md-4">
                                    <input type="checkbox" class="form-check-input" name="p_member" value="{{ $upload->p_member }}">
                                    <label for="permissionmember" class="form-check-label">Members</label>
                                </div>
                                <div class="form-check col-md-4">
                                    <input type="checkbox" class="form-check-input" name="p_visitor" value="{{$upload->p_visitor}}">
                                    <label for="permissionvisitor" class="form-check-label">Visitors</label>
                                </div>
                                <div class="col-md-4"></div>
                            </div>
                        <br>
                            <!-- <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                                </div>
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" value="{{$upload->file}}">
                                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                </div>
                            </div> -->

                            <button type="submit" name="submit" class="btn btn-primary mt-3">Update</button>

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
