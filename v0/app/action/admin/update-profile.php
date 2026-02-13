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

        if (!empty($file_name)) {
           $file_temp = $_FILES['picture']['tmp_name'];
            move_uploaded_file($file_temp, '../../dist/img/users/'.$file_name); 

            $query=mysqli_query($con,"UPDATE `employee` SET 
                        `username`='".$username."',
                        `emp_contact_no`='".$contact."',`emp_email_add`='".$email."',
                        `position_id`='".$position."',`office_id`='".$office."',
                        `picture`='".$file_name."' 
                        WHERE  `employee_id`='".$id."'");
        }else{
            $query=mysqli_query($con,"UPDATE `employee` SET 
                        `username`='".$username."',
                        `emp_contact_no`='".$contact."',`emp_email_add`='".$email."',
                        `position_id`='".$position."',`office_id`='".$office."'
                        WHERE  `employee_id`='".$id."'");
        }
        
        
                        
          header("Location: ../../index.php?page=profile&&success=Profile updated successfully!");

    }
?>