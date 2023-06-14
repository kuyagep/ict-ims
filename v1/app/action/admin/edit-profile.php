<!-- Content Header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">My Profile</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">My Profile</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- End Content Header -->
<!-- Main content -->
                <div class="col-lg-8">
                    <div class="card mb-4 card-outline card-red">
                        <div class="card-header">
                            <h3>Edit Profile</h3>
                        </div>
                        <div class="card-body">

                            <input type="hidden" name="id" value="<?php echo $view['employee_id']; ?>">
                            <div class="form-group row">
                                <label for="input-file-now-custom-1" class="col-sm-3 col-form-label">Upload
                                    Profile</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control file-upload" id="customFile"
                                        name="picture" />
                                </div>
                            </div>
                            <hr>
                            <div class="form-group row">
                                <label for="username" class="col-sm-3 col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="username"
                                        value="<?php echo $view['username']; ?>" placeholder="Username" required>
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
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0"><b>Role</b></p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0"><?php
                                        $result = mysqli_query($con,"SELECT * FROM role;");
                                        $rowCount = mysqli_num_rows($result);
                                        if($rowCount > 0){
                                        while($row = mysqli_fetch_assoc($result)){ 
                                            if($row['role_id'] == $view['role_id']){echo $row['role_desc'];}
                                            ?>

                                        <?php   }
                                    }
                                ?></p>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </form>
    </div>
</section>