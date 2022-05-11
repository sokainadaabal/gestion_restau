<?php 
  // obligatoire d'utiliser session,et montionner avant le code.
  session_start();
  if(!isset($_SESSION["loggedin"]))
  {
    header("Location: login.php");
  }
  
?>
<!DOCTYPE html>
<html>

    <head>
      <!--Insertion Language et Taille -->
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width,initial-scale=1.0">
      <script
        src="https://kit.fontawesome.com/64d58efce2.js"
        crossorigin="anonymous"
      ></script>
       <!--Titre de la page -->
      <title>Page de Client</title>
      <!-- Design for my site web -->
    </head>
    <body>
        <div class="container">
          <?php echo 'Welcome ' . $_SESSION['nom'] . '!' .$_SESSION['id'];?>
          <li>
					<a href="se_deconnecter.php">
						<span class="glyphicon glyphicon-log-out"></span>
						Se Deconnecter
					</a>
				</li>
        </div>
    </body>
</html>