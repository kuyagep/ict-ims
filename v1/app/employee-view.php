<?php
    $idx ="";
    $idx = $_GET['id'];
    $query = mysqli_query($con,"SELECT * FROM employee WHERE employee_id='$idx'");
    //include('action/admin/edit-employee.php');
?>
<!-- Content Header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Employee Profile</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="dashboard">Home</a></li>
                    <li class="breadcrumb-item"><a href="employee">Employee</a></li>
                    <li class="breadcrumb-item active">View Profile</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- End Content Header -->

<!-- Main content -->
<?php

$view = mysqli_fetch_array($query);

    if($view['picture']==""){
        $img = "default2-1-1.jpg";
    }else{
        $img = $view['picture'];
    }
                            
?>


<section>

    <div class="container">
        <div class="card bg-light d-flex flex-fill">
            <div class="card-header text-muted border-bottom-0">
                <?php 
                     $result = mysqli_query($con,"SELECT * FROM position;");
                     $rowCount = mysqli_num_rows($result);
                     if($rowCount > 0){
                         while($row = mysqli_fetch_assoc($result)){
                            if($row['position_id'] == $view['position_id']){
                                echo $row['position_name'];
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

                            </b></h2>
                        <!-- <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover -->
                        </p>
                        <ul class="ml-4 mb-0 fa-ul text-muted">
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Office:

                                <?php 
                                $result = mysqli_query($con,"SELECT * FROM office;");
                                $rowCount = mysqli_num_rows($result);
                                if($rowCount > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        if($row['office_id'] == $view['office_id']){
                                            echo $row['office_name'];
                                        }
                                    }
                                }
                            ?>
                            </li>
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Contact #:
                                <?php echo $view['emp_contact_no']; ?>
                            </li>
                            <li class="small"><span class="fa-li"><i class="fas fa-envelope"></i></span> Email Address:
                                <?php echo $view['emp_email_add']; ?>
                            </li>
                        </ul>
                    </div>
                    <div class="col-5 text-center">
                        <img src="dist/img/users/<?php echo $img; ?>" style="width: 100px;" alt="user-avatar"
                            class="img-circle img-fluid">
                    </div>
                </div>
            </div>
            
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-outline card-red">
                    <div class="card-header">
                        <h3 class="card-title"> <i class="fa-solid fa-pen-to-square mr-2"></i> <STRONG>List of Inventory</STRONG></h3>

                        
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <table id="dataTable" class="table table-hover " width="100%"
                            cellspacing="0">
                            <thead class=" thead-dark">
                            <tr>
                                <!-- <th>Inventory No</th> -->
                                <!-- <th>Office Name</th> -->
                                <th>Item Name</th>
                                <th>Specifications</th>
                                <th>Unit Price</th>
                                <th>Serial No.</th>
                                <th>Date Acquired</th>
                                <th>Item Category</th>
                                <th>Inspected by</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php
                                $result = mysqli_query($con,"SELECT `inv_ict`.`inv_id`, `office`.`office_name`,`employee`.`employee_id`, `employee`.`firstname`, `employee`.`lastname`, 
                                `inv_ict`.`item_name`, `inv_ict`.`specs`, `inv_ict`.`price`, `inv_ict`.`serial_no`, `inv_ict`.`date_acquired`, `category`.`category_name`, 
                                `inv_ict`.`date_inspection`, `inv_ict`.`inspected_by`
                                FROM `inv_ict` left JOIN `employee` ON `employee`.`employee_id`=`inv_ict`.`employee_id` INNER JOIN `office` ON `employee`.`office_id`=`office`.`office_id` 
                                INNER JOIN category ON `category`.`category_id`=`inv_ict`.`category_id` WHERE `employee`.`employee_id` ='$idx' && deleted != 0 ORDER BY `inv_ict`.`updated_at` DESC;");
                                $count=1;
                                $rowCount = mysqli_num_rows($result);
                                if($rowCount > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                         $id=$row['inv_id'];
                                         ?>
                                <tr>
                                    
                                    <td><?php echo $row['item_name']; ?></td>
                                    <td><?php echo $row['specs']; ?></td>
                                    <td><?php echo number_format($row['price'], 2);?></td>
                                    <td><?php echo $row['serial_no']; ?></td>
                                    <td><?php echo $row['date_acquired']; ?></td>
                                    <td><span class="badge badge-primary"><?php echo $row['category_name']; ?></span></td>
                                    <td><?php echo $row['inspected_by']; ?></td>
                                    <td style='width: 100px;'>
                                    <a href="index.php?page=item_profile&&id=<?php echo $id; ?>"
                                     class=" ">
                                            <i class="fas text-info fa-solid fa-info"></i>
                                        </a>
                                        <a href="index.php?page=ict-edit&id=<?php echo $id; ?>"
                                         class=" ">
                                            <i class="fas fa-solid fa-pen text-warning ml-2"></i>
                                        </a>
                                        <a onclick="delete_item('<?php echo $id; ?>','<?php echo $idx; ?>')"
                                         class=" ">
                                            <i class="fas fa-solid fa-trash text-danger ml-2"></i></a>
                                    </td>
                                </tr>
                                <?php
                                    $count++;
                                }
                                    
                                }
                                
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
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

<script>
$('.file-upload').file_upload();

function delete_item(data_id, id) {

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
            window.location = ("action/admin/delete-employee-item.php?id=" + data_id + "&profile_id=" + id);
        }

    })


}
</script>