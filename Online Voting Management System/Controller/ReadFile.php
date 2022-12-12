<?php  
	
$filename = "../model/user.json";
$file = fopen($filename, "r");
$X = filesize($filename);
$Y = null;
$users = [];

if ($X > 0) {
$Y = fread($file, $X);
$users = json_decode($Y);
}
fclose($file);

return $users;

?>