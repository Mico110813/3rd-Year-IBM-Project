<?php

	$host="localhost";
	$user="xxx";
	$userpass='xxx';
	$schema="xxxx";
	$conn = new mysqli($host,$user,$userpass,$schema);
	if(mysqli_connect_errno()) {
		echo "Could not connect to database: ".mysqli_connect_errno();
		exit;
	}

?>
