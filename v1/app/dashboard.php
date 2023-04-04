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
                        <div class="small-box bg-white callout callout-danger">
                            <div class="inner">
                                <h3>

                                    <?php
                                            $sql = "SELECT * from inv_ict";
                                            if ($result = mysqli_query($con, $sql)) {
                                                // Return the number of rows in result set
                                                $rowcount = mysqli_num_rows( $result );
                                                echo $rowcount;
                                            }
                                    ?>
                                </h3>

                                <p>Inventory</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-laptop"></i>
                            </div>
                            <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-md-3">
                        <!-- small box -->
                        <div class="small-box bg-white callout callout-warning">
                            <div class="inner">
                                <h3>
                                    <?php 
                     $result = mysqli_query($con,"SELECT * FROM inv_ict;");
                     $rowCount = mysqli_num_rows($result);
                     if($rowCount > 0){
                        $count=0;
                        $delivered=0;
                         while($row = mysqli_fetch_assoc($result)){
                            if($row['deleted'] == 1){
                                $delivered++;
                            }
                            $count++;
                         }
                    }
                    $cal =  ($delivered/$count)*100;
                    echo  number_format($cal,2).'% ';
                ?>
                                    <sup style="font-size: 20px"></sup>
                                </h3>

                                <p>Inventory Percentage</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-md-3">
                        <!-- small box -->
                        <div class="small-box bg-white callout callout-success">
                            <div class="inner">
                                <h3><?php
                                            $sql = "SELECT * from employee WHERE division_id != 0";
                                            if ($result = mysqli_query($con, $sql)) {
                                                // Return the number of rows in result set
                                                $rowcount = mysqli_num_rows( $result );
                                                echo $rowcount;
                                            }
                                    ?></h3>
                                <p>Employees</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-md-3">
                        <!-- small box -->
                        <div class="small-box  callout callout-info">
                            <div class="inner">
                                <h3>
                                    <?php
                                            $sql = "SELECT * from inv_ict";
                                            $amount = 0;
                                            if ($result = mysqli_query($con, $sql)) {
                                                // Return the number of rows in result set
                                               while($row = mysqli_fetch_assoc($result)){
                                                    $amount = $amount + $row['amount'];
                                                }
                                                echo number_format($amount,2);
                                            }
                                    ?>
                                </h3>

                                <p>Total Amount</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                        </div>
                    </div>
                    <!-- ./col -->
                </div>

                <div class="row">
                    <div class="col-md-4">

                        <div class="info-box mb-3 bg-warning">
                            <span class="info-box-icon"><i class="fas fa-solid fa-laptop"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Laptop</span>
                                <span class="info-box-number">5,200</span>
                            </div>

                        </div>

                        <div class="info-box mb-3 bg-success">
                            <span class="info-box-icon"><i class="fas fa-solid fa-tablet"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Tablet</span>
                                <span class="info-box-number">92,050</span>
                            </div>

                        </div>

                        <div class="info-box mb-3 bg-danger">
                            <span class="info-box-icon"><i class="fas fa-sharp fa-solid fa-desktop"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">PC</span>
                                <span class="info-box-number">114,381</span>
                            </div>

                        </div>

                        <div class="info-box mb-3 bg-info">
                            <span class="info-box-icon"><i class="fas fa-solid fa-clipboard"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Others</span>
                                <span class="info-box-number">163,921</span>
                            </div>

                        </div>

                    </div>
                    <div class="col-md-8">
                    <div class="card">
<div class="card-header">
<h3 class="card-title">Recently Added Inventory</h3>
<div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse">
<i class="fas fa-minus"></i>
</button>
<button type="button" class="btn btn-tool" data-card-widget="remove">
<i class="fas fa-times"></i>
</button>
</div>
</div>

<div class="card-body p-0">
<ul class="products-list product-list-in-card pl-2 pr-2">
<li class="item">
<div class="product-img">
<img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
</div>
<div class="product-info">
<a href="javascript:void(0)" class="product-title">Samsung TV
<span class="badge badge-warning float-right">$1800</span></a>
<span class="product-description">
Samsung 32" 1080p 60Hz LED Smart HDTV.
</span>
</div>
</li>

<li class="item">
<div class="product-img">
<img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
</div>
<div class="product-info">
<a href="javascript:void(0)" class="product-title">Bicycle
<span class="badge badge-info float-right">$700</span></a>
<span class="product-description">
26" Mongoose Dolomite Men's 7-speed, Navy Blue.
</span>
</div>
</li>

<li class="item">
<div class="product-img">
<img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
</div>
<div class="product-info">
<a href="javascript:void(0)" class="product-title">
Xbox One <span class="badge badge-danger float-right">
$350
</span>
</a>
<span class="product-description">
Xbox One Console Bundle with Halo Master Chief Collection.
</span>
</div>
</li>

<li class="item">
<div class="product-img">
<img src="dist/img/default-150x150.png" alt="Product Image" class="img-size-50">
</div>
<div class="product-info">
<a href="javascript:void(0)" class="product-title">PlayStation 4
<span class="badge badge-success float-right">$399</span></a>
<span class="product-description">
PlayStation 4 500GB Console (PS4)
</span>
</div>
</li>

</ul>
</div>

<div class="card-footer text-center">
<a href="javascript:void(0)" class="uppercase">View All Products</a>
</div>

</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
</section>