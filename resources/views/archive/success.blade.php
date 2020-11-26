@extends('layouts.main')

@section('title','Upcoming Meetings')
@section('content')
<div class="container" style="min-height: 100vh">
    <h2 class="text-center #000-text pt-5 mb-3">Uploaded successfuly</h2>
    <h5 class="text-center #000-text ">(files can be view in Warehouse)</h5>
    <div class="container" >
      <div class="row">
        <div class="col-md-2"></div>
          <div class="col-md-8">
            <div class="jumbotron">
              <div class="center">
                <div class="row" >
                    <div class="col-md-12">
                      <center>
                        <img src="images/archives/tick.png" width="120px" height="120px"></a>

                        <div class="row py-5" >
                        <div class="col-md-6">
                            <a href="choose-type">
                            <button  class="btn btn-success btn-lg">Upload another file</button>
                            </a> <br>
                        </div>
                        <div class="col-lg-6">
                            <a href="archieves">
                            <button  class="btn btn-warning btn-lg">View Uploaded Files</button>
                            </a> <br>
                        </div>
                        </div>
                        </center>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
