<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <!-- <img src="https://d2v9ipibika81v.cloudfront.net/uploads/sites/210/Profile-Icon.png"
                class="img-circle elevation-1" alt="User Image"> -->
            <span class="aui-avatar aui-avatar-xxlarge">
                <span class="aui-avatar-inner">
                    <?php 
                        // Default fallback picture
                        $default_picture = "user1-128x128.jpg";
                        
                        // Use session picture if set, otherwise use default
                        $picture_file = !empty($_SESSION['session_picture']) ? $_SESSION['session_picture'] : $default_picture;
                        
                        // Verify the picture file exists, otherwise use default
                        $picture_path = dirname(__DIR__) . '/dist/img/users/' . $picture_file;
                        if (!file_exists($picture_path)) {
                            $picture_file = $default_picture;
                        }
                    ?>
                    <img class="img-circle elevation-0" src="dist/img/users/<?php echo htmlspecialchars($picture_file); ?>" alt="Profile Picture" />
                </span>
            </span>
        </div>
        <div class="info"> <strong>
                <a href="" class="d-block"> Hello <?php 
                    echo $_SESSION['firstname'];
             ?> </a> </strong>
        </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
        <form action="search/search_result_navbar.php" method="get">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" name="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar" type="submit" name="submit_search">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
        </form>
    </div>

    <!-- Sidebar Menu -->
    <?php 
        // Load centralized path configuration if not already loaded
        if (!defined('MENU_PATH')) {
            require_once dirname(__FILE__) . '/../../config/paths.php';
        }
        
        if($_SESSION['role_id'] == '1'){
            include_menu('superadmin.php');
        }elseif($_SESSION['role_id'] == '2'){
            include_menu('admin.php');
        }elseif($_SESSION['role_id'] == '3'){
            include_menu('user.php');
        } 
    ?>
    <!-- /.sidebar-menu -->
</div>