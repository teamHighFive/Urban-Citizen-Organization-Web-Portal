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

                            @guest

                            @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">
                                    <button type="button"  class="btn btn-cyan animated fadeInUp">Join with Us</button>
                                </a>

                            @endif
                            @else

                            @endguest

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
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                            sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                            Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
                            nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in 
                            reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla 
                            pariatur. Excepteur sint occaecat cupidatat non proident, sunt in 
                            culpa qui officia deserunt mollit anim id est laborum.
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
                                @foreach($donationEvents as $donationEvent)
                                    <div class="col-lg-4 col-md-4 col-sm-12 my-1">
                                        <div class="card card-margin">
                                            <div class="bg-image hover-overlay ripple" data-ripple-color="light">
                                                <img
                                                    src="donation-resourses/events/images/{{$donationEvent->coverimage}}"
                                                    class="img-fluid center-cropped"
                                                    style="height:20vh; object-fit: cover; object-position: center; width:100%;"
                                                />
                                            </div>
                                            <div class="card-body" style="height:250px;">
                                                <h5 class="card-title">{{$donationEvent->name}}</h5>
                                                <p class="card-text">
                                                    {{ str_limit($donationEvent->description, $limit = 150, $end = '...') }}
                                                </p>
                                                <a href="donate/{{$donationEvent->id}}" class="btn btn-primary" style="position:absolute; bottom:15px; left:15px; right:15px;">Donate</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <a href="/donation" class="btn btn-white cyan-text mt-5">More</a>
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
                        <!--Carousel Wrapper-->
                        <div id="albums" class="carousel slide carousel-fade" data-ride="carousel">
                            <!--Indicators-->
                            <ol class="carousel-indicators">
                                <li data-target="#albums" data-slide-to="0" class="active"></li>
                                <li data-target="#albums" data-slide-to="1"></li>
                                <li data-target="#albums" data-slide-to="2"></li>
                                </ol>
                                <!--/.Indicators-->
                            <!--Slides-->
                            <div class="carousel-inner" style="max-height: 60vh" role="listbox">
                                @foreach($albums as $album)
                                <div class="carousel-item @if($loop->first) active @endif">
                                    <div class="view">
                                    <img class="d-block w-100" src="gallery-resourses/images/{{$album->coverimage}}"
                                        alt="slide">
                                    <div class="mask rgba-black-light"></div>
                                    </div>
                                    <div class="carousel-caption">
                                    <h3 class="h3-responsive">{{$album->title}}</h3>
                                    <p>{{$album->description}}</p>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <!--/.Slides-->
                            <!--Controls-->
                            <a class="carousel-control-prev" href="#albums" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#albums" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                            </a>
                            <!--/.Controls-->
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!--
        ==================================================
        Blog Section Start
        ================================================== -->
        <section id="blog" class="pt-5 pb-5 cyan text-white text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="fadeInDown">What's New</h1>
                            <div class="row fadeInDown mt-5" style="color:#333333">
                                @foreach ($posts as $post)
                                    <div class="col-lg-4 col-md-4 col-sm-12 my-1">
                                        <div class="card card-margin">
                                            <div class="bg-image hover-overlay ripple" data-ripple-color="light">
                                                @if($post->cover_image != null)
                                                <img
                                                    src="/storage/cover_images/{{$post->cover_image}}"
                                                    class="img-fluid center-cropped"
                                                    style="height:20vh; object-fit: cover; object-position: center; width:100%;"
                                                />
                                                @endif
                                            </div>
                                            <div class="card-body" style="height:250px;">
                                                <h5 class="card-title">{{$post->title}}</h5>
                                                <p class="card-text">
                                                    {{ str_limit($post->body, $limit = 150, $end = '...') }}
                                                </p>
                                                <a href="/posts/{{$post->id}}" class="btn btn-primary" style="position:absolute; bottom:15px; left:15px; right:15px;">View Post</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <a href="/posts" class="btn btn-white cyan-text mt-5">More</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    @include('layouts.footer')

</body>
</html>
