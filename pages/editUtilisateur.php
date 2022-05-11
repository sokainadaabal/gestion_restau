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
        <title>modification Employeur</title>
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
                <?php
                    $con=connexion("gestion_restaurant");
                    error_reporting(0);
                    $id=  $_GET['id'];
                    $pass=$_GET['mp'];$im=$_GET['im'];
                    if(isset($_POST['submit']))
                    {
                        $lgn=$_POST['log'];
                        $pass=$_POST['cods'];
                        $im=$_POST['image'];
                        $update = "UPDATE employé SET idPoste='".$pass."' WHERE idEmployé='".$lgn."'";
                        $run_update = mysqli_query($con,$update);
                        if($run_update){
                    header("location:utilisateur.php");
                    } }
                ?>
                <!----edit Data--->
                <?php
                        $con=connexion("gestion_restaurant");
                        $get_data = "SELECT * FROM employé where idEmployé ='".$id."'";
                        $run_data = mysqli_query($con,$get_data);
                        while($row = mysqli_fetch_array($run_data))
                        {               $id = $row['0'];
                                        $pass= $row['1'];
                                        $name = $row['2']; 
                            echo "
                                    <br><br>
                                    <div style='display:flex;justify-content:space-between;'>
                                        <h4 style='text-align:center;'>Editer l'employeur $id </h4>
                                        <a href='utilisateur.php'>
                                            <i class='fa fa-arrow-alt-circle-left' style='color:#fdb328'></i>
                                        </a>  
                                    </div>
                                    <br><br>
                                    <form action='' method='post' enctype='multipart/form-data'> 
                                      <div style='display:flex;justify-content:space-between;'>
                                            <div style=' margin-left:50px;width:100%; height:100% . text-align:right;'>
                                                <div class='form-group'>
                                                    <label class='form-label' style='text-align:right;'>Identifiant</label>
                                                    <input class='form-control' type='text' name='log'  value='$id'>
                                                </div>
                                                <div class='form-group'>
                                                    <label class='form-label' style='text-align:left;'>Code de Poste</label>
                                                    <input class='form-control' type='text' name='cods' value='$pass'>
                                                </div>
                                                <div class='custom-file'>
                                                    <label class='form-label' style='text-align:right;'>Image</label>
                                                    <input class='form-control' type='file' name='image'>     
                                                </div>
                                                <br><br>            
                                                <input type='submit' name='submit' class='btn btn-info btn-large' style='border:none;text-align:center;color:#000;background-color:#fdb328'value='Submit'>
                                            </div>
                                            <div style=' margin-left:50px;width:100%; height:100% . text-align:left;'>
                                            <img src = '../image/image_data/$im' style='margin-top:50px;width:100px; height:100px;display: block;margin-left: auto;margin-right: auto;'>
                                            </div>
                                      </div>
                                        
                                    </form>
	                        ";
                        }?>
                 
                </div>
            </div>
        </div>
  </body>
</html>