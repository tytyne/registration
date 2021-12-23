<?php
	include_once('database/config.php');
	session_start();
	session_destroy();
	session_unset($_SESSION['id']);
	session_unset($_SESSION['fullname']);
	header("Location:loginForm");
?>