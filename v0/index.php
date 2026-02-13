<?php
/**
 * Login Page
 * ICT-IMS Application v0
 */

session_start();

// Redirect if already logged in
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("Location: app/");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login | ICT IMS</title>
    
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="app/plugins/fontawesome-free/css/all.min.css">
    
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="app/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    
    <!-- Theme style -->
    <link rel="stylesheet" href="app/dist/css/adminlte.min.css">
    
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.0/dist/sweetalert2.min.css">
    
    <style>
        #login-background {
            width: 100%;
            height: 100vh;
            background-image: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 1)), url('app/dist/img/background-login-network.jpg');
            background-position: center;
            background-size: cover;
        }

        .login-logo img {
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
        }

        .login-card-body {
            border-radius: 8px;
        }
    </style>
</head>

<body class="hold-transition login-page" id="login-background">
    <div class="body-absolute">
        <?php include('app/message.php'); ?>
        
        <div class="login-box">
            <!-- Login Logo -->
            <div class="login-logo mb-2">
                <img src="app/dist/img/division.png" alt="ICT Division Logo" style="width: 100px; height: 100px;">
            </div>
            
            <!-- Application Title -->
            <div class="text-center mb-3">
                <a href="index.php" class="h1 text-white" style="text-decoration: none;"><b>ICT - IMS</b></a>
            </div>

            <!-- Login Card -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="text-center text-dark mb-2">Login to start your session</p>
                    <hr>

                    <!-- Error Messages -->
                    <?php 
                        if (isset($_GET['error']) && !empty($_GET['error'])) {
                            $error_message = htmlspecialchars($_GET['error'], ENT_QUOTES, 'UTF-8');
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <strong>Error:</strong> ' . $error_message . '
                                  </div>';
                        }
                    ?>

                    <!-- Login Form -->
                    <form action="config/verify.php" method="POST" autocomplete="off">
                        <!-- Username Input -->
                        <div class="input-group mb-3">
                            <input type="text" 
                                class="form-control" 
                                placeholder="Enter your username" 
                                name="username"
                                required
                                aria-label="Username">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>

                        <!-- Password Input -->
                        <div class="input-group mb-3">
                            <input type="password" 
                                class="form-control" 
                                placeholder="Enter your password"
                                name="password"
                                required
                                aria-label="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>

                        <!-- Login Button -->
                        <div class="input-group">
                            <button type="submit" class="btn btn-block bg-gradient-success">
                                <i class="fas fa-sign-in-alt"></i> Login
                            </button>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- Footer -->
            <div class="lockscreen-footer text-center text-white mt-3">
                <small>Copyright &copy; 2023 <b><a href="index.php" class="text-light">ICT-IMS</a></b></small><br>
                <small>Developed by <a href="http://localhost/ict-ims/dev/" class="text-light">OJT Team</a></small>
            </div>
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="app/plugins/jquery/jquery.min.js"></script>
    
    <!-- Bootstrap 4 -->
    <script src="app/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    
    <!-- AdminLTE App -->
    <script src="app/dist/js/adminlte.min.js"></script>
    
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.5.0/dist/sweetalert2.all.min.js"></script>
    
    <script>
        // Form validation and enhancement
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const usernameInput = document.querySelector('input[name="username"]');
            const passwordInput = document.querySelector('input[name="password"]');

            // Clear error message when user types
            [usernameInput, passwordInput].forEach(input => {
                input.addEventListener('focus', function() {
                    const alert = document.querySelector('.alert');
                    if (alert) {
                        alert.remove();
                    }
                });
            });

            // Form submission
            form.addEventListener('submit', function(e) {
                if (!usernameInput.value.trim() || !passwordInput.value.trim()) {
                    e.preventDefault();
                    Swal.fire({
                        icon: 'warning',
                        title: 'Validation Error',
                        text: 'Please fill in all fields'
                    });
                }
            });
        });
    </script>

</body>

</html>