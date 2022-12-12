<?php
	
	function CPassword($pwd, $pwd1, $userId) {
		$conn = mysqli_connect("localhost", "root", "", "voting_management");
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$stmt = mysqli_stmt_init($conn);
		mysqli_stmt_prepare($stmt, "SELECT * FROM `users` WHERE UserID = ? AND Password = ? ");
		mysqli_stmt_bind_param($stmt, "ss", $userId, $pwd);
		mysqli_stmt_execute($stmt);
		$res = mysqli_stmt_get_result($stmt);

		$exist = mysqli_num_rows($res);
		$num = 0;
		if($exist > 0){
			mysqli_stmt_prepare($stmt, "UPDATE `users` SET Password = ? WHERE UserID = ? ");
			mysqli_stmt_bind_param($stmt, "ss", $pwd1, $userId);
			mysqli_stmt_execute($stmt);
			$num =  mysqli_stmt_affected_rows($stmt);
		}
		return $num;
    } 
?>