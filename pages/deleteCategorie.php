<?PHP 
	    include "connection.php";
	    error_reporting(0);
        $code=$_GET['codeC'];
		$cc=connexion("gestion_restaurant");
		$rr="delete from catégorie where IDCatégorie='$code'";
		mysqli_query($cc,$rr);
		header("location:Categorie.php");
?>