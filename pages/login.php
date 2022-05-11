<?php 
   require('se_connecter.php');
   error_reporting(0);
   if (isset($_SESSION["loggedin"])) {
    header("Location: interfaceClient.php");
    }
   elseif(isset($_SESSION["loggedinA"]))
   {
    header("Location: interfaceAdmin.php");
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
      <title>Page de Connection / Inscription</title>

      <!-- Design for my site web -->
      <link rel="stylesheet" href="../css/style.css" />
    </head>
    <body>
        <div class="container">
            <div class="form-container">
                <div class="singin-singup">
                    <!-- ***************** Connection Form   *************************-->
                    <form method="POST" action="se_connecter.php" class="sign-in-form">
                        <h2 class="title">Connection</h2>
                        <div class="input-field">
                           <i class="fas fa-user"></i>
                           <input type="text" placeholder="Email"  value="<?php echo $_POST["email"]?>" name="email" required/>
                        </div>
                        <div class="input-field">
                           <i class="fas fa-lock"></i>
                            <input type="password" placeholder="Mot de Passe" value="<?php echo $_POST["mot_passe"]?>" name="mot_passe" required/>
                        </div>
                        <input type="submit" value="Connecter" class="btn coonect" name="Connecter"/>
                        <p class="social-text"> Ou Suivez nous sur Social media</p>
                         <div class="social-media">
                             <a href="#" class="social-icon">
                                 <i class="fab fa-facebook-f"></i>
                             </a>
                             <a href="#" class="social-icon">
                                <i class="fab fa-youtube"></i>
                             </a>
                             <a href="#" class="social-icon">
                                <i class="fab fa-instagram"></i>
                             </a>
                         </div>
                    </form>
                     <!-- **************** Inscription  Form *************************-->
                     <form method="POST"  action="se_connecter.php" class="sign-up-form">
                        <h2 class="title">Inscription</h2>
                        <div class="horizontal-group">
                            <div class="input-field left">
                                <i class="fas fa-user"></i>
                                <input type="text" placeholder="Nom" value="<?php echo $_POST["nom"]?>"  name="nom" required/>
                            </div>
                            <div class="input-field right">
                                <i class="fas fa-user"></i>
                                <input type="text" placeholder="Prénom" value="<?php echo $_POST["prenom"]?>" name="prenom" required/>
                            </div>    
                        </div>
                        <div class="input-field">
                           <i class="fas fa-phone"></i>
                           <input type="text" placeholder="Télèphone" value="<?php echo $_POST["tel"]?>" name="tel" required/>
                        </div>
                        <div class="input-field">
                           <i class="fas fa-at"></i>
                           <input type="text" placeholder="Adress Email" value="<?php echo $_POST["email"]?>" name="email" required/>
                        </div>
                        <div class="horizontal-group">
                            <div class="input-field left">
                                <i class="fas fa-map-marker-alt"></i>
                                <input type="text" placeholder="Adress" value="<?php echo $_POST["adress"]?>" name="adress" required/>
                            </div>
                            <div class="input-field right">
                                <i class="fas fa-map-pin"></i>
                                <input type="text" placeholder="Ville" value="<?php echo $_POST["ville"]?>" name="ville" required/>
                            </div>
                        </div>
                        <div class="horizontal-group">
                            <div class="input-field left">
                                <i class="fas fa-lock"></i>
                                <input type="password" placeholder="Mot de Passe" value="<?php echo $_POST["mot_passe"]?>" name="mot_passe" required/>
                            </div>
                            <div class="input-field right">
                                <i class="fas fa-lock"></i>
                                <input type="password" placeholder="Confirmer Mot  Passe" value="<?php echo $_POST["com_mot_passe"]?>" name="com_mot_passe" required/>
                            </div>
                        </div >
                        <input type="submit" value="Inscriver" class="btn coonect" name="Inscriver"/>
                        <p class="social-text"> Ou Suivez nous sur Social media</p>
                         <div class="social-media">
                             <a href="#" class="social-icon">
                                 <i class="fab fa-facebook-f"></i>
                             </a>
                             <a href="#" class="social-icon">
                                <i class="fab fa-youtube"></i>
                             </a>
                             <a href="#" class="social-icon">
                                <i class="fab fa-instagram"></i>
                             </a>
                         </div>
                    </form>
                </div>
            </div>
            <div class="panels-container">
             <div class="panel left-panel">
                   <div class="content">
                       <h3>Commander & Reserver </h3>
                       <p>Pour commander un plat ou reserver une table ,il faut posséde un Compte chez nous.</p>
                       <button class="btn transparent" id="sign-up-btn" name="Inscriver">Inscription</button>
                    </div>
                <img src="../image/image1.svg" class="image" alt="">
             </div>
             <div class="panel right-panel">
                   <div class="content">
                       <h3> Vos Plats Seul Clique </h3>
                       <p>Pour commander un plat ou reserver une table ,il faut Connecter a votre   Compte .</p>
                       <button class="btn transparent" id="sign-in-btn">Connecter</button>
                    </div>
                <img src="../image/image2.svg" class="image" alt="">
             </div>
            </div>
        </div>
        <script src="../js/app.js"></script>
    </body>
</html>