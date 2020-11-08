<!DOCTYPE html>
<html lang="en">
<head>

    @include('layouts.header')
    @section('title','Urban Citizens Organization')

    <style>
        #intro {
            height: 100vh;
            background: url("../images/slider.png") no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }
    </style>

</head>
<body>

    <header>

        @include('layouts.navbar')

        <!--Mask-->
        <div id="intro" class="view">
            <div class="mask rgba-white-strong">
                <div class="container-fluid d-flex align-items-center justify-content-center h-100">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-md-10">
                            <!-- Heading -->
                            <h2 class="display-4 font-weight-bold pt-5 mb-2 animated fadeInUp">Welcome to Urban Citizens Organization</h2>

                            <!-- Divider -->
                            <hr class="hr-dark animated fadeInUp">

                            <!-- Description -->
                            <h4 class="my-4 animated fadeInUp">Let's make Colombo the right type of city!</h4>
                            <button type="button" class="btn btn-cyan animated fadeInUp">Join with Us</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/.Mask-->

    </header>

    <main>

        <!--
        ==================================================
        About Section Start
        ================================================== -->
        <section id="about" class="pt-5 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-8">
                        <div class="animated fadeInLeft">
                            <h2>
                            ABOUT US
                            </h2>
                            <p>
                                <blockquote>
                                    Our mission is to make Colombo the right type of city!
                                </blockquote>
                            </p>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error, adipisci voluptatum repudiandae, natus impedit repellat aut officia illum at assumenda iusto reiciendis placeat. Temporibus, vero.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="animated fadeInRight">
                            <img src="images/slider.png" width="100%" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--
        ==================================================
        Donations Section Start
        ================================================== -->
        <section id="donations" class="pt-5 pb-5 cyan text-white text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="fadeInDown">DONATIONS</h1>
                            <div class="row fadeInDown mt-5" style="color:#333333">
                                <div class="col-md-4">
                                    <div class="card card-margin">
                                        <div class="bg-image hover-overlay ripple" data-ripple-color="light">
                                            <img
                                                src="https://mdbootstrap.com/img/new/standard/nature/111.jpg"
                                                class="img-fluid"
                                            />
                                            <a href="#!">
                                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">
                                                Some quick example text to build on the card title and make up the bulk of the
                                                card's content.
                                            </p>
                                            <a href="#!" class="btn btn-primary">Donate</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card card-margin">
                                        <div class="bg-image hover-overlay ripple" data-ripple-color="light">
                                            <img
                                                src="https://mdbootstrap.com/img/new/standard/nature/111.jpg"
                                                class="img-fluid"
                                            />
                                            <a href="#!">
                                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">
                                                Some quick example text to build on the card title and make up the bulk of the
                                                card's content.
                                            </p>
                                            <a href="#!" class="btn btn-primary">Donate</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card card-margin">
                                        <div class="bg-image hover-overlay ripple" data-ripple-color="light">
                                            <img
                                                src="https://mdbootstrap.com/img/new/standard/nature/111.jpg"
                                                class="img-fluid"
                                            />
                                            <a href="#!">
                                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">
                                                Some quick example text to build on the card title and make up the bulk of the
                                                card's content.
                                            </p>
                                            <a href="#!" class="btn btn-primary">Donate</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="/" class="btn btn-white cyan-text mt-5">More</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--
        ==================================================
        Gallery slider Section Start
        ================================================== -->
        <section id="gallery" class="pt-5 pb-5 ">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
                            <div class="carousel-inner">
                              <div class="carousel-item active">
                                <img
                                  src="https://mdbootstrap.com/img/new/slides/041.jpg"
                                  class="d-block w-100"
                                  alt="..."
                                />
                              </div>
                              <div class="carousel-item">
                                <img
                                  src="https://mdbootstrap.com/img/new/slides/042.jpg"
                                  class="d-block w-100"
                                  alt="..."
                                />
                              </div>
                              <div class="carousel-item">
                                <img
                                  src="https://mdbootstrap.com/img/new/slides/043.jpg"
                                  class="d-block w-100"
                                  alt="..."
                                />
                              </div>
                            </div>
                            <a
                              class="carousel-control-prev"
                              href="#carouselExampleFade"
                              role="button"
                              data-slide="prev"
                            >
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Previous</span>
                            </a>
                            <a
                              class="carousel-control-next"
                              href="#carouselExampleFade"
                              role="button"
                              data-slide="next"
                            >
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="visually-hidden">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--
        ==================================================
        Blog Section Start
        ================================================== -->
        <section id="donations" class="pt-5 pb-5 cyan text-white text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="fadeInDown">What's New</h1>
                            <div class="row fadeInDown mt-5" style="color:#333333">
                                <div class="col-md-4">
                                    <div class="card card-margin">
                                        <div class="bg-image hover-overlay ripple" data-ripple-color="light">
                                            <img
                                                src="https://mdbootstrap.com/img/new/standard/nature/111.jpg"
                                                class="img-fluid"
                                            />
                                            <a href="#">
                                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">
                                                Some quick example text to build on the card title and make up the bulk of the
                                                card's content.
                                            </p>
                                            <a href="#" class="btn btn-primary">View Post</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card card-margin">
                                        <div class="bg-image hover-overlay ripple" data-ripple-color="light">
                                            <img
                                                src="https://mdbootstrap.com/img/new/standard/nature/111.jpg"
                                                class="img-fluid"
                                            />
                                            <a href="#">
                                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">
                                                Some quick example text to build on the card title and make up the bulk of the
                                                card's content.
                                            </p>
                                            <a href="#" class="btn btn-primary">View Post</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card card-margin">
                                        <div class="bg-image hover-overlay ripple" data-ripple-color="light">
                                            <img
                                                src="https://mdbootstrap.com/img/new/standard/nature/111.jpg"
                                                class="img-fluid"
                                            />
                                            <a href="#">
                                            <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                                            </a>
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">Card title</h5>
                                            <p class="card-text">
                                                Some quick example text to build on the card title and make up the bulk of the
                                                card's content.
                                            </p>
                                            <a href="#" class="btn btn-primary">View Post</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a href="/" class="btn btn-white cyan-text mt-5">More</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    @include('layouts.footer')

</body>
</html>





    {{-- <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="block wow fadeInUp" data-wow-delay=".3s">

                    <!-- Slider -->
                    <section class="cd-intro">
                        <h1 class="wow fadeInUp animated cd-headline slide" data-wow-delay=".4s" >
                            <span>Welcome to Urban Citizes Organization</span><br>
                        </h1>
                    </section> <!-- cd-intro -->
                    <!-- /.slider -->
                    <h2 class="wow fadeInUp animated" data-wow-delay=".6s" >
                        Let's make Colombo the right type of city!
                    </h2>
                    <a class="btn-lines dark light wow fadeInUp animated btn btn-default btn-green hvr-bounce-to-right" data-wow-delay=".9s" href="/register" >Join with Us</a>
                </div>
            </div>
        </div>
    </div> --}}
