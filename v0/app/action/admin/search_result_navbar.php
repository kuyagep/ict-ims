<?php
    include('../../../conf/config.php');
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $search = validate($_POST['search']);

        header("location: ../../index.php?page=enhance_results&s=$search");
    }  

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
     }
    
?>