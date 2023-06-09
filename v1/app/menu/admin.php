<?php
    if(isset($_GET['login'])){
     
      $x = $_GET['login'];
      if($x==1){
        echo "<script>
        toastr.success('Successfully Login.')
        </script>";
      }
    }
?>
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-header">Home</li>
        <li class="nav-item">
            <a href="dashboard"
                class="nav-link <?php if (isset($_GET['page']) && $_GET['page'] == "dashboard"){ echo 'active'; } ?>">
                <i class="fas fa-chart-pie nav-icon"></i>
                <p>
                    Dashboard

                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="inventory"
                class="nav-link <?php if (isset($_GET['page']) && $_GET['page'] == "inventory"){ echo 'active'; } ?>">
                <i class="fas fa-cubes nav-icon"></i>
                <p>
                    Inventory List
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="employee"
                class="nav-link <?php if (isset($_GET['page']) && $_GET['page'] == "employee"){ echo 'active'; } ?>">
                <i class="fas fa-users nav-icon"></i>
                <p>
                    Manage Employee
                </p>
            </a>
        </li>

        <li class="nav-header">Components</li>
        <li class="nav-item">

                <li class="nav-item">
                    <a href="position"
                        class="nav-link <?php if (isset($_GET['page']) && $_GET['page'] == "position"){ echo 'active'; } ?>">
                        <i class="fas fa-users nav-icon"></i>
                        <p>
                            Position
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="office"
                        class="nav-link <?php if (isset($_GET['page']) && $_GET['page'] == "office"){ echo 'active'; } ?>">
                        <i class="nav-icon fas fa-briefcase"></i>
                        <p>
                            Office
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="category"
                        class="nav-link <?php if (isset($_GET['page']) && $_GET['page'] == "category"){ echo 'active'; } ?>">
                        <i class="nav-icon fas fa-layer-group"></i>
                        <p>
                            Item Category
                        </p>
                    </a>
                </li>
        </li>

        <li class="nav-header">Settings</li>
        <li class="nav-item">
            <a href="profile"
                class="nav-link <?php if (isset($_GET['page']) && $_GET['page'] == "profile"){ echo 'active'; } ?>">
                <i class="nav-icon fas fa-user-circle"></i>
                <p>
                    My Account
                </p>
            </a>
        </li>

    </ul>
</nav>