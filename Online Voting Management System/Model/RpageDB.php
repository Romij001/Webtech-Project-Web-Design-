<?php
	
	function Registration( $fname, $lname, $gender, $email, $pwd) {
		$conn = mysqli_connect("localhost", "root", "", "voting_management");
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$stmt = mysqli_stmt_init($conn);
		mysqli_stmt_prepare($stmt, "INSERT INTO users (FirstName, LastName, Gender, Email, Password) VALUES (?, ?, ?, ?, ?)");
		mysqli_stmt_bind_param($stmt, "sssss", $fname, $lname, $gender, $email, $pwd);
		mysqli_stmt_execute($stmt);
		$res = mysqli_stmt_get_result($stmt);

		// $num = mysqli_num_rows($res);
		return $res;
	} 
?>