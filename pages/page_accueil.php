<?php
  session_start();
  if($_SESSION["connect"] == "1"){?>
<!DOCTYPE html>
<html>

<head>
    <title>Page d'accueil</title>
    <?php include_once("../includes/header.php") ?>
    <?php require_once("../includes/feuilledestyle.php") ?>
      <!-- Bootstrap core CSS -->
<!-- Custom styles for this template -->
<link href="../css/style.css" rel="stylesheet"> 
</head>

<!-- Header avec texte et image  -->
<header style="background-color: #f8f9fa">
  <nav>
    <?php include_once("../includes/nav_index.php") ?>
  </nav>
    <a class="navbar-brand ">
        <img src="../img/logo.png" width="40%" height="140px" class="img-fluid rounded mx-auto d-block" alt="Responsive image">
    </a>
</header>
<br>
</html>
<!-- TODO 3 image en haut et 2 en bas centrées, proposition... -->
    <section class="p-0" id="portfolio">
    <div class="container p-0 mx-auto">
        <div class="row no-gutters popup-gallery">
        <div class="col-lg-2"></div>
          <div class="col-lg-4 my-1 mr-1 zoom">
            <a class="portfolio-box" href="../pages/page_ajoutclient.php" >
              <img class="img-fluid rounded cover" src="./../img/portfolio/thumbnails/m1.jpg" style="filter : blur(1.5px)" alt="">
              <div class="portfolio-box-caption rounded">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">

                  </div>
                  <div class="project-name">
                  <h5 class="fsize police text-white">Création Client</h5>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6 my-1 ml-1 zoom">
            <a class="portfolio-box " href="../pages/page_rechercheclient.php">
              <img class="img-fluid rounded " src="./../img/portfolio/thumbnails/m2.jpg" style="filter : blur(1.5px)">
              <div class="portfolio-box-caption rounded">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">

                  </div>
                  <div class="project-name">
                  <h5 class="fsize police text-white">Modification Client</h5>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-2"></div>
          <div class="col-lg-4 col-sm-6 my-1 mr-1 zoom">
            <a class="portfolio-box" href="../pages/page_activite.php">
              <img class="img-fluid rounded " src="./../img/portfolio/thumbnails/m3.jpg" style="filter : blur(1.5px)">
              <div class="portfolio-box-caption rounded">
                <div class="portfolio-box-caption-content">
                  <div class="project-category text-faded">

                  </div>
                  <div class="project-name">
                  <h5 class="fsize police text-white">Activités</h5>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4 col-sm-6 my-1 ml-1 zoom">
            <a class="portfolio-box" href="../pages/page_repas.php">
              <img class="img-fluid rounded" src="./../img/portfolio/thumbnails/4.jpg" style="filter : blur(1.5px)">
              <div class="portfolio-box-caption  rounded">
                <div class="portfolio-box-caption-content ">
                  <div class="project-category text-faded">

                  </div>
                  <div class="project-name">
                  <h5 class="fsize police text-white">Repas</h5>
                  </div>
                </div>
              </div>
            </a>
          </div>
          <div class="col-lg-4"></div>
          <div class="col-lg-4 col-sm-6 my-1 mr-1 zoom">
            <a class="portfolio-box" href="../pages/page_materiel.php">
              <img class="img-fluid rounded " src="./../img/portfolio/thumbnails/m5.jpg" style="filter : blur(1.5px)">
              <div class="portfolio-box-caption rounded">
                <div class="portfolio-box-caption-content ">
                  <div class="project-category text-faded">

                  </div>
                  <div class="project-name">
                  <h5 class="fsize police text-white">Matériel</h5>
                  </div>
                </div>
              </div>
            </a>
          </div>
        </div>
      </div>
    </section>
    <br>

    <?php include_once("../includes/footer.php") ?>
  <?php } else {
    header("location:../error/error401.php");
  } ?>
