<?php

  session_start();  

  require("../Model/CPasswordDB.php");

  if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $pwd  =  $_POST['pwd'];
        $pwd1 =  $_POST['pwd1'];
        $pwd2 =  $_POST['pwd2'];
  
     $servername = "localhost";
     $username = "root";
     $password = "";

    $isvalid = true;

    if(isset($_SESSION['u_id'])){
      $id=$_SESSION['u_id'];
    }

    if(empty($pwd)) {
         $_SESSION['Password_error_msg'] = "Password is empty";
         $_SESSION['ispass_valid'] = false ;
           $isvalid = false;
         header ("Location: ../View/Chpass.php");
    }  

    else if(empty($pwd1)) {
         $_SESSION['Password1_error_msg'] = "New Password is empty";
         $_SESSION['ispass_valid'] = false ;
           $isvalid = false;
         header ("Location: ../View/Chpass.php");
    } 

   else if(empty($pwd2)) {
         $_SESSION['Password2_error_msg'] = "Re-Type Password is empty";
         $_SESSION['ispass_valid'] = false ;
           $isvalid = false;
         header ("Location: ../View/Chpass.php");
    }
   
    else {
      
        
      $_SESSION['Password_error_msg'] = "";
      $_SESSION['Password1_error_msg'] = "";
      $_SESSION['Password2_error_msg'] = "";
      $_SESSION['ispass_valid'] = true ;
      $userId = $_SESSION['userId'];
      $num = CPassword($pwd, $pwd1, $userId);

      if($num > 0) 
      {
        header ("Location: ../View/Admin.php");
      }
      else{
        $_SESSION['ispass_valid'] = false;
        header('location: ChPassCheck.php');
      }
    }  
  }
?>


