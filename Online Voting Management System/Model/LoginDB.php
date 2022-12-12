<?php
	
	function Login($email, $password) {
		$conn = mysqli_connect("localhost", "root", "", "voting_management");
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$stmt = mysqli_stmt_init($conn);
		mysqli_stmt_prepare($stmt, "SELECT * FROM users WHERE Email = ? AND Password = ?");
		mysqli_stmt_bind_param($stmt, "ss", $email, $password);
		mysqli_stmt_execute($stmt);
		$res = mysqli_stmt_get_result($stmt);

		$num = mysqli_num_rows($res);
		if($num > 0)
		{
		$row=mysqli_fetch_array($res,MYSQLI_ASSOC);
		$userId =$row['UserID'];
		$fname = $row['FirstName'];
		$lname = $row['LastName'];
		$_SESSION['Name']=$fname." ".$lname;
		$_SESSION['Signed_in']=TRUE;
		$_SESSION['userId']= $userId;
		$_SESSION['Email']= $email;
		}
	
		return $num;
	} 
?>