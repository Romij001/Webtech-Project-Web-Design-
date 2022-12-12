<?php
   session_start();
   require("../Model/EditUserDB.php");
?>


<!DOCTYPE html>
<html>
<head>
    <title>Voting Management System</title>
    <script src="JS Files/EditUser.js"></script>
  <link rel="stylesheet" href="../CSS/Style.css">
</head>
<body>

<div class="registration_form">
<h1>Edit User</h1>

<form action=" ../Controller/EditCheck.php" method="POST" novalidate onsubmit="return isEditUser_valid(this)" >
  <?php
	
	$_SESSION['isEdit_Success'] = false;
	$id=$_SESSION['userId'];
  
  $Edit = EditUser($id) ;
  $rows_count = mysqli_num_rows($Edit);
  if ($rows_count > 0) {
      $row=mysqli_fetch_array($Edit,MYSQLI_ASSOC);
      $userId =$row['UserID'];
      $fname = $row['FirstName'];
      $lname = $row['LastName'];
      $gender = $row['Gender'];
      $email = $row['Email'];
  }
  ?>

  <input type="hidden" name="id" value="<?php echo $id ?>" />
  <div class="text_field">
  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname" value="<?php echo $fname ?>">
  <?php  
        if(isset($_SESSION['fname_error_msg'])){
        echo $_SESSION['fname_error_msg'] ;
		if($_SESSION['isEdit_Success']) $_SESSION['fname_error_msg'] = "";
        } 
  ?>
  <span id="fname_error_msg" style="color:red"></span>
  <br>
  <label for="lname">Last name:</label><br>
  <input type="text" id="lname" name="lname" value="<?php echo $lname ?>">
  <?php  
        if(isset($_SESSION['lname_error_msg'])){
        echo $_SESSION['lname_error_msg'] ;
		if($_SESSION['isEdit_Success']) $_SESSION['lname_error_msg'] = "";
		} 
  ?>
  <span id="lname_error_msg" style="color:red"></span>
  <br><br>
  <?php
      $male = "";
      $female = "";
      if($gender == "Female"){
        $male = "";
        $female = "checked";
      }
      else{
        $male = "checked";
        $female = "";
      }   
      ?>
      <input id="maleRadio" <?php echo $male ?> type="radio" name="gender" value="Male"/><label>Male</label> 
      <input id="femaleRadio" <?php echo $female ?> type="radio" name="gender" value="Female"/><label>Female</label>
   <?php  
        if(isset($_SESSION['gender_error_msg'])){
        echo $_SESSION['gender_error_msg'] ;
		if($_SESSION['isEdit_Success']) $_SESSION['gender_error_msg'] = "";
		} 
  ?>
  <span id="gender_error_msg" style="color:red"></span>
  <br><br>
  <label for="email">Email:</label><br>
  <input type="email" id="email" name="email" value="<?php echo $email ?>">
  <?php  
        if(isset($_SESSION['email_error_msg'])){
        echo $_SESSION['email_error_msg'];
		if($_SESSION['isEdit_Success']) $_SESSION['email_error_msg'] = "";
		} 
  ?>
  <span id="email_msg" style="color:red"></span>
  <br><br>
  
  <input type="submit" value="Submit">
  <a href="Login.php"><input type="button" value="Back"></a>
  </div>
  <?php  
        if(isset($_SESSION['File_error_msg'])){
        echo $_SESSION['File_error_msg'];
		//if($_SESSION['isEdit_Success']) $_SESSION['File_error_msg'] = "";
		} 
  ?>  
</form>
</div>


</body>
</html>