<?php
session_start();
if($_SESSION['userId'] > 0)
{
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <link rel="stylesheet" href="../CSS/Style.css">
<style>
    body{
        min-height: 400px;
        padding: 1%;
    }

</style>
    
</head>
<body>
    <br><br><br><br><br>
    <?php include("../View/header.php") ?>
    <br><br><br><br><br><br><br>
    <div class="SU_form">

    <h1>Select User</h1>

    <a href="VotingAgents.php">Voting Aigent</a><br><br>
    <a href="Candidates.php">Candidates</a><br><br>
    <a href="Voters.php">Voters</a><br><br><br>

   <!--  <a href="Admin.php"><input type="button" value="BACK"></a> -->


    </div>
    <br><br><br><br><br><br><br><br><br>
    <?php require("Footer.php")?>

</body>
</html>
<?php
}
else{
    header ("Location: ../View/Login.php");
}
?>
