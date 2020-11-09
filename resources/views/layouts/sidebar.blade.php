 <!-- Sidebar -->
 <div class="sidebar-fixed position-fixed">


    <div class="list-group list-group-flush">
      <a href="{{ url('dashboard') }}" class="list-group-item list-group-item-action waves-effect">
        <i class="fa fa-pie-chart mr-3"></i>Dashboard
      </a>
      <a href="#" class="list-group-item list-group-item-action waves-effect">
        <i class="fa fa-user mr-3"></i>Profile</a>
      <a href="#" class="list-group-item list-group-item-action waves-effect">
        <i class="fa fa-table mr-3"></i>Tables</a>
      <a href="#" class="list-group-item list-group-item-action waves-effect">
        <i class="fa fa-map mr-3"></i>Maps</a>

        <?php
            if(Auth::user()->role_as == 'admin'){
               ?>
                <a href="{{ url('registered-user') }}" class="list-group-item list-group-item-action waves-effect">
                    <i class="fa fa-users mr-3"></i>Registered Users
                </a>
               <?php
            }else{
                ?>
                <?php
            }

        ?>
    </div>

  </div>
  <!-- Sidebar -->
