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
                    <li class="breadcrumb-item"><a href="inventory">Inventory</a></li>
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
            <div class="card-header text-center text-muted border-bottom-0"> Category:
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
                    <div class="col-6">
                        <h2 class="large"><b>
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
                            <li class="medium"><span class="fa-li"><i class="fas fa-lg fa-user"></i></span> End User:

                                <?php 
                                $result = mysqli_query($con,"SELECT * FROM employee where employee_id = ".$view['employee_id'].";");
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
                            <li class="medium"><span class="fa-li"><i class="fas fa-lg fa-hashtag"></i></span> Device
                                Serial: <?= $view['serial_no'] ?>
                            </li>
                            <li class="medium"><span class="fa-li"><i class="fas fa-list"></i></span> Quantity:
                                <?= $view['quantity'] ?>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 text-center">
                        <img src="dist/img/items/<?= $img ?>" style="width: 300px; height: 200px;" alt="PHOTO"
                            class="img-fluid">
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-outline card-red">
                    <div class="card-header">
                        <h3 class="card-title"> <i class="fa-solid fa-pen-to-square mr-2"></i>
                            <STRONG>Specifications:</STRONG>
                        </h3>
                        <div class="row">
                            <div class="col-lg-11 text-center">
                                <div class="form-group">

                                    <textarea class="form-control" cols="200" rows="5"
                                        disabled><?php echo $view['specs']; ?></textarea>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-12 ">
                            <h3 class="card-title"> <i class="fa-solid fa-pen-to-square mr-2"></i>
                            <STRONG>Actions:</STRONG>
                        </h3>
                                <div class="row align-item-center">
                                    <div class="col-sm-3">
                                        <a href="index.php?page=employee-view&&id=<?php 
                                            $result = mysqli_query($con,"SELECT * FROM employee;");
                                            $rowCount = mysqli_num_rows($result);
                                            if($rowCount > 0){
                                                while($row = mysqli_fetch_assoc($result)){
                                                    if($row['employee_id'] == $view['employee_id']){
                                                    echo $row['employee_id'];
                                                    }
                                                }
                                            }
                                        ?>">
                                            <button type="button" class="btn btn-info btn-block">
                                                <i class="nav-icon fas fa-user-circle"></i>
                                                <b>Go to User Profile</b>
                                            </button>
                                        </a>
                                    </div>
                                    <div class="col-sm-3">
                                        <a href="index.php?page=ict-edit&id=<?php echo $idx; ?>">
                                            <button type="button" class="btn btn-warning btn-block">
                                                <i class="fas fa-solid fa-pen"></i>
                                                <b>Edit Item</b>
                                            </button>
                                        </a>
                                    </div>
                                    <div class="col-sm-3">
                                        <a onclick="delete_item('<?php echo $idx; ?>')">
                                            <button type="button" class="btn btn-danger btn-block">
                                                <i class="fas fa-solid fa-trash"></i>
                                                <b>Delete Item</b>
                                            </button>
                                        </a>
                                    </div>
                                    <div class="col-sm-3">
                                        <form action="action/admin/remove-item-photo.php?id=<?= $idx ?>" method="post">
                                            <button type=" submit" class="btn btn-dark btn-block">
                                                <i class="fas fa-solid fa-trash"></i>
                                                <b>Remove Item Photo</b>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<script>
function delete_item(data_id) {

    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this Data!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        closeOnConfirm: false,
        closeOnCancel: false
    }).then((result) => {
        if (result.isConfirmed) {
            window.location = ("action/admin/delete-ict.php?id=" + data_id);
        }

    })


}
</script>