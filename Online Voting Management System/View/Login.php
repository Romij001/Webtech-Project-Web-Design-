<?php
   session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Voting Management System</title>
    <script src="JS Files/LoginPage.js"></script>
    <link rel="stylesheet" href="../CSS/Style.css">
</head>
<body>
    <div class="login_form">
       
        <h1>LOGIN</h1>

        <form action=" ../Controller/LoginValidation.php" method="POST" novalidate onsubmit="return islogin_valid(this);">
            <div class="text_field">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
                <?php  
				$_SESSION['islogin_valid'] = false;
                if(isset($_SESSION['email_error_msg'])){
                echo $_SESSION['email_error_msg'] ;
            
                if ($_SESSION['islogin_valid']) $_SESSION['email_error_msg'] = "";

                } 
               ?>
               <span id="email_msg" style="color:red"></span>
                <br><br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
                <?php  
                   if(isset($_SESSION['Password_error_msg'])){
                   echo $_SESSION['Password_error_msg'] ;
            
                   if ($_SESSION['islogin_valid']) $_SESSION['Password_error_msg'] = "";

                  } 
                ?> 
                <span id="password_msg" style="color:red"></span>         
                <br><br>
                <a href="Forgotpass.php">Forget Password ?</a><br>
				<br>
                <input type="submit" value="Login">
                <a href="Rpage.php"><input type="button" value="Sign up"></a>

            </div>
        </form>
        <?php  
        if(isset($_SESSION['global_error_msg'])){
            echo $_SESSION['global_error_msg'] ;
            
            if ($_SESSION['islogin_valid']) $_SESSION['global_error_msg'] = "";

        } 
        ?>
                
    </div>

</body>
</html>