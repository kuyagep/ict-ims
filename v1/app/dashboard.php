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
            
            <!-- /.col (left) -->

            <!-- /.col (right) -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <!-- small box -->
                        <div class="small-box bg-white callout callout-danger">
                            <div class="inner">
                                <h3>

                                    <?php
                                            $sql = "SELECT * from pmr_table";
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
                                <i class="ion ion-bag"></i>
                            </div>
                            <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-md-6">
                        <!-- small box -->
                        <div class="small-box bg-white callout callout-warning">
                            <div class="inner">
                                <h3>
                                    <?php 
                     $result = mysqli_query($con,"SELECT * FROM pmr_table;");
                     $rowCount = mysqli_num_rows($result);
                     if($rowCount > 0){
                        $count=0;
                        $delivered=0;
                         while($row = mysqli_fetch_assoc($result)){
                            if($row['pstatus_id'] == 1){
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

                                <p>Delivered</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                        </div>
                    </div>
                    <!-- ./col -->
                </div>

                <div class="row">
                    <div class="col-md-6">
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
                                <i class="ion ion-person-add"></i>
                            </div>
                            <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-md-6">
                        <!-- small box -->
                        <div class="small-box  callout callout-info">
                            <div class="inner">
                                <h3>
                                    <?php
                                            $sql = "SELECT * from pmr_table";
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
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
            </div>
            <div class="col-md-4">

            </div>
        </div>
        <!-- /.row (main row) -->
    </div>
    <!-- /.container-fluid -->
</section>
<div class="modal fade" id="employee">
    <div class="modal-dialog">
        <div class="modal-content">
            <form class="form-horizontal" action="action/admin/add-employee.php" method="POST">
                <div class="modal-header">
                    <h4 class="modal-title">Create Employee Account</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <!-- form -->
                    <div class="form-group row">
                        <label for="firstname" class="col-sm-3 col-form-label">Firstname <span class="text-danger">
                                *</span> </label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="firstname" name="firstname"
                                placeholder="Firstname" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="middlename" class="col-sm-3 col-form-label">M.N.</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="middlename" name="middlename"
                                placeholder="Middlename">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lastname" class="col-sm-3 col-form-label">Lastname <span class="text-danger">
                                *</span></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Lastname"
                                required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="contact_no" class="col-sm-3 col-form-label">Contact</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="contact_no" name="contact_no"
                                placeholder="Contact No">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Email <span class="text-danger">
                                *</span></label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="position" class="col-sm-3 col-form-label">Position <span class="text-danger">
                                *</span></label>
                        <div class="col-sm-9">
                            <select class="custom-select" id="position" name="position" required>
                                <option value="" selected>Choose Position...</option>
                                <?php
                                    $result = mysqli_query($con,"SELECT * FROM position;");
                                    $rowCount = mysqli_num_rows($result);
                                    if($rowCount > 0){
                                        while($row = mysqli_fetch_assoc($result)){ ?>
                                <option value="<?php echo $row['position_id']; ?>">
                                    <?php echo $row['position_name']; ?>
                                </option>

                                <?php   }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="office" class="col-sm-3 col-form-label">Office <span class="text-danger">
                                *</span></label>
                        <div class="col-sm-9">
                            <select class="custom-select" id="office" name="office" required>
                                <option value="" selected>Choose Office...</option>
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
                    <div class="form-group row">
                        <label for="role" class="col-sm-3 col-form-label">Role <span class="text-danger">
                                *</span></label>
                        <div class="col-sm-9">
                            <select class="custom-select" id="role" name="role" required>
                                <option value="" selected>Choose Role...</option>
                                <?php
                                    $result = mysqli_query($con,"SELECT * FROM role;");
                                    $rowCount = mysqli_num_rows($result);
                                    if($rowCount > 0){
                                        while($row = mysqli_fetch_assoc($result)){ ?>
                                <option value="<?php echo $row['role_id']; ?>">
                                    <?php echo $row['role_desc']; ?>
                                </option>

                                <?php   }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>


                </div>
                <div class="modal-footer justify-content-right">
                    <button type="button" class="btn btn-danger " data-dismiss="modal">Cancel</button>
                    <button type="submit" name="add-employee" class="btn btn-primary addEmployeeAlert">Create</button>
                </div>

            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>