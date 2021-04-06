 <!-- Admin Sidebar -->
 <div class="sidebar-fixed position-fixed mt-5 overflow-auto" style="overflow-y: scroll; z-index: 10; height: 100%; max-height: 85vh;">

    <div class="list-group list-group-flush">

        <a href="{{ url('dashboard') }}" class="list-group-item list-group-item-action waves-effect">
            <i class="fa fa-pie-chart mr-6"></i>My Dashboard
        </a>

        <a href="{{ url('my-profile') }}" class="list-group-item list-group-item-action waves-effect">
            <i class="fas fa-id-card mr-3"></i>Profile
        </a>

        <a href="{{ url('change-password') }}" class="list-group-item list-group-item-action waves-effect">
            <i class="fas fa-fingerprint mr-3"></i>Reset My Password
        </a>

        <a href="{{ url('registered-user') }}" class="list-group-item list-group-item-action waves-effect">
            <i class="fa fa-users mr-3"></i>Registered Users
        </a>

        <a href="{{ url('my_posts') }}" class="list-group-item list-group-item-action waves-effect">
            <i class="fas fa-mail-bulk mr-3"></i>My Posts
        </a>

        <a href="{{ url('user-active') }}" class="list-group-item list-group-item-action waves-effect">
            <i class="fas fa-newspaper mr-3"></i>User Approval
        </a>

        <a href="{{ url('#') }}" class="list-group-item list-group-item-action waves-effect">
            <i class="fas fa-images mr-3"></i>My Photos
        </a>

        <a href="{{ url('membership-payments') }}" class="list-group-item list-group-item-action waves-effect">
            <i class="fas fa-poll mr-3"></i>Membership Payments
        </a>

        <a href="{{ url('view-meetings') }}" class="list-group-item list-group-item-action waves-effect">
            <i class="fas fa-bullhorn mr-3"></i>All Meetings
        </a>

        <a href="{{ url('admin-approval') }}" class="list-group-item list-group-item-action waves-effect">
            <i class="fas fa-bullhorn mr-3"></i>New Meeting Requests
        </a>

        <a href="{{ url('upcoming-meetings') }}" class="list-group-item list-group-item-action waves-effect">
            <i class="fas fa-bullhorn mr-3"></i>Upcoming Meetings
        </a>

        <a href="{{ url('get-recordings') }}" class="list-group-item list-group-item-action waves-effect">
            <i class="fas fa-bullhorn mr-3"></i>Meeting Records
        </a>

        <a href="{{ url('manual-sms') }}" class="list-group-item list-group-item-action waves-effect">
            <i class="fas fa-bullhorn mr-3"></i>SMS Gateway
        </a>

    </div>

</div>
<!-- Admin Sidebar -->
