<?php
session_start();
require("../Model/ProfileDB.php");
if(isset($_SESSION['userId'])){
  $id=$_SESSION['userId'];
  $servername = "localhost";
  $username = "root";
  $password = "";
 

  $User = Profile($id);

  ?>    
  
  
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="../CSS/Style.css">
</head>
<body>


<div class="Profile_form">
<input type="hidden" value="<?php echo $id ?>" />
<?php 
  $rows_count = mysqli_num_rows($User);
  if ($rows_count > 0) {
        $row=mysqli_fetch_array($User,MYSQLI_ASSOC);
        $fname = $row['FirstName'];
        $lname = $row['LastName'];
        $gender = $row['Gender'];
        $email = $row['Email'];
      ?>
  <table>
    <thead>
      <tr>
        <th colspan="2"><h2>Profile</h2></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><b>First Name : </b></td>
        <td><?php echo $fname ?></td>
      </tr>
      <tr>
        <td><b>Last Name : </b></td>
        <td><?php echo $lname ?></td>
      </tr>
      <tr>
        <td><b>Gender : </b></td>
        <td><?php echo $gender ?></td>
      </tr>
      <tr>
        <td><b>Email : </b></td>
        <td><?php echo $email ?></td>
      </tr>
    </tbody>
  </table>

   <a href="EditUser.php"><input type="button" value="Edit"></a>
   <a href="Admin.php"><input type="button" value="Back"></a>
  <?php
  }
?>
</div>

</body>
</html>
<?php 
}
?>