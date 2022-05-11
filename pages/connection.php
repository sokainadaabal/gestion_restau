<?php
	// les informations de connection
    $hostname = "localhost";
	$username = "root";
	$password = "";
	$database = "gestion_restaurant";
	// function de connection 
	$con = mysqli_connect($hostname,$username,$password,$database) or die("Erreur Conserner La connection avec database");
    if ( mysqli_connect_errno() ) {
		// au cas de votre base de données n'est connecté
		exit('Failed to connect to MySQL: ' . mysqli_connect_error());
	}
	function connexion($bd){
		return mysqli_connect('localhost','root','',$bd);
	}
?>