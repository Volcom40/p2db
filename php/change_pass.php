<?php
  require_once("../dao/login_dao.php");
  session_start();

  $pass = getpassword();
  if(count($pass) != 0){
    $localprofil = $pass[0];
    if($_POST["password1"] == $_POST["password2"] && password_verify($_POST['password'],$localprofil["pass_utilisateur"])){
      modifierPass(password_hash($_POST["password2"], PASSWORD_DEFAULT ));
      session_destroy();
      ?>
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
          <title>Page de changement de mot de passe</title>
        </head>

        <nav>
          <?php include_once("../includes/nav_index.php") ?>
        </nav>

        <header class="text-center header imageplume">
          <h1>Page de changement de mot de passe</h1>
        </header>

        <body class="text-center buble">
          <div class="container-fluid tailleajout">
              <!-- Message d'erreur, qui est une card, et une seul  redirection possible -->
              <div class="card cardconfirm " style="width: 56rem;">
                <div class="card-body">
                  <h5 class="card-title">Le mot de passe a été changé</h5>
                  <p class="card-text">Veuillez vous reconnecter</p>
                  <a href="../" class="btn btn-primary btn-sm  bgcolor border-dark">Page login</a>
                </div>
              </div>
            </div>
          </div>
        </body>
        <footer>
          <?php include_once("../includes/footer.php") ?>
        </footer>
      </html>
      <?php
      exit();
    } else {
      ?>
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
          <title>Page de changement de mot de passe</title>
        </head>

        <nav>
          <?php include_once("../includes/nav_index.php") ?>
        </nav>

        <header class="text-center header imageplume">
          <h1>Page de changement de mot de passe</h1>
        </header>

        <body class="text-center buble">
          <div class="container-fluid tailleajout">
              <!-- Message d'erreur, qui est une card, et une seul  redirection possible -->
              <div class="card cardconfirm " style="width: 56rem;">
                <div class="card-body">
                  <h5 class="card-title">Le mot de passe ,'a pas été changé</h5>
                  <p class="card-text">Veuillez recommencer !</p>
                  <a href="../pages/page_accueil.php" class="btn btn-primary btn-sm  bgcolor border-dark">Page d'accueil</a>
                </div>
              </div>
            </div>
          </div>
        </body>
        <footer>
          <?php include_once("../includes/footer.php") ?>
        </footer>
      </html>
      <?php
      exit();
    }
  }else{

    ?>
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
        <title>Page de changement de mot de passe</title>
      </head>

      <nav>
        <?php include_once("../includes/nav_index.php") ?>
      </nav>

      <header class="text-center header imageplume">
        <h1>Page de changement de mot de passe</h1>
      </header>

      <body class="text-center buble">
        <div class="container-fluid tailleajout">
            <!-- Message d'erreur, qui est une card, et une seul  redirection possible -->
            <div class="card cardconfirm " style="width: 56rem;">
              <div class="card-body">
                <h5 class="card-title">Le mot de passe n'a pas été changé</h5>
                <p class="card-text">Veuillez recommencer !</p>
                <a href="../pages/page_accueil.php" class="btn btn-primary btn-sm  bgcolor border-dark">Page d'accueil</a>
              </div>
            </div>
          </div>
        </div>
      </body>
      <footer>
        <?php include_once("../includes/footer.php") ?>
      </footer>
    </html>

    <?php
    exit();
  }
?>
