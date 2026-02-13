<?php
    include('../../../conf/config.php');

    if(isset($_GET['id'])){
        $id=$_GET['id'];
        
        $query=mysqli_query($con,"UPDATE `inv_ict` SET `item_image`= ''  WHERE inv_id='".$id."'");
         header("Location: ../../index.php?page=inventory&&success=Item Image deleted successfully!");
        
    }

?>