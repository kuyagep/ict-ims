<!-- Content Header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Category</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="category">Category</a></li>
                    <li class="breadcrumb-item active">Edit Category</li>
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
    <div class=" container py-5">
    <form action="action/admin/update-category.php" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4 card-outline card-red">
                    <div class="card-header">
                        <h3>Edit Category</h3>
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
                        <input type="hidden" name="id" value="<?php echo $view['category_id']; ?>">

                        <div class="form-group row">
                            <label for="category" class="col-sm-3 col-form-label">Category</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="category"
                                    value="<?php echo $view['category_name']; ?>" placeholder="Category" required>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" name="updateCategory" class="btn btn-primary float-right ml-3 ">
                            <i class="fa-regular fa-floppy-disk mr-1"></i> Update </button>
                        <a href="category">
                            <button type="button" class="btn btn-danger float-right ml-3 "> <i
                                    class="fa-solid fa-arrows-rotate mr-1"></i>
                                Back
                            </button>
                        </a>
                    </div>
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

            window.location = ("action/admin/delete-category.php?id=" + data_id);
            // Swal.fire(
            //             'Deleted!',
            //             'The data has been deleted.',
            //             'success'
            // )
        }

    })
}
</script>