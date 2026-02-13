<?php
    $idx = $_SESSION['id'];
    $query = mysqli_query($con,"SELECT * FROM employee WHERE employee_id='$idx'");
    // Use absolute path to profile edit file
    require_once dirname(__DIR__) . '/profile/edit.php';
?>