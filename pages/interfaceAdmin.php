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
	<title>interfaceAdmin</title>
	<link rel="stylesheet" href="../css/navebar.css">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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
    <?php
      $con=connexion("gestion_restaurant");                      
      $nbutilisateur = "Select * from employé;";
      $nbcategorie= "Select * from catégorie;";
      $nbplat= "Select * from plats;";
      $run_count = mysqli_query($con,$nbutilisateur);
      $run_count1 = mysqli_query($con,$nbcategorie);
      $run_count2 = mysqli_query($con,$nbplat);
      $num=mysqli_num_rows ( $run_count);
      $num2=mysqli_num_rows ( $run_count1);
      $num3=mysqli_num_rows ( $run_count2);;
    ?>
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
        <div class="row">
          <div class="col-md-3 col-xl-3">
              <div class="card bg-c-blue order-card">
                  <div class="card-block">
                      <h2 class="text-right"><i class="fa fa-users f-left"></i><span><?php echo $num?></span></h2>
                      <p class="m-b-0">Employeur</p>
                  </div>
              </div>
          </div>
          <div class="col-md-3 col-xl-3">
              <div class="card bg-c-green order-card">
                  <div class="card-block">
                      <h2 class="text-right"><i class="fa fa-list-alt f-left"></i><?php echo $num2 ?></h2>
                      <p class="m-b-0">Catégorie</p>
                  </div>
              </div>
          </div>
          <div class="col-md-3 col-xl-3">
              <div class="card bg-c-yellow order-card">
                  <div class="card-block">
                      <h2 class="text-right"><i class="fas fa-utensils f-left"></i><?php echo $num3 ?></h2>
                      <p class="m-b-0">Plats</p>
                  </div>
              </div>
          </div>
          <div class="col-md-3 col-xl-3">
              <div class="card bg-c-pink order-card">
                  <div class="card-block">
                      <h2 class="text-right"><i class="fa fa-plus f-left"></i><?php echo $num2 ?></h2>
                      <p class="m-b-0">Demande</p>
                  </div>
              </div>
          </div>
        </div>
        <div style="display:flex;justify-content:space-between;">
                <div id="slider">
                    <ul>
                      <li>
                        <div class="slider-container">
                          <img src="../image/image_data/chef-1.jpg" />
                          <img src="../image/image_data/chef-2.jpg" />
                        </div>
                      </li>
                      <li>
                      <div class="slider-container">
                         <img src="../image/image_data/chef-2.jpg" />
                      </div>
                      </li>
                      <li>
                        <div class="slider-container">
                          <img src="../image/image_data/chef-1.jpg" />
                        </div>
                      </li>
                      <li>
                      <div class="slider-container">
                         <img src="../image/image_data/chef-2.jpg" />
                      </div>
                      </li>
                    </ul>
                </div>
                <div class="col-md-1" style="margin-top:50px;width:100px; height:100px;display: block;margin-left: auto;margin-right: auto;">
                  <br>
                  <p class="calendar">
                    <?php echo date("d")?><em> <?php echo date("F")?></em>
                  </p>
                </div>
        </div>
  </div>
</div>	
</body>
</html>