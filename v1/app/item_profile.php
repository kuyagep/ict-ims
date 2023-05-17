<?php
    $idx ="";
    $idx = $_GET['id'];
    $query = mysqli_query($con,"SELECT * FROM inv_ict WHERE inv_id='$idx'");
    //include('action/admin/edit-employee.php');
?>
<!-- Content Header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Item Profile</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="employee">Inventory</a></li>
                    <li class="breadcrumb-item active">View Item</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- End Content Header -->

<!-- Main content -->
<?php

$view = mysqli_fetch_array($query);

    if($view['item_image']==""){
        $img = "default-150x150.png";
    }else{
        $img = $view['item_image'];
    }
                            
?>


<section>

    <div class="container">
        <div class="card bg-light d-flex flex-fill">
            <div class="card-header text-muted border-bottom-0">
                <?php 
                     $result = mysqli_query($con,"SELECT * FROM category;");
                     $rowCount = mysqli_num_rows($result);
                     if($rowCount > 0){
                         while($row = mysqli_fetch_assoc($result)){
                            if($row['category_id'] == $view['category_id']){
                                echo $row['category_name'];
                            }
                         }
                    }
                ?>
            </div>
            <div class="card-body pt-0">
                <div class="row">
                    <div class="col-7">
                        <h2 class="lead"><b>
                                <?php 
                     $result = mysqli_query($con,"SELECT * FROM inv_ict;");
                     $rowCount = mysqli_num_rows($result);
                     if($rowCount > 0){
                         while($row = mysqli_fetch_assoc($result)){
                            if($row['inv_id'] == $view['inv_id']){
                                echo $row['item_name'];
                            }
                         }
                    }
                ?>

                            </b></h2>
                        <!-- <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover -->
                        </p>
                        <ul class="ml-4 mb-0 fa-ul text-muted">
                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-user"></i></span> End User:

                                <?php 
                                $result = mysqli_query($con,"SELECT * FROM employee;");
                                $rowCount = mysqli_num_rows($result);
                                if($rowCount > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        if($row['employee_id'] == $view['employee_id']){
                                        echo $row['firstname'] ." ".$row['lastname'];
                                        }
                                    }
                                }
                            ?>
                            </li>
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-hashtag"></i></span> Device Serial:
                                <?php echo $view['serial_no']; ?>
                            </li>
                            <li class="small"><span class="fa-li"><i class="fas fa-wrench"></i></span> Specifications:
                                <?php echo $view['specs']; ?>
                            </li>
                            <li class="small"><span class="fa-li"><i class="fas fa-list"></i></span> Quantity:
                                <?php echo $view['quantity']; ?>
                            </li>
                        </ul>
                    </div>
                    <div class="col-4 text-right">
                        <img src="dist/img/items/<?php echo $img; ?>" style="width: 150px;" alt="user-avatar"
                            class="img-fluid">
                    </div>
                </div>
            </div>
            
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-outline card-red">
                    <div class="card-header">
                        <h3 class="card-title"> <i class="fa-solid fa-pen-to-square mr-2"></i> <STRONG>ACTIONS:</STRONG></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<section class="content">
    <div class="container-fluid">

    </div>
</section>
</div>
</section>
<!-- /.content -->

<!-- /.content-wrapper -->

<!-- <script>
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
</script> -->