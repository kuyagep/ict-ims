<!-- Content Header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Employee</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="employee">Employee</a></li>
                    <li class="breadcrumb-item active">Edit Employee</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- End Content Header -->

<!-- Main content -->
<?php
//   if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
//         header('Location: ../index.php?session=expired');
//     }
    
    //$query = mysqli_query($con,"SELECT employee.employee_id, employee.firstname, employee.middlename, employee.lastname, employee.emp_contact_no, employee.emp_email_add, position.position_name AS position, office.office_name AS office, role.role_desc AS role FROM `employee` LEFT JOIN position ON employee.position_id = position.position_id 
                              //  LEFT JOIN office ON employee.office_id = office.office_id LEFT JOIN role ON employee.role_id = role.role_id WHERE employee_id='".$idz."'");
$view = mysqli_fetch_array($query);
?>

<section>
<!-- style=" background-color: #eee; -->
    <div class="container py-3">
        <form action="action/admin/update-employee.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="">
                    <!-- Widget: user widget style 1 -->
                   
                    <!-- /.widget-user -->
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4 card-outline card-red">
                        <div class="card-header">
                            <h3>Edit Profile</h3>
                        </div>
                        <div class="card-body">

                            <!-- <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Full Name</p>
                            </div>
                            <div class="col-sm-9">
                                <p class="text-muted mb-0">Firstname Middlename Lastname</p>
                            </div>
                        </div> -->
                            <input type="hidden" name="id" value="<?php echo $view['employee_id']; ?>">
                            <div class="form-group row">
                                <label for="input-file-now-custom-1" class="col-sm-3 col-form-label">Update Photo</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control file-upload" id="customFile"
                                        name="picture" />
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="firstname" class="col-sm-3 col-form-label">Firstname</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="firstname"
                                        value="<?php echo $view['firstname']; ?>" placeholder="Firstname" required>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="middlename" class="col-sm-3 col-form-label">Middlename</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="middlename"
                                        value="<?php echo $view['middlename']; ?>" placeholder="Middlename">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="lastname" class="col-sm-3 col-form-label">Lastname</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="lastname"
                                        value="<?php echo $view['lastname']; ?>" placeholder="lastname" required>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="contact" class="col-sm-3 col-form-label">Contact No.</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="contact"
                                        value="<?php echo $view['emp_contact_no']; ?>" placeholder="Contact No.">
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="email"
                                        value="<?php echo $view['emp_email_add']; ?>" placeholder="Email Address"
                                        required>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="position" class="col-sm-3 col-form-label">Position</label>
                                <div class="col-sm-9">
                                    <select class="custom-select" id="position" name="position" required>
                                        <option value="" selected>Choose Position...
                                        </option>
                                        <?php
                                    $result = mysqli_query($con,"SELECT * FROM position;");
                                    $rowCount = mysqli_num_rows($result);
                                    if($rowCount > 0){
                                        while($row = mysqli_fetch_assoc($result)){ ?>
                                        <option value="<?php echo $row['position_id'];?>"
                                            <?php if($row['position_id'] == $view['position_id']){echo 'selected';} ?>>
                                            <?php echo $row['position_name']; ?>
                                        </option>

                                        <?php   }
                                    }
                                ?>
                                    </select>
                                </div>
                            </div>
                            
                            <hr>
                            <div class="form-group row">
                                <label for="office" class="col-sm-3 col-form-label">Office</label>
                                <div class="col-sm-9">
                                    <select class="custom-select" id="office" name="office"
                                        value="<?php echo $view['office']; ?>" required>
                                        <option selected>Choose Office...
                                        </option>
                                        <?php
                                    $result = mysqli_query($con,"SELECT * FROM office;");
                                    $rowCount = mysqli_num_rows($result);
                                    if($rowCount > 0){
                                        while($row = mysqli_fetch_assoc($result)){ ?>
                                        <option value="<?php echo $row['office_id'];?>"
                                            <?php if($row['office_id'] == $view['office_id']){echo 'selected';} ?>>
                                            <?php echo $row['office_name']; ?>
                                        </option>

                                        <?php   }
                                    }
                                ?>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="division" class="col-sm-3 col-form-label">Division</label>
                                <div class="col-sm-9">
                                    <select class="custom-select" id="divsion" name="division" required>
                                        <option value="" selected>Choose Division...
                                        </option>
                                        <?php
                                    $result = mysqli_query($con,"SELECT * FROM division;");
                                    $rowCount = mysqli_num_rows($result);
                                    if($rowCount > 0){
                                        while($row = mysqli_fetch_assoc($result)){ ?>
                                        <option value="<?php echo $row['division_id'];?>"
                                            <?php if($row['division_id'] == $view['division_id']){echo 'selected';} ?>>
                                            <?php echo $row['division_name']; ?>
                                        </option>

                                        <?php   }
                                    }
                                ?>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="role" class="col-sm-3 col-form-label">Role</label>
                                <div class="col-sm-9">
                                    <select class="custom-select" id="role" name="role"
                                        value="<?php echo $view['role']; ?>" required>
                                        <option value="" selected>Choose Role...</option>
                                        <?php
                                        $result = mysqli_query($con,"SELECT * FROM role;");
                                        $rowCount = mysqli_num_rows($result);
                                        if($rowCount > 0){
                                        while($row = mysqli_fetch_assoc($result)){ ?>
                                        <option value="<?php echo $row['role_id'];?>"
                                            <?php if($row['role_id'] == $view['role_id']){echo 'selected';} ?>>
                                            <?php echo $row['role_desc']; ?>
                                        </option>

                                        <?php   }
                                    }
                                ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="updateEmployee" class="btn btn-primary float-right ml-3 ">
                                <i class="nav-icon fas fa-user-circle"></i> Update Profile </button>
                                
                                <a href="employee">
                                <button type="button" class="btn btn-danger float-right ml-3 "> <i
                                        class="fas fa-arrow-left"></i>
                                    Return
                                </button>
                            </a>
                            <!-- <button type="button" class="btn btn-warning float-right ml-3 "> <i
                                    class="fa-solid fa-arrows-rotate mr-1"></i>
                                Reset Password
                            </button> -->
                        </div>
                    </div>

                </div>

            </div>
        </form>
    </div>
</section>
