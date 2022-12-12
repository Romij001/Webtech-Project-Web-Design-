<?php 
	
$filename = "../model/user.json";
$isWrite_Success = 0;
$json_users = json_encode($users);
$file = fopen($filename, "w");
$isWrite_Success = fwrite($file, $json_users);
fclose($file);
return $isWrite_Success;

?>