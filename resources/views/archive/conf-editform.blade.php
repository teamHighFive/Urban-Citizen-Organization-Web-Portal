
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
                <form action="/updateconf/{{ $upload->id }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('PUT')}}
                    <input type="hidden" name="id" id="id" value="{{$upload->id}}">


                    <div class="md-form input-with-pre-icon">
                        <i class="fas fa-signature input-prefix"></i>
                        <input type="text" name="document_name" class="form-control my-1" placeholder="Document name or ID" value="{{$upload->document_name}}">
                    </div>

                    <div class="md-form input-with-pre-icon">
                        <i class="fas fa-map-marker-alt input-prefix"></i>
                        <input type="text" name="location" class="form-control my-1" placeholder="Conference location (Online or Physical)" value="{{$upload->location}}">
                    </div>

                    <div class="md-form input-with-pre-icon">
                        <i class="fas fa-pencil-alt input-prefix"></i>
                        <div class="form-outline">
                            <textarea class="form-control" name="description" id="textAreaExample" rows="4" value="{{$upload->description}}"></textarea>
                            <label class="form-label" for="textAreaExample">Description (can be add if physical location)</label>
                        </div>                   
                    </div> 

                    <div class="md-form input-with-pre-icon">
                        <i class="fas fa-calendar-alt input-prefix"></i>
                        <input type="text" name="event" class="form-control my-1" placeholder="Event-if available (optional)" value="{{$upload->event}}">
                    </div>

                    <br>
                    <label class="my-1">Set permission to view document</label>
                    <div class="row my-1 ml-1">
                        <div class="form-check col-md-4">
                            <input type="checkbox" class="form-check-input" name="p_member"  <?php if($upload->p_member == true) echo 'checked';?>>
                            <label for="permissionmember" class="form-check-label">Members</label>
                        </div>
                        <div class="form-check col-md-4">
                            <input type="checkbox" class="form-check-input" name="p_visitor"  <?php if($upload->p_visitor == true) echo 'checked';?>>
                            <label for="permissionvisitor" class="form-check-label">Visitors</label>
                        </div>
                        <div class="col-md-4"></div>
                    </div>
                <br>
                        <a target="_blank" href="{{ asset ('uploads/conf_files'.$upload->type.'/' . $upload->file) }}">
                        @if($upload->type == 'doc'||$upload->type =='docx'||$upload->type =='txt'||$upload->type =='pptx')
                                <i class="fas fa-file-invoice">&nbsp; previuosly uploaded file</i>
                        @elseif($upload->type =='pdf')
                                <i class="far fa-file-pdf">&nbsp; previuosly uploaded file</i>
                        @elseif($upload->type =='zip')
                                <i class="far fa-file-archive">&nbsp; previuosly uploaded file</i>
                        @elseif($upload->type == 'jpg'||$upload->type == 'png'||$upload->type =='png'||$upload->type =='jpeg')
                                <i class="fas fa-file-image">&nbsp; previuosly uploaded file</i>
                        @elseif($upload->type == 'excel'||$upload->type == 'xlsm'||$upload->type =='xls' ||$upload->type =='xlsx')
                                <i class="fas fa-excel">&nbsp; previuosly uploaded file</i>
                        @elseif($upload->type == 'mkv'||$upload->type == 'mp4'||$upload->type == 'mov'||$upload->type == '3gp'
                        ||$upload->type == 'wmv'||$upload->type == 'avi'||$upload->type == 'webm'||$upload->type == 'flv')
                                <i class="fas fa-file-video">&nbsp; previuosly uploaded file</i>      
                        @else
                                <i class="fas fa-info">&nbsp; previuosly uploaded file</i>
                        @endif
                        </a>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="file" class="custom-file-input" value="{{$upload->file}}">
                            <label class="custom-file-label" for="inputGroupFile01">Change file</label>
                        </div>
                    </div>

                    <input type="hidden" name="type" class="form-control my-1" value=1>
                    <br>
                    <!-- <button type="submit" name="submit" class="btn btn-deep-orange">Upload</button> -->


                    <button type="submit" name="submit" class="btn btn-deep-orange" data-toggle="modal" data-target="#centralModal">Upload</button>

                    <br><br>
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
