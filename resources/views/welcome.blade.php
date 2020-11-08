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
            <div class="mask rgba-stylish-strong">
                <div class="container-fluid d-flex align-items-center justify-content-center h-100">
                    <div class="row d-flex justify-content-center text-center">
                        <div class="col-md-10">
                            <!-- Heading -->
                            <h2 class="display-4 font-weight-bold white-text pt-5 mb-2 animated fadeInUp">Welcome to Urban Citizes Organization</h2>

                            <!-- Divider -->
                            <hr class="hr-light animated fadeInUp">

                            <!-- Description -->
                            <h4 class="white-text my-4 animated fadeInUp">Let's make Colombo the right type of city!</h4>
                            <button type="button" class="btn btn-outline-white animated fadeInUp">Join with Us</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/.Mask-->

    </header>

    <main>

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
