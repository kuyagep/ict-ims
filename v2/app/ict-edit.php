<?php

    if(isset($_GET['id'])){
        $idx = $_GET['id'];
        $query = mysqli_query($con,"SELECT `inv_ict`.`inv_id`, `inv_ict`.`item_image`, `inv_ict`.`employee_id`, 
        `inv_ict`.`item_name`, `inv_ict`.`specs`, `inv_ict`.`price`, `inv_ict`.`serial_no`, `inv_ict`.`date_acquired`, `inv_ict`.`category_id`, 
        `inv_ict`.`date_inspection`, `inv_ict`.`inspected_by` FROM `inv_ict` WHERE inv_id=$idx");
    
        include('action/admin/edit-ict.php');
    }
    
?>