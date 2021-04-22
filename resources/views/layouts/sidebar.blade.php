 <!-- Admin Sidebar -->
 <div class="sidebar-fixed position-fixed mt-5 overflow-auto" style="overflow-y: scroll; z-index: 10; height: 100%; max-height: 85vh;">

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
            <i class="fas fa-th-large mr-3"></i>Posts
        </a>

        <a href="{{ url('user-active') }}" class="list-group-item list-group-item-action waves-effect">
            <i class="fas fa-user-lock mr-3"></i>User Approval
        </a>

        <a href="{{ url('membership-payments') }}" class="list-group-item list-group-item-action waves-effect">
            <i class="fas fa-money-check-alt mr-3"></i>My Membership Payments
        </a>

        <a href="{{ url('/pollhome') }}" class="list-group-item list-group-item-action waves-effect">
            <i class="fas fa-poll-h mr-3"></i>Polls
        </a>

        <a href="{{ url('view-meetings') }}" class="list-group-item list-group-item-action waves-effect">
            <i class="fas fa-handshake mr-3"></i>All Meetings
        </a>

        <a href="{{ url('admin-approval') }}" class="list-group-item list-group-item-action waves-effect">
            <i class="fas fa-bullhorn mr-3"></i>New Meeting Requests
        </a>

        <a href="{{ url('upcoming-meetings') }}" class="list-group-item list-group-item-action waves-effect">
            <i class="fas fa-calendar-day mr-3"></i>Upcoming Meetings
        </a>

        <a href="{{ url('get-recordings') }}" class="list-group-item list-group-item-action waves-effect">
            <i class="fas fa-compact-disc mr-3"></i>Meeting Records
        </a>

        <a href="{{ url('/donations/showAllDonationEvents') }}" class="list-group-item list-group-item-action waves-effect">
            <i class="fas fa-donate mr-3"></i>Donations
        </a>

        <a href="{{ url('manual-sms') }}" class="list-group-item list-group-item-action waves-effect">
            <i class="fas fa-comment mr-3"></i>SMS Gateway
        </a>

    </div>
</div>
<!-- Admin Sidebar -->
