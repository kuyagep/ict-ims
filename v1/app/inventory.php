<!-- Content Header -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Inventory</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Inventory</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- End Content Header -->

<!-- Main content -->

<section class="content">
    <div class="container-fluid">
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
                        <table id="dataTable" class="table table-hover table-responsive col-12" style="width: 100%;"
                            cellspacing="0">
                            <thead >
                            <tr>
                                <th>ITEM CLASS</th>
                                <th>OFFICE</th>
                                <th>END USER</th>
                                <th>ITEM NAME</th>
                                <th>SPECIFICATIONS</th>
                                <th>UNIT PRICE</th>
                                <th>QUANTITY</th>
                                <th>SERIAL</th>
                                <th>DATE ACQUIRED</th>
                                <th>DATE OF INSPECTION</th>
                                <th>INSPECTED BY</th>
                                <th style='width: 100px;'>ACTION</th>
                            </tr>
                            </thead>
                            <tbody>
                           
                                <?php
                                //SELECT inv_ict.particulars FROM inv_ict INNER JOIN employee ON `employee`.`office_id`=inv_ict.office_id INNER JOIN procurement_category ON procurement_category.pcategory_id=inv_ict.pcategory_id ORDER BY `inv_ict`.`updated_at` DESC;
                                $result = mysqli_query($con,"SELECT `inv_ict`.`inv_id`, `inv_ict`.`item_name`, `office`.`office_name`, `employee`.`firstname`, `employee`.`lastname`, 
                                `inv_ict`.`item_name`,`inv_ict`.`specs`, `inv_ict`.`price`, `inv_ict`.`quantity`, `inv_ict`.`serial_no`, `inv_ict`.`date_acquired`, `category`.`category_name`, 
                                `inv_ict`.`date_inspection`, `inv_ict`.`inspected_by`
                                FROM `inv_ict` left JOIN `employee` ON `employee`.`employee_id`=`inv_ict`.`employee_id` INNER JOIN `office` ON `employee`.`office_id`=`office`.`office_id` 
                                INNER JOIN category ON `category`.`category_id`=`inv_ict`.`category_id` WHERE deleted != 0  ORDER BY `inv_ict`.`inv_id` DESC;");
                                $count=1;
                                $rowCount = mysqli_num_rows($result);
                                if($rowCount > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                         $id=$row['inv_id'];
                                         ?>
                                <tr>
                                    <td style='width: 100px;'><?php echo $row['category_name']; ?></td>
                                    <td style='width: 100px;'><?php echo $row['office_name']; ?></td>
                                    <td><?php echo $row['firstname']." ".$row['lastname']; ?></td>
                                    <td><?php echo $row['item_name']; ?></td>
                                    <td><?php echo $row['specs']; ?></td>
                                    <td><?php echo number_format($row['price'], 2); ?></td>
                                    <td><?php echo $row['quantity'];?></td>
                                    <td><?php echo $row['serial_no']; ?></td>
                                    <td><?php echo $row['date_acquired']; ?></td>
                                    <td><?php echo $row['date_inspection']; ?></td>
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
                                        <a onclick="delete_item('<?php echo $id; ?>')"
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
                    </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>




        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
<!-- /.content-wrapper -->

<script src="plugins/toastr/toastr.min.js"></script>
<script src="plugins/jquery/jquery.min.js"></script>
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