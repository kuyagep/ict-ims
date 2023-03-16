<?php
    include('../../../conf/config.php');

    if(isset($_GET['id'])){
        $id=$_GET['id'];

        //$query=mysqli_query($con,"DELETE FROM pmr_table WHERE pmr_id='".$id."'");
        $query=mysqli_query($con,"UPDATE `inv_ict` SET `deleted`= 0  WHERE inv_id='".$id."'");
        header("location: ../../index.php?page=inventory&d-1");
    }

?>