<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
        header('Location: ../index.php?session=expired');
    }
    
    // Load centralized path configuration
    require_once '../config/database.php';
    require_once '../config/paths.php';
    
    // Include layout files using helper functions
    include_layout('header.php');
?>


<body class="hold-transition sidebar-mini text-sm  layout-fixed layout-navbar-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <?php include_layout('preloader.php'); ?>

        <!-- Navbar -->
        <?php 
        
            if($_SESSION['role_id'] == '1'){
                include_layout('navbar.php');
            }elseif($_SESSION['role_id'] == '2'){
                include_layout('navbar.php');
            }elseif($_SESSION['role_id'] == '3'){
                include_layout('navbar_user.php');
            } 
         ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar <?php 
                if($_SESSION['role_id'] == '1'){
                    echo "sidebar-dark-red";
                }elseif($_SESSION['role_id'] == '2'){
                    echo "sidebar-dark-success bg-black";
                }elseif($_SESSION['role_id'] == '3'){
                    echo "sidebar-light-red";
                } 
            ?> elevation-2">

            <!-- Brand Logo -->
            <?php include_component('logo.php'); ?>

            <!-- Sidebar -->
            <?php include_layout('sidebar.php'); ?>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <?php //include('content_header.php'); ?>
            <!-- /.content-header -->

            <!-- Main content -->
            <?php 
                if(isset($_GET['page'])){
                    $page = 'pages/' . $_GET['page'] . '.php';
                }else{
                        if($_SESSION['role_id'] == '1'){
                            $page = 'pages/dashboard.php';
                        }elseif($_SESSION['role_id'] == '2'){
                            $page = 'pages/dashboard.php';
                        }elseif($_SESSION['role_id'] == '3'){
                            $page = 'pages/self_inventory.php';
                        } 
                }

                if (file_exists($page)) {
                    require_once $page; 
                }else{
                    require_once 'pages/error_404.php';
                }
            ?>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <?php include_layout('footer.php'); ?>
    <!-- ./wrapper -->
</body>


</html>