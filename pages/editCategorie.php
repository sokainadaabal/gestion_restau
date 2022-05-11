<?php
  // obligatoire d'utiliser session,et montionner avant le code.
  session_start();
  if(!isset($_SESSION["loggedinA"]))
  {
    header("Location: login.php");
  }
  $nom = $_SESSION['nom'];
  $pr  = $_SESSION['pre'];
  $im  = $_SESSION['img'];
  include "connection.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>modification Catégorie</title>
        <link rel="stylesheet" href="../css/navebar.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function(){
                $(".hamburger .hamburger__inner").click(function(){
                $(".wrapper").toggleClass("active")
                })

                $(".top_navbar .fas").click(function(){
                $(".profile_dd").toggleClass("active");
                });
            });
            $(function () {
            var current = location.pathname;
            $("#nav  li a").each(function () {
            var $this = $(this);
            // if the current path is like this link, make it active
            if ($this.attr("href").indexOf(current) !== -1) {
                $this.addClass("active");
            }
            });
           });
        </script>
    </head>   
    <body >  
        <div class="wrapper">
            <?php 
            include 'topheader.php';
            ?>
            <div class="main_container">
                <?php 
                include 'sidebaradmin.php';
                ?>
                <div class="container">
                   <form action="" method="POST">
                        <?php
                            if(isset($_POST['nok'])){
                                header("location:Categorie.php");}
                        ?>
                        <?php
                            error_reporting(0);
                            $cod=$_GET['cdM'];
                            $nsr=$_GET['nM'];
                            $ns=$_GET['nt'];
                            if(isset($_POST['ok'])){
                            $cn=connexion("gestion_restaurant");
                            $ls=$_POST['c'];
                            $p=$_POST['nc'];
                            $q=$_POST['nt'];
                            $req="UPDATE `catégorie` SET `nom categorie` = '".$p."' WHERE `catégorie`.`IdCatégorie` = '$ls'";
                                    $res= mysqli_query($cn,$req);
                                    if ($res){
                                        header("location:Categorie.php");
                                    }else{
                                        echo "not update";
                                    }
                            }
                        ?>
                        <div class="content">
                        <br><br>
                            <div style='display:flex;justify-content:space-between;'>
                                <h4 style='text-align:center;'>Editer la Categorie <?php echo $cod ?> </h4>
                                <a href='utilisateur.php'>
                                    <i class='fa fa-arrow-alt-circle-left' style='color:#fdb328'></i>
                                </a>  
                            </div>   
                            <form action="#">
                                <div class="form-group">
                                    <label class='form-label' style='text-align:right;'>Code catégorie </label>
                                    <input type="text"  class='form-control'  name="c"  value="<?php echo"$cod" ?>">
                                </div>
                                <div class="form-group">
                                   <label class='form-label' style='text-align:right;'>Nom catégorie</label>
                                    <input type="text" name="nc" class='form-control' value="<?php echo"$nsr" ?>" >
                                </div>
                                <div class="form-group">
                                    <label class='form-label' style='text-align:right;'>  id type</label>
                                    <input type="text" name="nt" class='form-control' value="<?php echo"$ns" ?>" >
                                </div>
                                <div class="button">
                                    <input type="submit" value="Modifier"  class='btn btn-info btn-large' style='border:none;text-align:center;color:#000;background-color:#fdb328'name="ok">
                                    <input type="submit" value="Retour"     class="btn btn-default"name="nok">
                                </div>
                                
                            </form>                          
                        </div>
                   </form>
                </div>
           </div>
        </div>
  </body>
</html>