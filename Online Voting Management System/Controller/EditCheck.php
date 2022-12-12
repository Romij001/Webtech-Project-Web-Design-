<?php  

session_start();
    require("../Model/EditCheckDB.php");

	if ($_SERVER['REQUEST_METHOD'] === "POST") {
		$id =  $_POST['id'];
		$fname =  $_POST['fname'];
        $lname =  $_POST['lname'];
        $gender=  $_POST['gender'];
        $email =  $_POST['email'];
        
		$_SESSION['isEdit_Success'] = false ;
        $isvalid = true;
        
		function ContainsNumbers($String){
			return preg_match('~[0-9]~', $String);
		}

		if (empty($fname)) {
		     $_SESSION['fname_error_msg'] = "First name  is empty";
		     $_SESSION['isEdit_Success'] = false ;
			     $isvalid = false;
		     header ("Location: ../View/EditUser.php");
		}
		else if (ContainsNumbers($fname)) {
		     $_SESSION['fname_error_msg'] = "Name can not be Number";
		     $_SESSION['isEdit_Success'] = false ;
			     $isvalid = false;
		     header ("Location: ../View/EditUser.php");
		}
		else if(empty($lname)) {
		     $_SESSION['lname_error_msg'] = "Last name is empty";
		     $_SESSION['isEdit_Success'] = false ;
			     $isvalid = false;
		     header ("Location: ../View/EditUser.php");
		}
		else if(ContainsNumbers($lname)) {
		     $_SESSION['lname_error_msg'] = "Name can not be Number";
		     $_SESSION['isEdit_Success'] = false ;
			     $isvalid = false;
		     header ("Location: ../View/EditUser.php");
		}
		else if (empty($gender)) {
		     $_SESSION['gender_error_msg'] = "Gender option must be selected";
		     $_SESSION['isEdit_Success'] = false ;
			     $isvalid = false;
		     header ("Location: ../View/EditUser.php");
		}
		else if(empty($email)) {
		     $_SESSION['email_error_msg'] = "Email is empty";
		     $_SESSION['isEdit_Success'] = false ;
			     $isvalid = false;
		     header ("Location: ../View/EditUser.php");
		}
		else  {
		     $_SESSION['fname_error_msg'] = "";
		     $_SESSION['lname_error_msg'] = "";
		     $_SESSION['gender_error_msg'] = "";
		     $_SESSION['email_error_msg'] = "";
		     $_SESSION['isEdit_Success'] = true ;

			$servername = "localhost";
			$username = "root";
			$password = "";
			
			$update = EditCheck($id, $fname, $lname, $gender, $email);
			
			if($update > 0) 
			{
				$_SESSION['isEdit_Success'] = true;
				$_SESSION['error_msg'] = "";
				header('location: ../View/Profile.php');
			}
			else{
				$_SESSION['isEdit_Success'] = false;
				$_SESSION['error_msg'] = "Sorry could not edit candidate.";
				header('location: EditUser.php');
			}
		}
	}


?>