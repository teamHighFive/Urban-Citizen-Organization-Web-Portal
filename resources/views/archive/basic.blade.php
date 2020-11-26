@extends('layouts.main')

@section('title','Archives')
@section('content')
<head>
<style>
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
        <h6 class="font-weight-bold text-center h1 my-5"></h6>
        <!--Section description-->
        <p class="text-center grey-text mb-5 mx-auto w-responsive"></p>
        <!--Grid row-->
        <div class="row">
          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4">
            <!--Card-->
            <div class="card card-ecommerce">
              <!--Card image-->
              <div class="view overlay z-depth-1">
              <a href="/album">
                <img src="images/archives/gallery.jpg" class="card-img-top" height="150px" width="30px"
                  alt="">
                  <div class="mask rgba-white-slight"></div>
                </a>
              </div>
              <!--Card image-->
              <!--Card content-->
              <div class="card-body text-center no-padding">
                <!--Category & Title-->
                <a href="/album" class="text-muted">
                  <h5>Gallery</h5>
                </a>
                <!--Card footer-->
                <div class="card-footer">
                <a href="gallery-arc"><span class="float-left">View files</span></a>
                  <span class="float-right">
                    <a class="" data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
                      <i class="fas fa-fingerprint"></i>
                    </a>
                  </span>
                </div>
              </div>
              <!--Card content-->
            </div>
            <!--Card-->
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4">
            <!--Card-->
            <div class="card card-ecommerce">
              <!--Card image-->
              <div class="view overlay z-depth-1">
              <a href="/event-calendar">
                <img src="images/archives/events.jpg" class="card-img-top" height="150px"
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
                <a href="event-arc"><span class="float-left">View files</span></a>
                <span class="float-right">
                    <a class="" data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
                      <i class="fas fa-fingerprint"></i>
                    </a>
                  </span>
                </div>
              </div>
              <!--Card content-->
            </div>
            <!--Card-->
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-lg-3 col-md-6 mb-4">
            <!--Card-->
            <div class="card card-ecommerce">
              <!--Card image-->
              <div class="view overlay z-depth-1">
                <img src="images/archives/files.jpg" height="150px"
                  alt="">
                <a>
                  <div class="mask rgba-white-slight"></div>
                </a>
              </div>
              <!--Card image-->
              <!--Card content-->
              <div class="card-body text-center no-padding">
                <!--Category & Title-->
                <a class="text-muted">
                  <h5>Direct documents</h5>
                </a>
                <!--Card footer-->
                <div class="card-footer">
                  <a href="seperated-arc"><span class="float-left">View files</span></a>
                  <span class="float-right">
                    <a class="" data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
                      <i class="fas fa-fingerprint"></i>
                    </a>
                  </span>
                </div>
              </div>
              <!--Card content-->
            </div>
            <!--Card-->
          </div>
          <!--Grid column-->

          <!--Fourth column-->
          <div class="col-lg-3 col-md-6 mb-4">
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
                      <i class="fas fa-fingerprint"></i>
                    </a>
                  </span>
                </div>
              </div>
              <!--Card content-->
            </div>
            <!--Card-->
          </div>
          <!--Fourth column-->
        </div>
        <!--Grid row-->

        <section class="section pb-3 wow fadeIn" data-wow-delay="0.3s">
        <!--Section heading-->
          
          <!--Section description-->
          <p class="text-center grey-text mb-5 mx-auto w-responsive"></p>
          <!--Grid row-->
          <div class="row">
          <!--Fourth column-->
            <div class="col-lg-3 col-md-6 mb-4">
                <!--Card-->
                <div class="card card-ecommerce">
                  <!--Card image-->
                  <div class="view overlay z-depth-1">
                    <img src="images/archives/meeting2.jpg" class="card-img-top" height="150px"
                      alt="">
                    <a>
                      <div class="mask rgba-white-slight"></div>
                    </a>
                  </div>
                  <!--Card image-->
                  <!--Card content-->
                  <div class="card-body text-center no-padding">
                    <!--Category & Title-->
                    <a href="" class="text-muted">
                      <h5>Online conferences</h5>
                    </a>
                    <!--Card footer-->
                    <div class="card-footer">
                      <span class="float-left">View files</span>
                      <span class="float-right">
                        <a class="" data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
                          <i class="fas fa-fingerprint"></i>
                        </a>
                      </span>
                    </div>
                  </div>
                  <!--Card content-->
                </div>
                <!--Card-->
              </div>
              <!--Fourth column-->
            
            

            <!--Fourth column-->
            <div class="col-lg-3 col-md-6 mb-4">
                <!--Card-->
                <div class="card card-ecommerce">
                  <!--Card image-->
                  <div class="view overlay z-depth-1">
                    <img src="images/archives/blog.jpg" class="card-img-top" height="150px"
                      alt="">
                    <a>
                      <div class="mask rgba-white-slight"></div>
                    </a>
                  </div>
                  <!--Card image-->
                  <!--Card content-->
                  <div class="card-body text-center no-padding">
                    <!--Category & Title-->
                    <a href="" class="text-muted">
                      <h5>Blog</h5>
                    </a>
                    <!--Card footer-->
                    <div class="card-footer">
                      <span class="float-left">View files</span>
                      <span class="float-right">
                        <a class="" data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
                          <i class="fas fa-fingerprint"></i>
                        </a>
                      </span>
                    </div>
                  </div>
                  <!--Card content-->
                </div>
                <!--Card-->
              </div>
              <!--Fourth column-->
            </div>
            <!--Grid row-->
          </div>


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
            <div class="card card-image" style="background-image: url('https://mdbootstrap.com/img/Photos/Others/slide%20(31).jpg');">
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
            <div class="card card-image" style="background-image: url('https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/img%20(60).jpg');">
              <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4">
                <div>
                  <a href="" class="pink-text">
                    <h5>
                      <i class="fas fa-camera pr-2"></i>Gallery</h5>
                  </a>
                  <h3 class="mb-4 mt-4">
                    <strong>Addtional files to gallery</strong>
                  </h3>
                <a class="btn btn-pink btn-sm">
                    <i class="fas fa-clone left"></i> Upload</a>
                </div>
              </div>
            </div>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-6 mb-4">
            <div class="card card-image" style="background-image: url('https://cdn.psychologytoday.com/sites/default/files/styles/image-article_inline_full/public/field_blog_entry_images/2019-10/87400469_m.jpg?itok=f2qO5Lne');">
              <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4">
                <div>
                  <a href="" class="green-text">
                    <h5>
                      <i class="fas fa-eye pr-2"></i>Events</h5>
                  </a>
                  <h3 class="mb-4 mt-4">
                    <strong>Addtional files for events</strong>
                  </h3>
                  <a class="btn btn-success btn-sm">
                    <i class="fas fa-clone left"></i> Upload</a>
                </div>
              </div>
            </div>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-6 mb-4">
            <div class="card card-image" style="background-image: url('https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/img%20(58).jpg');">
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
            <div class="card card-image" style="background-image: url('https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/img%20(58).jpg');">
              <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4">
                <div>
                  <a href="" class="orange-text">
                    <h5>
                    <i class="fas fa-users pr-2"></i>Conferences</h5>
                  </a>
                  <h3 class="mb-4 mt-4">
                    <strong>Addtional files for conferences</strong>
                  </h3>
                  <a class="btn btn-warning btn-sm">
                    <i class="fas fa-users"></i> Upload</a>
                </div>
              </div>
            </div>
          </div>
          <!--Grid column-->

          <!--Grid column-->
          <div class="col-md-6 mb-4">
            <div class="card card-image" style="background-image: url('https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/img%20(58).jpg');">
              <div class="text-white text-center d-flex align-items-center rgba-black-strong py-5 px-4">
                <div>
                  <a href="" class="light-blue-text">
                    <h5>
                    <i class="fas fa-book-open pr-2"></i>Blog</h5>
                  </a>
                  <h3 class="mb-4 mt-4">
                    <strong>Addtional files for blog</strong>
                  </h3>
                  <a class="btn btn-info btn-sm">
                    <i class="fas fa-book-open"></i> Upload</a>
                </div>
              </div>
            </div>
          </div>
          <!--Grid column-->

        </div>
        <!--Grid row-->

      </section>
      <!--Projects section v.4-->
    </div>

  </main>
</body>
</html>