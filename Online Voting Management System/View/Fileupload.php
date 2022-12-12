<?php 

    if ($_SERVER['REQUEST_METHOD'] = 'POST'){

    $sourceLocation = $_FILES["myfile"]["tmp_name"];
	$destination = "../image/"

	
	move_uploaded_file($sourceLocation, $destination);


}
?>
