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
    <title>Employeur</title>
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
              <h4 style="text-align: left;">Gestion Employeur</h4>
              <span style="text-align: right;">
                  <a href="#"><i class="fas fa-plus" data-toggle="modal" data-target="#myModal" style="color:#fdb328"></i></a>
              </span>
            </div>
            <br>
                <table class="table">
                    <tr >
                        <th  class="text-center">Identifiant</th>
                        <th  class="text-center">Poste</th>
                        <th  class="text-center">image</th>
                        <th  class="text-center">Modifier</th>
                        <th  class="text-center">Supprimer</th>
                    </tr>
                    <?php
                    $con=connexion("gestion_restaurant");
                    $get_data = "SELECT * FROM employé ";
                    $run_data = mysqli_query($con,$get_data);
                    while($row = mysqli_fetch_array($run_data))
                    {
                        $id = $row['0'];
                        $pass= $row['1'];
                        $img = $row['2'];
                        echo "
                        <tr>
                            <td scope='row' class='text-center'>$id</td>
                            <td class='text-center'>$pass</td>
                            <td class='text-center'><img src='../image/image_data/".$img."' style='width:50px; height:50px;'></td>
                            <td class='text-center'>
                                <span>
                                    <a href='editUtilisateur.php?id=$row[0] && mp=$row[1] && im=$row[2]'>
                                        <i class='fas fa-pencil-alt' data-toggle='modal' data-target='#edit$id' style='color:#fdb328' aria-hidden='true'></i>
                                    </a>
                                </span>  
                            </td>
                            <td class='text-center'>
                                <span>
                                    <a href='SupprimerUtilisateur.php?id=$row[0]'>
                                        <i class='fas fa-trash' data-toggle='modal' data-target='#$id' style='color:#fdb328' aria-hidden='true'></i>
                                    </a>
                                </span>
                            </td>
                        </tr>
                        ";
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
          <h4 class="modal-title text-center">Ajouter Un Utilisateur</h4>
        </div>
        <form method="Post"> 
          <div class="modal-body">
              <div class='form-group'>
                  <label class='form-label' style='text-align:right;'>Identifiant</label>
                  <input class='form-control' type='text' name="l"  id="input">
              </div>
              <div class='form-group'>
                <label class='form-label' style='text-align:left;'>Code de Poste</label>
                <input class='form-control' type='text' name="m" id="inputm">
              </div>
              <div class='custom-file'>
                <label class="form-label" style='text-align:right;'>Image</label>
                <input class="form-control" type="file" name="image" id="image">     
              </div>         
          </div>
          <div class="modal-footer">
              <input type="submit" name="sub" class="btn btn-info btn-large" value="Submit">                    
              <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
          </div>
          <?php
              if(isset($_POST['sub'])){ 
                if (!empty($_POST['l'])&& !empty($_POST['m']) && !empty($_POST['image'])){
                $cn=connexion("gestion_restaurant");
                $l=$_POST['l'];
                $p=$_POST['m'];
                $i=$_POST['image'];
                $req="insert into employé values ('$l','".$p."','".$i."')";
                mysqli_query($cn,$req);
                }} 
            ?>
          
        </form>
          
      </div>
  </div>
</div>