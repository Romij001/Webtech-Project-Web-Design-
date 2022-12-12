<?php
   session_start();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Voting Management System</title>
    <script src="JS Files/RPage.js"></script>
  <link rel="stylesheet" href="../CSS/Style.css">
</head>
<body>

<div class="registration_form">
<h1>User Registration</h1>

<form action=" ../Controller/RCheck.php" method="POST" novalidate onsubmit="return isReg_valid(this)";>
  <div class="text_field">
  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname">
  <?php
	$_SESSION['isReg_valid'] = false;
        if(isset($_SESSION['fname_error_msg'])){
        echo $_SESSION['fname_error_msg'] ;   
        if ($_SESSION['isReg_valid']) $_SESSION['fname_error_msg'] = "";

        } 
  ?>
  <span id="fname_error_msg" style="color:red"></span>
  <br>
  <label for="lname">Last name:</label><br>
  <input type="text" id="lname" name="lname">
  <?php  
        if(isset($_SESSION['lname_error_msg'])){
        echo $_SESSION['lname_error_msg'] ;
		if ($_SESSION['isReg_valid']) $_SESSION['lname_error_msg'] = "";
		} 
  ?>
  <span id="lname_error_msg" style="color:red"></span>
  <br><br>
  <label for="gender">Gender:</label><br>
  <input type="radio" id="male" name="gender" checked="true" value="male">
  <label for="male">Male</label><br>
  <input type="radio" id="female" name="gender" value="female">
  <label for="female">Female</label>
   <?php  
        if(isset($_SESSION['gender_error_msg'])){
        echo $_SESSION['gender_error_msg'] ;
		if($_SESSION['isReg_valid']) $_SESSION['gender_error_msg'] = "";
		} 
	?>
  <span id="gender_error_msg" style="color:red"></span>
  <br><br>
  <label for="email">Email:</label><br>
  <input type="email" id="email" name="email">
  <?php 
	if(isset($_SESSION['email_error_msg'])){
	echo $_SESSION['email_error_msg'] ;
	if($_SESSION['isReg_valid']) $_SESSION['email_error_msg'] = "";
	}
  ?>
  <span id="email_msg" style="color:red"></span>
  <br>
  <label for="pwd">Password:</label><br>
  <input type="password" id="pwd" name="pwd">
  <?php 
	if(isset($_SESSION['Password_error_msg'])){
	echo $_SESSION['Password_error_msg'] ;   
	//if($_SESSION['isReg_valid']) $_SESSION['Password_error_msg'] = "";
	}
  ?>
  <span id="password_msg" style="color:red"></span>  
  <br>
  <label for="pwd1">Confirm Password:</label><br>
  <input type="password" id="pwd1" name="pwd1">
  <?php
	if(isset($_SESSION['CPassword_error_msg'])){
	echo $_SESSION['CPassword_error_msg'] ;   
	//if($_SESSION['isReg_valid']) $_SESSION['CPassword_error_msg'] = "";
	}
  ?>
  <span id="Cpassword_msg" style="color:red"></span>  
  <br><br>
  <input type="submit" value="Submit">
  <a href="Login.php"><input type="button" value="Back"></a>
  </div>
  <?php  
        if(isset($_SESSION['File_error_msg'])){
        echo $_SESSION['File_error_msg'] ;
            
        if ($_SESSION['isReg_valid']) $_SESSION['File_error_msg'] = "";

    } 
  ?>  
</form>
</div>


</body>
</html>