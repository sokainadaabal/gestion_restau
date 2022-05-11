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
        <title>Catégorie</title>
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
                    <form method="" action="POST">
                        <div style="display:flex;justify-content:space-between;">
                        <h4 style="text-align: left;">Gestion Catégorie</h4>
                        <span style="text-align: right;">
                            <a href="#"><i class="fas fa-plus" data-toggle="modal" data-target="#myModal" style="color:#fdb328"></i></a>
                        </span>
                        </div>
                        <br>
                            <table class="table">
                                <tr >
                                    <th class="text-center">code catégorie</td>
                                    <th class="text-center">nom  catégorie</td>
                                    <th class="text-center">code type</td>
                                    <th class="text-center" colspan="2" align="center"> action</td>
                                </tr>
                                <?php
                                    $cc=connexion("gestion_restaurant");
                                    $rr="select * from catégorie";
                                    $dd=mysqli_query($cc,$rr);
                                    while($donnee= mysqli_fetch_row($dd))
                                    {
                                        echo "<tr>
                                        <td class='text-center'>".$donnee[0]."</td>
                                        <td class='text-center'>".$donnee[1]."</td>
                                        <td class='text-center'>".$donnee[2]."</td>                
                                        <td class='text-center'>
                                            <a href='editCategorie.php?cdM=$donnee[0] && nM=$donnee[1]&& nt=$donnee[2]'><i class='fas fa-pencil-alt' data-toggle='modal' data-target='#edit$donnee[0]' style='color:#fdb328;margin-right:50px;' aria-hidden='true'></i>
                                            <a href='deleteCategorie.php?codeC=$donnee[0]'><i class='fas fa-trash' data-toggle='modal' data-target='#$donnee[0]' style='color:#fdb328' aria-hidden='true'></i>
                                        </td>
                                        </tr>";
                                    }
                                ?>  
                            </table>
                    </form>
               </div>
            </div>
        </div>
    </body>
</html>                               
<!---Add in modal---->
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Ajouter Une Catégorie</h4>
        </div>
        <form method="Post"> 
          <div class="modal-body">
              <div class='form-group'>
                  <label class='form-label' style='text-align:right;'>Code catégorie</label>
                  <input class='form-control' type='text' placeholder="Enter le code de catégorie" name="cm"  id="input">
              </div>
              <div class='form-group'>
                <label class='form-label' style='text-align:left;'>nom catégorie</label>
                <input class='form-control' type='text' name="nm" id="inputm">
              </div>
              <div class='custom-file'>
                <label class="form-label" style='text-align:right;'>code type</label>
                <input class="form-control" type="text" name="m" id="image">     
              </div>         
          </div>
          <div class="modal-footer">
              <input type="submit" name="aj" class="btn btn-info btn-large" value="Submit">                    
              <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
              
          </div>
          <?php
            if(isset($_POST['aj'])){ 
            if (!empty($_POST['cm'])&& !empty($_POST['nm']) && !empty($_POST['m']) ){
                $cn=connexion("gestion_restaurant");
                $l=$_POST['cm'];
                $p=$_POST['nm'];
                $q=$_POST['m'];
                $req="insert into catégorie values ('$l','".$p."','$q')";
                mysqli_query($cn,$req);
            }}
            ?>
          
        </form>
          
      </div>
  </div>
</div>

