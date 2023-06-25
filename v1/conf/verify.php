<?php 

session_start(); 
include "config.php";

if (isset($_POST['email']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$username = $_POST['username'];
	$pass = $_POST['password'];
    if(empty($email) && empty($pass)){
        header("location: ../index.php?error=Username and Password is required");
	    exit();
    }
	if (empty($email)) {
        header("location: ../index.php?error=Username is required");
	    exit();
	}else if(empty($pass)){
        header("location: ../index.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM employee WHERE username='$username'";

		$result = mysqli_query($con, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if($row['username'] === $username){
                if (password_verify($pass, $row['password']) ) {
            	$_SESSION['username'] = $row['username'];
            	$_SESSION["loggedin"] = true;
				$_SESSION["id"] = $row['employee_id'];
				$_SESSION["session_picture"] = $row['picture'];
                $_SESSION["firstname"] = $row['firstname']; 
                $_SESSION["lastname"] = $row['lastname']; 
                $_SESSION["role_id"] = $row['role_id']; 
                $_SESSION["email"] = $row['emp_email_add']; 

                                    
                 header("location: ../app/dashboard");

				 if($_SESSION['role_id'] == '1'){
					header("location: ../app/dashboard");
				}elseif($_SESSION['role_id'] == '2'){
					header("location: ../app/dashboard");
				}elseif($_SESSION['role_id'] == '3'){
					header("location: ../app/self-inventory");
				} 
		        exit();
            }else{
				header("Location: ../index.php?error=Incorrect password");
		        exit();
			}
            }else{
                header("Location: ../index.php?error=Incorrect Email Address");
		        exit();
            }
            
		}else{
			header("Location: ../index.php?error=Email Address not Exist.");
	        exit();
		}
	}
	
}else{
	header("Location: ../index.php?error=Email Address/Password is Required");
	exit();
}