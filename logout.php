<?php


	ob_start();

	session_start();


	unset($_SESSION['id']);


	header("Location: index.php");



?>