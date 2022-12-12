<?php 
	
	require("../Model/VAEditDB.php");

	if ($_SERVER["REQUEST_METHOD"] === "GET") {

		$key = sanitize($_GET['searchtxt']);
		$res = agentSearch($key);

		
		$arr1 = array();
		if (empty($key)) {
			echo "No agents found";
		}
		else {
			while($row = mysqli_fetch_assoc($res)) {
			  $id = $row['AgentID'];
	          $fname = $row['FirstName'];
	          $lname = $row['LastName'];
	          $gender = $row['Gender'];
	          $email = $row['Email'];
	          $address = $row['Address'];
	          $status = $row['Status'];

	          array_push($arr1, array("AgentID" => $row['AgentID'], "FirstName" => $row['FirstName'], "LastName" => $row['LastName'], "Gender" => $row['Gender'], "Email" => $row['Email'], "Address" => $row['Address'], "Status" => $row['Status']));

	          
			}
		}
	
		echo json_encode($arr1);
	}

	function sanitize($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>