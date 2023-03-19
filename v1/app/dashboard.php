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
        <!-- /.row (main row) -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header p-2">
                        <div class="float-left">
                            <h4>Inventory List</h4>
                        </div>
                        <div class="float-right">
                            <button type="button" class="btn bg-gradient-success float-right" data-toggle="modal"
                                data-target="#add-purchase-order">
                                <i class="fas fa-plus mr-2"></i>
                                Add Inventory
                            </button>
                        </div>

                    </div><!-- /.card-header -->
                    <div class="card-body">


                        <!-- Content Here -->
                        <table id="dataTable" class="table table-hover table-responsive" width="100%"
                            cellspacing="0"">
                            <thead >
                            <tr>
                                <th>INVENTORY NO</th>
                                <th>OFFICE</th>
                                <th>END USER</th>
                                <th>ITEM NAME</th>
                                <th>SPECS</th>
                                <th>AMOUNT</th>
                                <th>S/N</th>
                                <th>DATE ACQUIRED</th>
                                <th>CLASSIFICATION</th>
                                <th>DATE OF INSPECTION</th>
                                <th>INSPECTED BY</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                //SELECT inv_ict.particulars FROM inv_ict INNER JOIN employee ON `employee`.`office_id`=inv_ict.office_id INNER JOIN procurement_category ON procurement_category.pcategory_id=inv_ict.pcategory_id ORDER BY `inv_ict`.`updated_at` DESC;
                                $result = mysqli_query($con,"SELECT `inv_ict`.`inv_id`,`inv_ict`.`inv_no`, `office`.`office_name`, `employee`.`firstname`, `employee`.`lastname`, 
                                `inv_ict`.`item_name`, `inv_ict`.`specs`, `inv_ict`.`amount`, `inv_ict`.`serial_no`, `inv_ict`.`date_acquired`, `category`.`category_name`, 
                                `inv_ict`.`date_inspection`, `inv_ict`.`inspected_by`
                                FROM `inv_ict` left JOIN `employee` ON `employee`.`employee_id`=`inv_ict`.`employee_id` INNER JOIN `office` ON `employee`.`office_id`=`office`.`office_id` 
                                INNER JOIN category ON `category`.`category_id`=`inv_ict`.`category_id`  ORDER BY `inv_ict`.`updated_at` DESC;");
                                $count=1;
                                $rowCount = mysqli_num_rows($result);
                                if($rowCount > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                         $id=$row['inv_id'];
                                         ?>
                                <tr>
                                    <td style='width: 100px;'><?php echo $row['inv_no']; ?></td>
                                    <td style='width: 100px;'><?php echo $row['office_name']; ?></td>
                                    <td><?php echo $row['firstname']." ".$row['lastname']; ?></td>
                                    <td><?php echo $row['item_name']; ?></td>
                                    <td><?php echo $row['specs']; ?></td>
                                    <td><?php 
                                    echo number_format($row['amount'], 2);
                                    ?></td>
                                    <td><?php echo $row['serial_no']; ?></td>
                                    <td><?php echo $row['date_acquired']; ?></td>
                                    <td><?php echo $row['category_name']; ?></td>

                                    <td><?php echo $row['date_inspection']; ?></td>
                                    <td><?php echo $row['inspected_by']; ?></td>
                                    
                                </tr>
                                <?php
                                    $count++;
                                }
                                    
                                }
                                
                            ?>
                            </tbody>
                        </table>
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>




        </div>
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