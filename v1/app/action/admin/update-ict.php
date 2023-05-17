<?php 
include('../../../conf/config.php');

    if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = validate($_POST["id"]);
    $end_user = validate($_POST["end_user"]);
    $item_name = validate($_POST["item_name"]);
    $specs = validate($_POST["specs"]);
    $price = validate($_POST["price"]);
    $serial_no = validate($_POST["serial_no"]);
    $date_acquired = validate($_POST["date_acquired"]);
    $category = validate($_POST["category"]);
    $date_inspection = validate($_POST["date_inspection"]);
    $inspected_by = validate($_POST["inspected_by"]);
    $file_name = $_FILES['item_image']['name'];

    $file_temp = $_FILES['item_image']['tmp_name'];
    move_uploaded_file($file_temp, '../../dist/img/items/'.$file_name);

    $query=mysqli_query($con,"UPDATE `inv_ict` SET 
    `inv_id`='".$id."',
    `employee_id`='".$end_user."',
    `item_name`='".$item_name."',
    `specs`='".$specs."',
    `price`='".$price."',
    `serial_no`='".$serial_no."',
    `date_acquired`='".$date_acquired."',
    `category_id`='".$category."',
    `date_inspection`='".$date_inspection."', 
    `inspected_by`='".$inspected_by."',
    `picture`='".$file_name."
    `WHERE  `inv_id`='".$id."'");
    header("Location: ../../index.php?page=inventory");
    }

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>