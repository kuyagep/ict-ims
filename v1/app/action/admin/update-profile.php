<?php
    include('../../../conf/config.php');

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $id=$_POST['id'];
        $username=$_POST['username'];
        $contact=$_POST['contact'];
        $email=$_POST['email'];
        $position=$_POST['position'];
        //picture//
        $file_name = $_FILES['picture']['name'];
        
        $file_temp = $_FILES['picture']['tmp_name'];
        move_uploaded_file($file_temp, '../../dist/img/users/'.$file_name);
<<<<<<< Updated upstream
        $query=mysqli_query($con,"UPDATE `employee` SET `username`='".$username."', `password`='".$password."',
                         `emp_contact_no`='".$contact."',`emp_email_add`='".$email."',`position_id`='".$position."',
                         `office_id`='".$office."', `picture`='".$file_name."' WHERE  `employee_id`='".$id."'");
         header("Location: ../../profile");
=======
        $query=mysqli_query($con,"UPDATE `employee` SET `username`='".$username."',
                         `emp_contact_no`='".$contact."',`emp_email_add`='".$email."',
                         `position_id`='".$position."',`office_id`='".$office."',
                         `picture`='".$file_name."' WHERE  `employee_id`='".$id."'");
         header("Location: ../../index.php?page=profile");
>>>>>>> Stashed changes

    }
?>