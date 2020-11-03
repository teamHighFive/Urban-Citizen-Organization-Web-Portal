@extends('layouts.admin')


@section('content')

<div class="container-fluid mt-5">

    <!-- Heading -->
    <div class="card mb-4 wow fadeIn">

      <!--Card content-->
      <div class="card-body d-sm-flex justify-content-between">

        <h4 class="mb-2 mb-sm-0 pt-1">
          <a href="https://mdbootstrap.com/docs/jquery/" target="_blank">Home Page</a>
          <span>/</span>
          <span>Dashboard</span>
        </h4>

        <form class="d-flex justify-content-center">
          <!-- Default input -->
          <input type="search" placeholder="Type your query" aria-label="Search" class="form-control">
          <button class="btn btn-primary btn-sm my-0 p" type="submit">
            <i class="fa fa-search"></i>
          </button>

        </form>

      </div>

    </div>
    <!-- Heading -->



    <!--Grid row-->
    <div class="row wow fadeIn">

      <!--Grid column-->
      <div class="col-md-6 mb-4">

        <!--Card-->
        <div class="card">

          <!--Card content-->
          <div class="card-body">

            <!-- Table  -->
            <table class="table table-hover">
              <!-- Table head -->
              <thead class="blue-grey lighten-4">
                <tr>
                  <th>#</th>
                  <th>Lorem</th>
                  <th>Ipsum</th>
                  <th>Dolor</th>
                </tr>
              </thead>
              <!-- Table head -->

              <!-- Table body -->
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Cell 1</td>
                  <td>Cell 2</td>
                  <td>Cell 3</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Cell 4</td>
                  <td>Cell 5</td>
                  <td>Cell 6</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Cell 7</td>
                  <td>Cell 8</td>
                  <td>Cell 9</td>
                </tr>
              </tbody>
              <!-- Table body -->
            </table>
            <!-- Table  -->

          </div>

        </div>
        <!--/.Card-->

      </div>
      <!--Grid column-->

      <!--Grid column-->
      <div class="col-md-6 mb-4">

        <!--Card-->
        <div class="card">

          <!--Card content-->
          <div class="card-body">

            <!-- Table  -->
            <table class="table table-hover">
              <!-- Table head -->
              <thead class="blue lighten-4">
                <tr>
                  <th>#</th>
                  <th>Lorem</th>
                  <th>Ipsum</th>
                  <th>Dolor</th>
                </tr>
              </thead>
              <!-- Table head -->

              <!-- Table body -->
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>Cell 1</td>
                  <td>Cell 2</td>
                  <td>Cell 3</td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>Cell 4</td>
                  <td>Cell 5</td>
                  <td>Cell 6</td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Cell 7</td>
                  <td>Cell 8</td>
                  <td>Cell 9</td>
                </tr>
              </tbody>
              <!-- Table body -->
            </table>
            <!-- Table  -->

          </div>

        </div>
        <!--/.Card-->

      </div>
      <!--Grid column-->

    </div>
    <!--Grid row-->



    <!--Grid row-->
    <div class="row wow fadeIn">

      <!--Grid column-->
        <div class="col-md-12 mb-4">

        <!--Card-->
        <div class="card">

          <!-- Card header -->
          <div class="card-header">Google map</div>

          <!--Card content-->
          <div class="card-body">

            <!--Google map-->
            <div id="map-container" class="map-container" style="height: 500px">
              <iframe src="https://maps.google.com/maps?q=university%20of%20moratuwa&t=&z=15&ie=UTF8&iwloc=&output=embed" frameborder="0"
                style="border:0" allowfullscreen></iframe>
            </div>

          </div>

        </div>
        <!--/.Card-->

      </div>
      <!--Grid column-->

      <!--Grid column-->


    </div>
    <!--Grid row-->

  </div>

@endsection


