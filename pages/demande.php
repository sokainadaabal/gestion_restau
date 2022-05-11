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
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Demande</title>
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
    <body>
        <div class="wrapper">
            <?php 
              include 'topheader.php';
            ?>    
            <div class="main_container">
               <?php 
                include 'sidebaradmin.php';
                ?>
                <div class="container">  
                </div>
            </div>
       </div>
    </body>
</html>

