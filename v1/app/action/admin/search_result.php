<?php
    include('../../../conf/config.php');
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $category = validate($_POST['category']);
        $office = validate($_POST['office']);
        $employee = validate($_POST['employee']);
        $search = validate($_POST['search']);

        header("location: ../../index.php?page=enhance_results&c='".$category."'&o='".$office."'&e='".$employee."'&s='".$search."'");
    }  

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }
    
?>