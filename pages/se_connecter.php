<?php
	include 'connection.php';
    session_start();
    
   
    /*******************************   Code d'inscription de client   ****************/
	if(isset($_POST["Inscriver"]))
	{
		$nom=mysqli_real_escape_string($con,$_POST["nom"]);
		$prenom=mysqli_real_escape_string($con,$_POST["prenom"]);
		$tel=mysqli_real_escape_string($con,$_POST["tel"]);
		$adress=mysqli_real_escape_string($con,$_POST["adress"]);
		$ville=mysqli_real_escape_string($con,$_POST["ville"]);
		$email=mysqli_real_escape_string($con,$_POST["email"]);
		$mot_pass=mysqli_real_escape_string($con,md5($_POST["mot_passe"]));
		$con_passe=mysqli_real_escape_string($con,md5($_POST["com_mot_passe"]));
	    // instruction sql  assurer que l'utilisateur y'a pas plusieurs compte
        $check_email =mysqli_num_rows(mysqli_query($con,"SELECT email FROM  client WHERE email='$email'"));
        $check_tel =mysqli_num_rows(mysqli_query($con,"SELECT tel FROM  client WHERE tel='$tel'"));
        if($mot_pass !== $con_passe)
		{
              echo "<script>alert ('les mots de passes ne correspondent pas.');
              location.href = 'login.php';
              </script>";
			 
		}
        elseif($check_email >0)
        {
            echo "<script>alert ('ce email est déja utilisé.');
            location.href = 'login.php';
            </script>";
			
        }
        elseif($check_tel >0)
        {
            echo "<script>alert ('ce numéro télèphone  est déja utilisé.');
            location.href = 'login.php';
            </script>";
			
        }
        else {
            // instruction ajout client
            $sql=" INSERT INTO client(NOM,PRENOM,TEL,ADRESS,VILLE,MOT_PASSE,email) values('$nom','$prenom','$tel','$adress','$ville','$mot_pass','$email')";
            // exécute l'insctruction $sql
            $result =mysqli_query($con,$sql);
            if($result)
            {
                $_POST["nom"]="";
                $_POST["prenom"]="";
                $_POST["tel"]="";
                $_POST["adress"]="";
                $_POST["email"]="";
                $_POST["ville"]="";
                $_POST["mot_passe"]="";
                $_POST["com_mot_passe"]="";
                echo "<script>alert ('Votre inscription chez nous est réussi !');</script>";
				
            }
            else
            {
                echo "<script>alert ('Votre inscription chez nous n'est pas réussi !');
                location.href = 'login.php';
                </script>";
				
            }
        }
	}
	/*******************************   Code de connection de client    ****************/
	if(isset($_POST["Connecter"]))
	{
		$email=mysqli_real_escape_string($con,$_POST["email"]);
		$mot_pass=mysqli_real_escape_string($con,md5($_POST["mot_passe"]));
		
	    // instruction sql  assurer que l'utilisateur exist dans database
        $check_email_mot_pass=mysqli_query($con,"SELECT * FROM  client WHERE email='$email' AND MOT_PASSE='$mot_pass'");
        $check_email_mot_passA=mysqli_query($con,"SELECT * FROM  admin WHERE email='$email' AND passeword='$mot_pass'");
		if(mysqli_num_rows($check_email_mot_pass) > 0)
        {
			// Verification success! User has logged-in!
			// Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
		    session_regenerate_id();
			$row=mysqli_fetch_assoc($check_email_mot_pass);
		    $_SESSION['loggedin'] = TRUE;
		    $_SESSION['nom'] =$row["NOM"];
		    $_SESSION['id'] = $row["CODE_CLIENT"];
           
            header("Location:interfaceClient.php");
        }
        elseif(mysqli_num_rows($check_email_mot_passA) > 0)
        {
			// Verification success! User has logged-in!
			// Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
		    session_regenerate_id();
			$row=mysqli_fetch_assoc($check_email_mot_passA);
		    $_SESSION['loggedinA'] = TRUE;
		    $_SESSION['email'] =$row["email"];
		    $_SESSION['id'] = $row["idAdmin"];
            $_SESSION['nom']=$row["Nom"];
            $_SESSION['pre']=$row["prenom"];
            $_SESSION['img']=$row["image"];
            header("Location:interfaceAdmin.php");
        }
        else {

            echo "<script>alert('Email ou mot de passe  sont  pas correct.');
            location.href = 'login.php';
            </script>";
			
			
        }
	}
?>