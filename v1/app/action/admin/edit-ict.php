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
                    <li class="breadcrumb-item"><a href="inventory">Inventory</a></li>
                    <li class="breadcrumb-item active">Edit Item</li>
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
                            <h3>Edit Item Profile</h3>
                        </div>
                        <div class="card-body">

                            <input type="hidden" name="id" value="<?php echo $view['inv_id']; ?>">
                            
                            <div class="form-group row">
                                <label for="input-file-now-custom-1" class="col-sm-3 col-form-label">Item Image</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control file-upload" id="customFile"
                                        name="item_image" />
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
                                            <?php echo $row['firstname'] ." ".$row['lastname']; ?>
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
                                    <input type="text" class="form-control" name="item_name" id="item_name"
                                        value=" <?php echo $view['item_name']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="specs" class="col-sm-3 col-form-label">Specifications</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="specs" placeholder="Enter Specification"
                                        id="specs" value="" rows="" cols=""><?php echo $view['specs']; ?></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="price" class="col-sm-3 col-form-label">Price</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="price" id="price"
                                        value=" <?php echo $view['price']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="serial_no" class="col-sm-3 col-form-label">Device Serial</label>
                                <div class="col-sm-9">
                                <input type="text" class="form-control" name="serial_no" id="serial_no"
                                        value=" <?php echo $view['serial_no']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="date_acquired" class="col-sm-3 col-form-label">Date Acquired</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" name="date_acquired" id="date_acquired"
                                        value=" <?php echo $view['date_acquired']; ?>" required>
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
                                <label for="date_inspection" class="col-sm-3 col-form-label">Date of Inspection</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control" name="date_inspection" id="date_inspection"
                                        value=" <?php echo $view['date_inspection'];?>" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inspected_by" class="col-sm-3 col-form-label">Inspected by</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="inspected_by"
                                        value="<?php echo $view['inspected_by']; ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="updateItem" class="btn btn-primary float-right ml-3 ">
                                <i class="fas fa-save"></i> Update Record </button>

                            <a href="inventory">
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