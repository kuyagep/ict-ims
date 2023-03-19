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

                </div>
            </div>
            <div class="col-md-4">

            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <form action="action/admin/search_result.php" method="post">
                    <div class="row">
                        <div class="col-md-10 offset-md-1">
                            <div class="row">
                                <!-- <div class="col-6">
                                <div class="form-group">
                                    <label>Result Type:</label>
                                    <select class="form-control" multiple="multiple" data-placeholder="Any" style="width: 100%;">
                                        <option>Text only</option>
                                        <option>Images</option>
                                        <option>Video</option>
                                    </select>
                                </div>
                            </div> -->
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>Item Category:</label>
                                        <select class="select2 form-control" id="category" name="category" >
                                            <option value="" class="text-muted" selected>Choose Office...</option>
                                            <?php
                                                $result = mysqli_query($con,"SELECT * FROM category;");
                                                $rowCount = mysqli_num_rows($result);
                                                if($rowCount > 0){
                                                    while($row = mysqli_fetch_assoc($result)){ ?>
                                                            <option value="<?php echo $row['category_id']; ?>">
                                                                <?php echo $row['category_name']; ?>
                                                            </option>
                                             <?php   }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>Office:</label>
                                        <select class="select2 form-control" id="office" name="office" >
                                            <option value="" class="text-muted" selected>Choose Office...</option>
                                            <?php
                                                $result = mysqli_query($con,"SELECT * FROM office;");
                                                $rowCount = mysqli_num_rows($result);
                                                if($rowCount > 0){
                                                    while($row = mysqli_fetch_assoc($result)){ ?>
                                                            <option value="<?php echo $row['office_id']; ?>">
                                                                <?php echo $row['office_name']; ?>
                                                            </option>
                                             <?php   }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>End User:</label>
                                        <select class="select2 form-control" id="end_user" name="end_user" >
                                            <option value="" class="text-muted" selected>Choose Employee...</option>
                                            <?php
                                                $result = mysqli_query($con,"SELECT * FROM employee WHERE division_id != 0;");
                                                $rowCount = mysqli_num_rows($result);
                                                if($rowCount > 0){
                                                    while($row = mysqli_fetch_assoc($result)){ ?>
                                                            <option value="<?php echo $row['employee_id']; ?>">
                                                                <?php echo $row['firstname']." ".$row['lastname']; ?>
                                                            </option>

                                                            <?php   }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label>Sort Order:</label>
                                        <select class="select2 form-control" style="width: 100%;">
                                            <option selected>ASC</option>
                                            <option>DESC</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-lg">
                                    <input type="search" class="form-control form-control-lg"
                                        placeholder="Type your keywords here" name="search" value="">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-lg btn-default">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</section>