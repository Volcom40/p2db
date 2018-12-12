<?php
  session_start();
  session_destroy();
  ?>
  <!-- Page de confirmation -->
  <!DOCTYPE html>
  <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <?php
        include_once("../modules/bdd_util.php");
        include_once("../includes/feuilledestyle.php");
      ?>
      <link rel="stylesheet" href="../css/page_ajout.css" type="text/css" media="screen" />
      <title>Page déconnexion</title>
    </head>

    <nav>
      <?php include_once("../includes/nav_index.php") ?>
    </nav>

    <header class="text-center header imageplume">
      <h1>Page de déconnexion</h1>
    </header>

    <body class="text-center buble">
      <div class="container-fluid tailleajout">
          <!-- Message d'erreur, qui est une card, et une seul  redirection possible -->
          <div class="card cardconfirm " style="width: 56rem;">
            <div class="card-body">
              <h5 class="card-title">Vous avez été déconnecté.</h5>
              <p class="card-text">Vous pouvez maintenant vous connecter ou fermer le site.</p>
              <a href="../" class="btn btn-primary btn-sm  bgcolor border-dark">Page login</a>
            </div>
          </div>
        </div>
      </div>
    </body>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <footer>
      <?php include_once("../includes/footer.php") ?>
    </footer>
  </html>
