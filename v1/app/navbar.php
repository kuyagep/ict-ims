        <nav class="main-header navbar fixed navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline" method="post" action="action/admin/search_result_navbar.php">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" name="search" type="search" placeholder="Search"
                                    aria-label="Search">
                                    <div class="input-group-append">
                                        <button class="btn btn-navbar" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                        <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                            </div>
                        </form>
                    </div>
                </li>
                <li class="nav-item">
                    <button class="nav-link btn" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt"></i> <strong>Logout</strong></button>
                </li>
            </ul>
        </nav>