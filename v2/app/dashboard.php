<!-- Content Header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- End Content Header -->
<section class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3">
                        <!-- small box -->
                        <div class="small-box info-box mb-3 bg-warning">
                            <div class="inner">
                                <h3>

                                    <?php
                                            $sql = "SELECT * from inv_ict WHERE category_id = 5";
                                            $quantity = 0;
                                            if ($result = mysqli_query($con, $sql)) {
                                                // Return the number of rows in result set
                                                while($row = mysqli_fetch_assoc($result)){
                                                    $quantity = $quantity + $row['quantity'];
                                                }
                                                echo $quantity;
                                            }
                                    ?>
                                </h3>

                                <p>PC</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-sharp fa-solid fa-desktop"></i>
                            </div>
                            <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-md-3">
                        <!-- small box -->
                        <div class="small-box info-box mb-3 bg-success">
                            <div class="inner">
                                <h3> 
                      <?php
                      $sql = "SELECT * from inv_ict WHERE category_id = 7";
                      $quantity = 0;
                      if ($result = mysqli_query($con, $sql)) {
                          // Return the number of rows in result set
                          while($row = mysqli_fetch_assoc($result)){
                              $quantity = $quantity + $row['quantity'];
                          }
                          echo $quantity;
                      }
              ?>
                                    <sup style="font-size: 20px"></sup>
                                </h3>

                                <p>Laptop</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-laptop"></i>
                            </div>
                            <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-md-3">
                        <!-- small box -->
                        <div class="small-box info-box mb-3 bg-danger">
                            <div class="inner">
                                <h3> <?php
                                            $sql = "SELECT * from inv_ict WHERE category_id = 6";
                                            $quantity = 0;
                                            if ($result = mysqli_query($con, $sql)) {
                                                // Return the number of rows in result set
                                                while($row = mysqli_fetch_assoc($result)){
                                                    $quantity = $quantity + $row['quantity'];
                                                }
                                                echo $quantity;
                                            }
                                    ?></h3>
                                <p>Tablet</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-sharp fa-solid fa-tablet"></i>
                            </div>
                            <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-md-3">
                        <!-- small box -->
                        <div class="small-box  info-box mb-3 bg-info">
                            <div class="inner">
                                <h3>
                                <?php
                                            $sql = "SELECT * from inv_ict WHERE category_id = 8";
                                            $quantity = 0;
                                            if ($result = mysqli_query($con, $sql)) {
                                                // Return the number of rows in result set
                                                while($row = mysqli_fetch_assoc($result)){
                                                    $quantity = $quantity + $row['quantity'];
                                                }
                                                echo $quantity;
                                            }
                                    ?>
                                </h3>

                                <p>Others</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-clipboard"></i>
                            </div>
                            <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                        </div>
                    </div>
                    <!-- ./col -->
                </div>


            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
</section>