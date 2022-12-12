<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === "POST") {
  $AgentID = $_POST['AgentID'];
?>
<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <script src="JS Files/VAEdit.js"></script>
    <link rel="stylesheet" href="../CSS/Style.css">
  </head>
  <body>    
    <div class="SU_form">
      <h2>VotingAgents Profile Edit</h2>
      <div class="error_text">
      <?php 
      if(isset($_SESSION['error_msg'])){
        echo $_SESSION['error_msg']; 
        if(isset($_SESSION['isEdit_Success'])) $_SESSION['error_msg'] = "";
      }
      ?>
      </div>
      <form method="post" action="../Controller/VAEditValidation.php" novalidate onsubmit="return isVAEdit_valid(this)";>
      <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $conn = mysqli_connect($servername, $username, $password, "voting_management", 3306);
      if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
      $stmt = mysqli_stmt_init($conn);
      mysqli_stmt_prepare($stmt, "SELECT * FROM `Votingagentss` WHERE AgentID = ?");
      mysqli_stmt_bind_param($stmt, "i", $AgentID);
      mysqli_stmt_execute($stmt);
      $res = mysqli_stmt_get_result($stmt);
      
      $rows_count = mysqli_num_rows($res);
      if ($rows_count > 0) {
        $row=mysqli_fetch_array($res,MYSQLI_ASSOC);
        $fname = $row['FirstName'];
        $lname = $row['LastName'];
        $gender = $row['Gender'];
        $email = $row['Email'];
        $address = $row['Address'];
        $status = $row['Status'];
      ?>
      <input type="hidden" name="id" value="<?php echo $AgentID ?>" />
      <input type="hidden" name="status" value="<?php echo $status ?>" />
      <label >First Name: </label> <input type="text" id="fname" name="fname" value="<?php echo $fname ?>"  />
      <span id="fname_error_msg" style="color:red"></span>
      <br>
      <label>Last Name: </label> <input type="text" id="lname" name="lname" value="<?php echo $lname ?>" />
      <span id="lname_error_msg" style="color:red"></span>
      <br>
      <label>Email: </label> <input type="text" id="email" name="email" value="<?php echo $email ?>" />
      <span id="email_msg" style="color:red"></span>
      <br>
      <label>Address: </label> <input type="text" id="address" name="address" value="<?php echo $address ?>" />
      <span id="address_msg" style="color:red"></span>
      <br>
      <label>Gender: </label> 
      <span>
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
      <span id="gender_error_msg" style="color:red"></span>
      </span><br>
      <?php
      }
      ?>
      <div style="clear:both"></div><br/>
      <label></label> <input type="submit" value="Save">
      <a href="VotingAgents.php"><input type="button" value="Back"></a>
      </form>
    </div>
  </body>
</html>
<?php
  }
?>

