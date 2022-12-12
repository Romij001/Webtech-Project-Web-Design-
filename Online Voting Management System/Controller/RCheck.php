<?php  

session_start();

    require("../Model/RpageDB.php");

	if ($_SERVER['REQUEST_METHOD'] === "POST") {
		$fname =  $_POST['fname'];
        $lname =  $_POST['lname'];
        $gender=  $_POST['gender'];
        $email =  $_POST['email'];
        $pwd   =  $_POST['pwd'];
        $pwd1  = $_POST['pwd1'];

        $servername = "localhost";
		$username = "root";
		$password = "";
        

        $isvalid = true;
        
		function ContainsNumbers($String){
			return preg_match('~[0-9]~', $String);
		}

		if (empty($fname)) {
		     $_SESSION['fname_error_msg'] = "First name  is empty";
		     $_SESSION['isReg_valid'] = false ;
			     $isvalid = false;
		     header ("Location: ../View/Rpage.php");
		}
		else if (ContainsNumbers($fname)) {
		     $_SESSION['fname_error_msg'] = "Name can not be Number";
		     $_SESSION['isReg_valid'] = false ;
			     $isvalid = false;
		     header ("Location: ../View/Rpage.php");
		}
		else if(empty($lname)) {
		     $_SESSION['lname_error_msg'] = "Last name is empty";
		     $_SESSION['isReg_valid'] = false ;
			     $isvalid = false;
		     header ("Location: ../View/Rpage.php");
		}
		else if(ContainsNumbers($lname)) {
		     $_SESSION['lname_error_msg'] = "Name can not be Number";
		     $_SESSION['isReg_valid'] = false ;
			     $isvalid = false;
		     header ("Location: ../View/Rpage.php");
		}
		else if (empty($gender)) {
		     $_SESSION['gender_error_msg'] = "Gender option must be selected";
		     $_SESSION['isReg_valid'] = false ;
			     $isvalid = false;
		     header ("Location: ../View/Rpage.php");
		}
		else if(empty($email)) {
		     $_SESSION['email_error_msg'] = "Email is empty";
		     $_SESSION['isReg_valid'] = false ;
			     $isvalid = false;
		     header ("Location: ../View/Rpage.php");
		}
		else if(empty($pwd)) {
		     $_SESSION['Password_error_msg'] = "Password is empty";
		     $_SESSION['isReg_valid'] = false ;
			     $isvalid = false;
		     header ("Location: ../View/Rpage.php");
		}  

		else if(empty($pwd1)) {
		     $_SESSION['CPassword_error_msg'] = "Confirm Password is empty";
		     $_SESSION['isReg_valid'] = false ;
			     $isvalid = false;
		     header ("Location: ../View/Rpage.php");
		} 
		else  {
			$_SESSION['fname_error_msg'] = "";
			$_SESSION['lname_error_msg'] = "";
			$_SESSION['gender_error_msg'] = "";
			$_SESSION['email_error_msg'] = "";
			$_SESSION['Password_error_msg'] = "";
			$_SESSION['CPassword_error_msg'] = "";
			$_SESSION['isReg_valid'] = true ;
			$_SESSION['islogin_valid'] = true ;

			$res = Registration($fname, $lname, $gender, $email, $pwd);

			

			// $conn = mysqli_connect($servername, $username, $password, "voting_management", 3306);
			// if (!$conn) {
			//   die("Connection failed: " . mysqli_connect_error());
			// }
			// $sql = "INSERT INTO `users`(`FirstName`, `LastName`, `Gender`, `Email`, `Password`) VALUES ('$fname','$lname','$gender','$email','$pwd')";
			
			// $insert = mysqli_query($conn, $sql);
			// $rows_count = count($users);
			// $new_user = array(
			// "ID" => $rows_count + 1,
			// "FirstName" => $fname,
			// "LastName" => $lname,
			// "Gender" => $gender,
			// "Email" => $email,
			// "Password" => $pwd,
			// );
			// array_push($users,$new_user);
			
			// require("../controller/WriteFile.php");			
			
			if($res > 0) 
			{
				$_SESSION['isReg_valid'] = true;
				$_SESSION['File_error_msg'] = "";
				header('location: ../View/Login.php');
			}
			else {
                $_SESSION['isReg_valid'] = false;
				$_SESSION['File_error_msg'] = "Sorry could not register user.";
				header('location: ../View/Rpage.php');

			}
			header("Location: ../View/Login.php");
		}

}


?>