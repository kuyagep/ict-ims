<?php

    if(isset($_GET['id'])){
        $idx = $_GET['id'];
        $query = mysqli_query($con,"SELECT `inv_ict`.`inv_id`,`inv_ict`.`inv_no`, `office`.`office_name`, `employee`.`firstname`, `employee`.`lastname`, 
        `inv_ict`.`item_name`, `inv_ict`.`specs`, `inv_ict`.`amount`, `inv_ict`.`serial_no`, `inv_ict`.`date_acquired`, `category`.`category_name`, 
        `inv_ict`.`date_inspection`, `inv_ict`.`inspected_by` FROM `inv_ict` left JOIN `employee` ON `employee`.`employee_id`=`inv_ict`.`employee_id` 
        INNER JOIN `office` ON `employee`.`office_id`=`office`.`office_id` 
        INNER JOIN category ON `category`.`category_id`=`inv_ict`.`category_id` WHERE inv_id=$idx");
    include('action/admin/edit-ict.php');
    }
    
?>