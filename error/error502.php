<!DOCTYPE html>

<head>
  <html>
  <title>Erreur</title>
  <?php include_once("../includes/header.php") ?>
  <?php require_once("../includes/feuilledestyle.php") ?>
  <link rel="stylesheet" href="./../css/error_page.css" type="text/css" media="screen" />
</head>

<!-- Header avec texte et image  -->
<header style="background-color: #f8f9fa">
  <header class="text-center header imageplume">
    <!-- Mauvaise passerelle -->
    <h1>Erreur 502</h1>
  </header>
</header>

<body>
  <br>
  <br>
  <div class="card  cardconfirm" style="width: 56rem;">
    <div class="card-body">
      <div class="col-lg-12 card border-light">
        <h5 class="card-title text-center">Mauvaise passerelle.</h5>
        <a href="./../pages/page_accueil.php" class="justify-content-center mx-auto">
          <button class="btn btn-primary bgcolor border-dark justify-content-center mx-auto">Revenir à la page principale.</button>
        </a>
      </div>
    </div>
    <div class="logo"></div>
    <br>
  </div>
</body>
<br>
<br>
<br>
<br>
<?php include_once("../includes/footer.php") ?>

</html>