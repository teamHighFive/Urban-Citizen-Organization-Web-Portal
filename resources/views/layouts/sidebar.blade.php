 <!-- Admin Sidebar -->
 <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>

 <div class="sidebar-fixed position-fixed mt-5 " >

    <div class="list-group">

        <a href="{{ url('dashboard') }}" class="list-group-item list-group-item-info">
            <i class="fa fa-pie-chart mr-6"></i>My Dashboard
        </a>

        <a href="{{ url('my-profile') }}" class="list-group-item list-group-item-action waves-effect">
            <i class="fas fa-user-circle mr-3"></i>Profile
        </a>

        <a href="{{ url('change-password') }}" class="list-group-item list-group-item-action waves-effect">
            <i class="fas fa-fingerprint mr-3"></i>Reset My Password
        </a>

        <a href="{{ url('registered-user') }}" class="list-group-item list-group-item-action waves-effect">
            <i class="fa fa-users mr-3"></i>Registered Users
        </a>

        <a href="{{ url('my_posts') }}" class="list-group-item list-group-item-action waves-effect">
            <i class="fas fa-mail-bulk mr-3"></i>Posts
        </a>

        <a href="{{ url('user-active') }}" class="list-group-item list-group-item-action waves-effect">
            <i class="fas fa-newspaper mr-3"></i>User Approval
        </a>

        <a href="{{ url('membership-payments') }}" class="list-group-item list-group-item-action waves-effect">
            <i class="fas fa-money-check-alt mr-3"></i>My Membership Payments
        </a>

        {{-- <a href="{{ url('admin-approval') }}" class="list-group-item list-group-item-action waves-effect">
            <i class="fas fa-bullhorn mr-3"></i>Online Conferences
        </a> --}}

    </div>
</div>
<!-- Admin Sidebar -->
