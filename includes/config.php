<?php

	ob_start();

	session_start();

	$connection = new mysqli("localhost", "root", "mysql", "cable");

	// Check connection
	if ($connection->connect_errno) {
	  echo "Failed to connect to MySQL: " . $connection->connect_error;
	  exit();
	}

?>