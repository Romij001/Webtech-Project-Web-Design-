<?php
session_start();
if($_SESSION['userId'] > 0)
{
?>


<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="../CSS/Style.css">
  <script src="Ajax/CandidatesAjax.js"></script>
</head>
<body>
  <div class="SU_form">
  <h2>Candidates</h2>

  <table>
    <thead>
      <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Address</th>
        <th>Gender</th>
        <th>Email</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody id="C_tbody">
<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $conn = mysqli_connect($servername, $username, $password, "voting_management", 3306);
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, "SELECT * FROM `candidates`");
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    $rows_count = mysqli_num_rows($res);
  if ($rows_count > 0) {
    while($row = mysqli_fetch_assoc($res)) {
        $candidateId =$row['CandidateID'];
        $fname = $row['FirstName'];
        $lname = $row['LastName'];
        $gender = $row['Gender'];
        $email = $row['Email'];
        $address = $row['Address'];
        $status = $row['Status'];
      ?>
      <tr>
      <td><?php echo $fname ?></td>
      <td><?php echo $lname ?></td>
      <td><?php echo $address ?></td>
      <td><?php echo $gender ?></td>
      <td><?php echo $email ?></td>
      <td>
        <?php 
        if($status == 1){
        ?>
        <form  method="post" action="../View/CandidateEdit.php">

          <input type="hidden" name="candidateId" value="<?php echo $candidateId; ?>">
          <input type="submit" value="Edit">
        </form>
        <?php
        }

        ?>        
      </td>
      </tr>
      <?php
    }
  }
  else {
    echo "No Candidate(s) found";
  }
?>
</tbody> 
</table>
<form action="../Controller/CandidatesSearch.php" method="GET" onsubmit="return Candidatessearch(this);"> 
    <input type="search" name="searchtxt">
    <input type="submit" name="submit">
  </form>
<br>
<a href="Admin.php"><input type="button" value="BACK"></a>
</div>

</body>
</html>

<?php
}
else{
    header ("Location: ../View/Login.php");
}
?>