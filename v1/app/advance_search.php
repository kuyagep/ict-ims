<!-- Content Header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Search</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Search</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- End Content Header -->
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- <h2 class="text-center display-4">Enhanced Search</h2> -->
        <form action="enhanced-results.html">
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
                        <div class="col-6">
                            <div class="form-group">
                                <label>Result Type:</label>
                                <select class="select2 form-control" style="width: 100%;">
                                    <option>Text only</option>
                                    <option>Images</option>
                                    <option>Video</option>
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
                        <div class="col-3">
                            <div class="form-group">
                                <label>Order By:</label>
                                <select class="select2 form-control" style="width: 100%;">
                                    <option selected>Title</option>
                                    <option>Date</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group input-group-lg">
                            <input type="search" class="form-control form-control-lg"
                                placeholder="Type your keywords here" value="Lorem ipsum">
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

<!-- Select2 -->