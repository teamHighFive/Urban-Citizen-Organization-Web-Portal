
<!-- //------------------------------------------------------------------------------------------------ -->

@extends('layouts.main')

@section('title','Archives')
@section('content')

    <div class="container" >  

        <div class="header sunny-morning-gradient">
            <mdb-row class="d-flex justify-content-center">
                <h3 class="text-center white-text pt-3 mb-3">Conference files collection form <br></h3>
            </mdb-row>              
        </div>
        <br>
        
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="jumbotron">
                <form action="{{ route('uploadfileconf') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}

                    <div class="md-form input-with-pre-icon">
                        <i class="fas fa-signature input-prefix"></i>
                        <input type="text" name="document_name" class="form-control my-1" placeholder="Document name or ID" required>
                    </div>

                    <div class="md-form input-with-pre-icon">
                        <i class="fas fa-map-marker-alt input-prefix"></i>
                        <input type="text" name="location" class="form-control my-1" placeholder="Conference location (Online or Physical)" required>
                    </div>

                    <div class="md-form input-with-pre-icon">
                        <i class="fas fa-pencil-alt input-prefix"></i>
                        <div class="form-outline">
                            <textarea class="form-control" name="description" id="textAreaExample" rows="4"></textarea>
                            <label class="form-label" for="textAreaExample">Description (can be add if physical location)</label>
                        </div>                   
                    </div> 

                    <div class="md-form input-with-pre-icon">
                        <i class="fas fa-calendar-alt input-prefix"></i>
                        <input type="text" name="event" class="form-control my-1" placeholder="Event-if available (optional)">
                    </div>

                    <br>
                    <label class="my-1">Set permission to view document</label>
                    <div class="row my-1 ml-1">
                        <div class="form-check col-md-4">
                            <input type="checkbox" class="form-check-input" name="p_admin" value="1" checked disabled>
                            <label for="permissionmember" class="form-check-label">Admin</label>
                        </div>
                        <div class="form-check col-md-4">
                            <input type="checkbox" class="form-check-input" name="p_member" value="editor">
                            <label for="permissionmember" class="form-check-label">Members</label>
                        </div>
                        <div class="form-check col-md-4">
                            <input type="checkbox" class="form-check-input" name="p_visitor" value="editor">
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
                            <input type="file" name="file" class="custom-file-input" required>
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                    </div>

                    <input type="hidden" name="type" class="form-control my-1" value=1>
                    <br><br>

                    <button type="submit" name="submit" class="btn btn-deep-orange" data-toggle="modal" data-target="#centralModal">Upload</button>

                    <div class="links">
                        <a href="conffiles-arc">View uploded files</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
    </div>
@endsection
