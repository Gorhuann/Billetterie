<?php
	session_start();
	if(!isset($_SESSION["mailUser"]))
		header("Location: identification.php");
	print_r($_SESSION);
	session_destroy();
?>