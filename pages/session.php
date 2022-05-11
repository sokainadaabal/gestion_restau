<?php
	session_start();
	if(!isset($_SESSION['loggedin'])){	//si la variable $_SESSION['user'] n'existe pas
		header('Location:login.php');
		exit();
	}
?>