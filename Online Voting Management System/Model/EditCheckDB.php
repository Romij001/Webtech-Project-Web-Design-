<?php
	
	function EditCheck($id, $fname, $lname, $gender, $email) {
		$conn = mysqli_connect("localhost", "root", "", "voting_management");
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$stmt = mysqli_stmt_init($conn);
		
		mysqli_stmt_prepare($stmt, "UPDATE `users` SET FirstName = ?, LastName = ?,  Gender = ?, email = ? WHERE UserID = ?");
		mysqli_stmt_bind_param($stmt, "ssssi", $fname, $lname, $gender, $email, $id);
		mysqli_stmt_execute($stmt);
		$num =  mysqli_stmt_affected_rows($stmt);
		
		return $num;
    } 
?>