<?php
    include('../../../conf/config.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $inv_no = validate($_POST["inv_no"]);
        $end_user = validate($_POST["end_user"]);
        $item_name = validate($_POST["item_name"]);
        $specs = validate($_POST["specs"]);
        $amount = validate($_POST["amount"]);
        $serial_no = validate($_POST["serial_no"]);
        $date_acquired = validate($_POST["date_acquired"]);
        $category = validate($_POST["category"]);
        $date_inspection = validate($_POST["date_inspection"]);
        $inspected_by = validate($_POST["inspected_by"]);



        $query=mysqli_query($con,"INSERT INTO `inv_ict`(`inv_no`, `employee_id`, `item_name`, `	specs`, `amount`, `serial_no`, `date_acquired`, `category_id`, `date_inspection`, `inspected_by`) 
                                  VALUES ('".$inv_no."','".$end_user."','".$item_name."','".$specs."','".$amount."','".$serial_no."','".$date_acquired."','".$category."','".$date_inspection."','".$inspected_by."')" );
   
        header("location: ../../index.php?page=inventory&d=1");
      }
      
      function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
?>