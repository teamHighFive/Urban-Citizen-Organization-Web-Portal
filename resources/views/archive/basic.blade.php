@extends('layouts.main')

@section('title','Archives')
@section('content')
<head>
<style>
    body {
    scroll-behavior: smooth;
    }

    h1  {color: white;
     background-color: black;
     text-align: center;
   padding: 10px;}

    h6 {color: white;
     background-color: black;
     text-align: center;
   padding: 2px;}

   h5{text-align: center;}

    </style>
</head>   
<body>

  <main>

    <div class="container">
    <br><br><br>&emsp;
    <center><h1>Document archives</h2>
      <!--Section: Products v.3-->
      <section class="section pb-3 wow fadeIn" data-wow-delay="0.3s">
      <button type="button" class="btn btn-outline-dark" data-ripple-color="dark"><a href="#Archives" style="color:#000">Upload files</a></button>
    </center>
        
      <div class="row">
         <!--Grid column-->
         <div class="col-lg-3 col-md-12 mb-3">
            <!--Card-->
            <div class="card card-ecommerce">
              <!--Card image-->
              <div class="view overlay z-depth-1">
                <img src="images/archives/files.jpg" height="150px"
                  alt="">                
              </div>
              <!--Card image-->
              <!--Card content-->
              <div class="card-body text-center no-padding">
                <!--Category & Title-->
                <div class="text-muted">
                  <h5>General</h5>
                </div>
                <!--Card footer-->
                <div class="card-footer">
                  <a href="seperated-arc"><span class="float-left">View files</span></a>
                  <span class="float-right">
                    <a class="" data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
                    </a>
                      <i class="fas fa-fingerprint"></i>
                  </span>
                </div>
              </div>
              <!--Card content-->
            </div>
            <!--Card-->
          </div>
          <!--Grid column-->

        <!-- gallery box was here -->      
          <!--Grid column-->
          <div class="col-lg-3 col-md-12 mb-3">
            <!--Card-->
            <div class="card card-ecommerce">
              <!--Card image-->
              <div class="view overlay z-depth-1">
                <a href="/event-calendar">
                <img src="images/archives/events2.jpg" class="card-img-top" height="150px"
                  alt="">
                  <div class="mask rgba-white-slight"></div>
                </a>
              </div>
              <!--Card image-->
              <!--Card content-->
              <div class="card-body text-center no-padding">
                <!--Category & Title-->
                <a href="/event-calendar" class="text-muted">
                  <h5>Events</h5>
                </a>
                <!--Card footer-->
                <div class="card-footer">
                  <a href="/eventfiles-arc"><span class="float-left">View files</span></a>
                    <span class="float-right">
                      <a class="" data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
                      </a>
                        <i class="fas fa-fingerprint"></i>                      
                    </span>
                </div>
              </div>
              <!--Card content-->
            </div>
            <!--Card-->
          </div>
          <!--Grid column-->

         
          <!--Fourth column-->
          <div class="col-lg-3 col-md-12 mb-3">
            <!--Card-->
            <div class="card card-ecommerce">
              <!--Card image-->
              <div class="view overlay z-depth-1">
                <a href="/donation">
                <img src="images/archives/donation.jpg" class="card-img-top" height="150px"
                  alt="">
                  <div class="mask rgba-white-slight"></div>
                </a>
              </div>
              <!--Card image-->
              <!--Card content-->
              <div class="card-body text-center no-padding">
                <!--Category & Title-->
                <a href="/donation" class="text-muted">
                  <h5>Donation</h5>
                </a>
                <!--Card footer-->
                <div class="card-footer">
                    <a href="/donatfiles-arc"><span class="float-left">View files</span></a>
                  <span class="float-right">
                    <a class="" data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
                    </a>
                      <i class="fas fa-fingerprint"></i>
                  </span>
                </div>
              </div>
              <!--Card content-->
            </div>
            <!--Card-->
          </div>
          <!--Fourth column-->
        

        <!-- <section class="section pb-3 wow fadeIn" data-wow-delay="0.3s"> -->
        <!--Section heading-->
          
         <!--Section description-->         
          <!--Fourth column-->
            <div class="col-lg-3 col-md-12 mb-3">
                <!--Card-->
                <div class="card card-ecommerce">
                  <!--Card image-->
                  <div class="view overlay z-depth-1">
                  <a href="/online-conferences">
                    <img src="images/archives/meeting2.jpg" class="card-img-top" height="150px"
                      alt="">                    
                     <div class="mask rgba-white-slight"></div>                    
                  </div>
                  </a>
                  <!--Card image-->
                  <!--Card content-->
                  <div class="card-body text-center no-padding">
                    <!--Category & Title-->
                    <a href="/online-conferences" class="text-muted">
                      <h5>Online conferences</h5>
                    </a>
                    <!--Card footer-->
                    <div class="card-footer">
                    <a href="/conffiles-arc"><span class="float-left">View files</span></a>
                      <span class="float-right">
                        <a class="" data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
                        </a>    
                          <i class="fas fa-fingerprint"></i>                  
                      </span>
                    </div>
                  </div>
                  <!--Card content-->
                </div>
                <!--Card-->
            </div>
              <!--Fourth column-->
        <!--Grid row-->  
      </div>    
                  <!-- blog box was here -->


      </section>
      <!--Section: Products v.3-->
      <hr class="mb-5 mt-4">
      <!--Section: Products v.5-->
      <section class="section pb-3 wow fadeIn" data-wow-delay="0.3s">
        <!--Section heading-->
        <a name="Archives">
        <h1 class="font-weight-bold text-center h1 my-5">Archives Uploading</h1>
        </a>    
    <!-- /.Streak Section -->
    <div class="container">
        <!--Grid row-->
        <div class="row">
          <!--Grid column-->
          <div class="col-md-12 mb-4">
            <div class="card card-image" style="background-image: url('images/archives/additina_files.jpg');">
              <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4">
                <div>
                  <a href="" class="purple-text">
                    <h5>
                      <i class="fas fa-plane pr-2"></i>Additional files</h5>
                  </a>
                  
                  <h3 class="mb-4 mt-4" >
                    <strong>Separated Documents</strong>
                  </h3>
                  <p>---------------------------------------
                  --------------------------------------
                  Add any extra or addtional file in here for urbanz
                  --------------------------------------
                  --------------------------------------</p>
                  <a class="btn btn-secondary btn-sm" href="choose-type">
                    <i class="fas fa-clone left"></i>Upload</a>
                  
                </div>
              </div>
            </div>
          </div>
          <!--Grid column-->

      
          <!--Grid column-->
          <div class="col-md-6 mb-4">
            <div class="card card-image" style="background-image: url('images/archives/events_seperated.jpg');">
              <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4">
                <div>
                  <a href="" class="green-text">
                    <h5>
                      <i class="fas fa-eye pr-2"></i>Events</h5>
                  </a>
                  <h3 class="mb-4 mt-4">
                    <strong>Addtional files for events</strong>
                  </h3>
                  <a class="btn btn-success btn-sm" href="/event-file-form">
                    <i class="fas fa-clone left"></i> Upload</a>
                </div>
              </div>
            </div>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-6 mb-4">
            <div class="card card-image" style="background-image: url('images/archives/donation_seperated.jpg');">
              <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4">
                <div>
                  <a class="white-text">
                    <h5>
                    <i class="fas fa-hand-holding-usd pr-2"></i>Donation</h5>
                  </a>
                  <h3 class="mb-4 mt-4">
                    <strong>Addtional files for donation</strong>
                  </h3>
                  <a class="btn btn-light btn-sm" style="color:#000" href="/donate-file-form">
                    <i class="fas fa-hand-holding-usd"></i> Upload</a>
                </div>
              </div>
            </div>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-6 mb-4">
            <div class="card card-image" style="background-image: url('images/archives/seperated_conference.jpg');">
              <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4">
                <div>
                  <a href="" class="orange-text">
                    <h5>
                    <i class="fas fa-users pr-2"></i>Conferences</h5>
                  </a>
                  <h3 class="mb-4 mt-4">
                    <strong>Addtional files for conferences</strong>
                  </h3>
                  <a class="btn btn-warning btn-sm" href="/conf-file-form">
                    <i class="fas fa-users"></i> Upload</a>
                </div>
              </div>
            </div>
          </div>
          <!--Grid column-->
          
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#basicExampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{ route('uploadfileconf') }}" method="POST" enctype="multipart/form-data">

      <div class="modal-body">
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
                
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
      </form>
    </div>
  </div>
</div>


        </div>
        <!--Grid row-->

      </section>
      <!--Projects section v.4-->
    </div>

  </main>
</body>
</html>