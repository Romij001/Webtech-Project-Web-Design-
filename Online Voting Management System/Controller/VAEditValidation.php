<?php
session_start();

require("../Model/VAEditDB.php");
if($_POST){
	$id =$_POST['id'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$address=$_POST['address'];
	$gender=$_POST['gender'];
	$status=$_POST['status'];
	$email=$_POST['email'];
	$servername = "localhost";
	$username = "root";
	$password = "";

	function ContainsNumbers($String){
	return preg_match('~[0-9]~', $String);
	}
	function ContainsEmailSymbol($String){
	return preg_match('~[.@]~', $String);
	}
	function ContainsPassSymbol($String){ 
	return preg_match('~[_%$#@]~', $String); 
	}
	function ContainsSmallLetters($String){
	return preg_match('~[a-z]~', $String);
	}
	function ContainsCapitalLetters($String){
	return preg_match('~[A-Z]~', $String);
	}
	function IsValid($fn,$ln,$e,$p1,$p2){
		$isValid = false;
		$error_msg = "";
		if (ContainsNumbers($fn)){
			$error_msg = "Sorry, your first name cannot contain any number<br />" ;
		}
		if (ContainsNumbers($ln)){
			$error_msg = "Sorry, your last name cannot contain any number<br />"; 
		}
		if(!(ContainsEmailSymbol($e))){
			$error_msg = "Invalid email ID<br />";
		}
		else $isValid = true;
		
		$_SESSION['error_msg'] = $error_msg;
		$_SESSION['isReg_Success'] = $isValid;
		return $isValid;	
	}
	
	$update = VAEdit($id, $fname, $lname, $address, $gender, $email);
	// $conn = mysqli_connect($servername, $username, $password, "voting_management", 3306);
	// if (!$conn) {
	//   die("Connection failed: " . mysqli_connect_error());
	// }
	// $sql = "UPDATE `votingagentss` SET `FirstName`='$fname',`LastName`='$lname',`Address`='$address',`Gender`='$gender',`Email`='$email',`Status`='$status' WHERE `AgentID` = '$id'";
	// echo $sql;
	// $update = mysqli_query($conn, $sql);
	
	if ($update > 0)
	{
		$_SESSION['isEdit_Success'] = true;
		$_SESSION['error_msg'] = "";
		//fclose($file);
		header('location: ../View/VotingAgents.php');
	}
	else{
		$_SESSION['isEdit_Success'] = false;
		$_SESSION['error_msg'] = "Sorry could not edit voting agent.";
		//fclose($file);
		header('location: ../View/VAEdit.php');
	}
}
?>