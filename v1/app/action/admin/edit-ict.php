<!-- Content Header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Inventory</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="issued-items">Inventory</a></li>
                    <li class="breadcrumb-item active">View</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- End Content Header -->

<!-- Main content -->
<?php

$view = mysqli_fetch_array($query);
?>

<section>
    <div class="container py-3">
        <form action="action/admin/update-ict.php" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-8">
                    <div class="card mb-4 card-outline card-red">
                        <div class="card-header">
                            <h3>Edit Inventory</h3>
                        </div>
                        <div class="card-body">

                            <input type="hidden" name="id" value="<?php echo $view['inv_id']; ?>">
                            <div class="form-group row">
                                <label for="inv_no" class="col-sm-3 col-form-label">Inv. No.</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="inv_no" id="inv_no"
                                        value="<?php echo $view['inv_no']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="end_user" class="col-sm-3 col-form-label">End User</label>
                                <div class="col-sm-9">
                                    <select class="custom-select" id="end_user" name="end_user" required>
                                        <option selected>Choose Employee...
                                        </option>
                                        <?php
                                    $result = mysqli_query($con,"SELECT * FROM employee;");
                                    $rowCount = mysqli_num_rows($result);
                                    if($rowCount > 0){
                                        while($row = mysqli_fetch_assoc($result)){ ?>
                                        <option value="<?php echo $row['employee_id'];?>"
                                            <?php if($row['employee_id'] == $view['employee_id']){echo 'selected';} ?>>
                                            <?php echo $row['employee_name']; ?>
                                        </option>

                                        <?php   }
                                    }
                                ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="item_name" class="col-sm-3 col-form-label">Item Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="item_name" id="item_name""
                                        value=" <?php echo $view['item_name']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="specs" class="col-sm-3 col-form-label">Specs</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="specs" placeholder="Enter Specification"
                                        id="specs" value="" rows="" cols=""><?php echo $view['specs']; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="amount" class="col-sm-3 col-form-label">Amount</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="amount" id="amount""
                                        value=" <?php echo $view['amount']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="serial_no" class="col-sm-3 col-form-label">S/N</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="amoserial_nount" id="serial_no""
                                        value=" <?php echo $view['serial_no']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="date_acquired" class="col-sm-3 col-form-label">Date Acquired</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" name="date_acquired" id="date_acquired""
                                        value=" <?php echo $view['date_acquired']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="category" class="col-sm-3 col-form-label">Classification</label>
                                <div class="col-sm-9">
                                    <select class="custom-select" id="category" name="category" required>
                                        <option selected>Choose Classification...
                                        </option>
                                        <?php
                                        $result = mysqli_query($con,"SELECT * FROM category;");
                                        $rowCount = mysqli_num_rows($result);
                                        if($rowCount > 0){
                                        while($row = mysqli_fetch_assoc($result)){ ?>
                                        <option value="<?php echo $row['category_id'];?>"
                                            <?php if($row['category_id'] == $view['category_id']){echo 'selected';} ?>>
                                            <?php echo $row['category_name']; ?>
                                        </option>

                                        <?php   }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="particulars" class="col-sm-3 col-form-label">Particulars</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="particulars" placeholder="Enter Description"
                                        id="particulars" value="" rows=""
                                        cols=""><?php echo $view['particulars']; ?></textarea>

                                </div>
                            </div>
                            <!-- <div class="form-group row">
                                <label for="pr" class="col-sm-3 col-form-label">Particulars</label>
                                <div class="col-sm-9">
                                    <input style="height: 100px;" type="text" class="form-control align-items-lg-end" name="pr"
                                        value="<?php //cho $view['particulars']; ?>">
                                </div>
                            </div> -->
                            <div class="form-group row">
                                <label for="amount" class="col-sm-3 col-form-label">Amount</label>
                                <div class="col-sm-9">
                                    <input type="number" step=any class="form-control" name="amount"
                                        value="<?php echo $view['amount']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="src_fund" class="col-sm-3 col-form-label">Source of Fund</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="src_fund"
                                        value="<?php echo $view['src_fund']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="end_user" class="col-sm-3 col-form-label">End User </label>
                                <div class="col-sm-9">
                                    <select class="custom-select" id="end_user" name="end_user" required>
                                        <option selected>Choose End User...
                                        </option>
                                        <?php
                                            $result = mysqli_query($con,"SELECT * FROM employee;");
                                            $rowCount = mysqli_num_rows($result);
                                            if($rowCount > 0){
                                                while($row = mysqli_fetch_assoc($result)){ ?>
                                        <option value="<?php echo $row['employee_id'];?>"
                                            <?php if($row['employee_id'] == $view['employee_id']){echo 'selected';} ?>>
                                            <?php echo $row['firstname']."".$row['lastname']; ?>
                                        </option>
                                        <?php   }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="status" class="col-sm-3 col-form-label">Status </label>
                                <div class="col-sm-9">
                                    <select class="custom-select" id="status" name="status" required>
                                        <option selected>Choose Status...
                                        </option>
                                        <?php
                                            $result = mysqli_query($con,"SELECT * FROM po_status;");
                                            $rowCount = mysqli_num_rows($result);
                                            if($rowCount > 0){
                                                while($row = mysqli_fetch_assoc($result)){ ?>
                                        <option value="<?php echo $row['pstatus_id'];?>"
                                            <?php if($row['pstatus_id'] == $view['pstatus_id']){echo 'selected';} ?>>
                                            <?php echo $row['pstatus_name']; ?>
                                        </option>
                                        <?php   }
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="remarks" class="col-sm-3 col-form-label">Remarks</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="remarks" placeholder="Enter Description"
                                        id="remarks" value="" rows="" cols=""><?php echo $view['remarks']; ?></textarea>

                                </div>
                            </div>



                        </div>
                        <div class="card-footer">
                            <button type="submit" name="updateItem" class="btn btn-primary float-right ml-3 ">
                                <i class="fas fa-save"></i> Update Record </button>

                            <a href="pmr">
                                <button type="button" class="btn btn-danger float-right ml-3 "> <i
                                        class="fas fa-arrow-left"></i>
                                    Return
                                </button>
                            </a>


                        </div>
                    </div>


                </div>

                <div class="col-lg-4">
                    <!-- Application buttons -->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Action Section</h3>
                        </div>
                        <div class="card-body">
                            <p>Quick Access</p>
                            <a class="btn btn-app" data-toggle="modal" data-target="#issuance">
                                <i class="fas fa-share-square"></i> Issue Item
                            </a>
                            <a class="btn btn-app" data-toggle="modal" data-target="#employee">
                                <i class="fas fa-undo-alt"></i> Add Employee
                            </a>
                            <a class="btn btn-app" data-toggle="modal" data-target="#addItems">
                                <i class="fas fa-edit"></i> Add Item
                            </a>

                            <p>Quick Access</p>
                            <a class="btn btn-app bg-secondary">
                                <span class="badge bg-warning">New</span>
                                <i class="fas fa-database"></i> Backup DB
                            </a>
                            <a class="btn btn-app bg-purple">
                                <span class="badge bg-success">300</span>
                                <i class="fas fa-barcode"></i> Items
                            </a>
                            <a class="btn btn-app bg-success">
                                <span class="badge bg-purple">891</span>
                                <i class="fas fa-users"></i> Users
                            </a>
                            <a class="btn btn-app bg-danger">
                                <span class="badge bg-teal">67</span>
                                <i class="fas fa-inbox"></i> Issuance
                            </a>
                            <a class="btn btn-app bg-warning">
                                <span class="badge bg-info">12</span>
                                <i class="fas fa-envelope"></i> Inbox
                            </a>
                            <a class="btn btn-app bg-info">
                                <span class="badge bg-danger">531</span>
                                <i class="fas fa-heart"></i> Likes
                            </a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- /.content -->
<!-- /.content-wrapper -->

<script>
$('.file-upload').file_upload();

function delete_employee(data_id) {
    //alert('ok');
    // window.location = ("action/admin/delete-employee.php?id=" + data_id);
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this Data!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {

            window.location = ("action/admin/delete-employee.php?id=" + data_id);
            // Swal.fire(
            //             'Deleted!',
            //             'The data has been deleted.',
            //             'success'
            // )
        }

    })
}
</script>