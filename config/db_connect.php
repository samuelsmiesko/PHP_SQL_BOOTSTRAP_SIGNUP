<?php 

	// connect to the database
	$conn = mysqli_connect('localhost', '1Admin', '54321admins', 'mydata');

	// check connection
	if(!$conn){
		echo 'Connection error: '. mysqli_connect_error();
	}

?>