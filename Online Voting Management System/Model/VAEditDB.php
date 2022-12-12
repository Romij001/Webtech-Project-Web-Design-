<?php
	
	function VAEdit($id, $fname, $lname, $address, $gender, $email) {
		$conn = mysqli_connect("localhost", "root", "", "voting_management");
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$stmt = mysqli_stmt_init($conn);
		
		mysqli_stmt_prepare($stmt, "UPDATE `votingagentss` SET FirstName = ?, LastName = ?, Address = ?, Gender = ?, email = ?, Status = 1 WHERE AgentID = ?");
		mysqli_stmt_bind_param($stmt, "sssssi", $fname, $lname, $address, $gender, $email, $id);
		mysqli_stmt_execute($stmt);
		$num =  mysqli_stmt_affected_rows($stmt);
		
		return $num;
    } 



    function agentSearch($searchtxt) {
		$conn = mysqli_connect("localhost", "root", "", "voting_management");
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}

		$stmt = mysqli_stmt_init($conn);
		
		mysqli_stmt_prepare($stmt, "SELECT * FROM `votingagentss` WHERE FirstName like ? OR LastName like ? OR Email like ?");
		$search_txt = "%" . $searchtxt . "%";
		mysqli_stmt_bind_param($stmt, "sss", $search_txt, $search_txt, $search_txt);
		mysqli_stmt_execute($stmt);
		
		$result = mysqli_stmt_get_result($stmt);

		return $result;
    }
?>