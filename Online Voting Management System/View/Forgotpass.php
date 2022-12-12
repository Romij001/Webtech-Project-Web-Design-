<?php
session_start();

?>



<<!DOCTYPE html>
<html>
<head>
  <title></title>
  <script src="JS Files/ForgotPass.js"></script>
  <link rel="stylesheet" href="../CSS/Style.css">
</head>
<body>
  <div class="CP_form">

<h1>Forgot Password</h1>

<form action=" ../Controller/FPassCheck.php" method="POST" novalidate onsubmit="return isPass_valid(this);">
  <div class="text_field">
  <label for="email">Email:</label><br>
  <input type="email" id="email" name="email">
  <?php  
	$_SESSION['ispass_valid']= false;
      if(isset($_SESSION['email_error_msg'])){
      echo $_SESSION['email_error_msg'] ;
            
      if ($_SESSION['ispass_valid']) $_SESSION['email_error_msg'] = "";

    } 
  ?>
  <span id="email_error_msg" style="color:red"></span>
  <br>
  <label for="pwd">New Password:</label><br>
  <input type="Password" id="pwd" name="pwd3">
  <?php  
     if(isset($_SESSION['Password3_error_msg'])){
     echo $_SESSION['Password3_error_msg'] ;
            
     if ($_SESSION['ispass_valid']) $_SESSION['Password3_error_msg'] = "";

    } 
  ?>
  <span id="Password3_error_msg" style="color:red"></span>    
  <br>
  <label for="pwd">Confirm Password:</label><br>
  <input type="Password" id="pwd" name="pwd4">
  <?php  
     if(isset($_SESSION['Password4_error_msg'])){
     echo $_SESSION['Password4_error_msg'] ;
            
     if ($_SESSION['ispass_valid']) $_SESSION['Password4_error_msg'] = "";

    } 
  ?>
  <span id="Password4_error_msg" style="color:red"></span>   
  <br><br>
  <input type="submit" value="Submit">
  <a href="Login.php"><input type="button" value="Back"></a>
  </div>
</form>
</div>

</body>
</html>
