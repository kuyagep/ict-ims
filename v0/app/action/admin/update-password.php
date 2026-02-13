<?php
    include('../../../conf/config.php');

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $id=$_POST['id'];
        $password=$_POST['password'];
        $confirm_password=$_POST['confirm_password'];
        
        if (empty($id) && empty($password) && empty($confirm_password)) {
          header("Location: ../../index.php?page=profile&&error=All fields are required.");
        }

        if ($password != $confirm_password) {
           header("Location: ../../index.php?page=profile&&error=Password not Matched!");
        }

        $password = password_hash($password, PASSWORD_DEFAULT);
        
        $query=mysqli_query($con,"UPDATE `employee` SET 
        `password`='".$password."' ");
         header("Location: ../../index.php?page=profile&&success=Password updated successfully!");

    }
?>