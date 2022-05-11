<?php
	    include "connection.php";
	    error_reporting(0);
        $code=$_GET['id'];
		$cc=connexion("gestion_restaurant");
		$rr="delete from Employé where idEmployé='$code'";
		mysqli_query($cc,$rr);
		header('location:utilisateur.php');
	    echo "!!!Delete";
?>