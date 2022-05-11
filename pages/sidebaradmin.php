<div class="sidebar">
          <div class="sidebar__inner">
            <div class="profile">
              <div class="img">
                 <?php echo '<img src="../image/image_data/'.$im.'" alt="errreur" height="100px" width="100px" redius="50px">'; ?>
              </div>
              <div class="profile_info">
                 <p>Bonjour</p>
                 <p class="profile_name" align="left"><?php echo  $nom . ' ' . $pr;  ?></p><br>
              </div>
            </div>
            <ul>
              <li>
                <a href="interfaceAdmin.php" class="active">
                  <span class="icon"><i class="fas fa-home"></i></span>
                  <span class="title">Accueil</span>
                </a>
              </li>
              <li>
                <a href="utilisateur.php">
                  <span class="icon"><i class="fas fa-users"></i></span>
                  <span class="title">Employer</span>
                </a>
              </li>
              <li>
                <a href="categorie.php">
                  <span class="icon"><i class="fa fa-list-alt"></i></span>
                  <span class="title">Catégorie</span>
                </a>
              </li>
              <li>
                <a href="plat.php">
                  <span class="icon"><i class="fas fa-utensils"></i></span>
                  <span class="title">Plats</span>
                </a>
              </li>
              <li>
                <a href="demande.php">
                  <span class="icon"><i class="fas fa-plus"></i></span>
                  <span class="title">Demandes</span>
                </a>
              </li>
            </ul>
          </div>
</div>