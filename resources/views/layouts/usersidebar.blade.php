 <!-- User Sidebar -->
 <div class="sidebar-fixed position-fixed mt-5 " >


    <div class="list-group">

        <a href="{{ url('dashboard') }}" class="list-group-item list-group-item-info">
            <i class="fa fa-pie-chart mr-3"></i>My Dashboard
        </a>

        <a href="{{ url('my-profile') }}" class="list-group-item list-group-item-action waves-effect">
            <i class="fas fa-user-circle mr-3"></i>Profile
        </a>

        <a href="{{ url('change-password') }}" class="list-group-item list-group-item-action waves-effect">
            <i class="fas fa-fingerprint mr-3"></i>Reset My Password
        </a>

        <a href="{{ url('my_posts') }}" class="list-group-item list-group-item-action waves-effect">
            <i class="fas fa-mail-bulk mr-3"></i>My posts
        </a>

        <a href="{{ url('membership-payments') }}" class="list-group-item list-group-item-action waves-effect">
            <i class="fas fa-money-check-alt mr-3"></i>My Membership Payments
        </a>

        {{-- <a href="{{ url('#') }}" class="list-group-item list-group-item-action waves-effect">
                <i class="fas fa-images mr-3"></i>My photos
        </a> --}}

        <a href="{{ url('get-recordings') }}" class="list-group-item list-group-item-action waves-effect">
            <i class="fas fa-bullhorn mr-3"></i>Meeting Records
        </a>

    </div>

  </div>
  <!-- User Sidebar -->
