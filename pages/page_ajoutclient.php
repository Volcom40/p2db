<?php
  session_start();
  if($_SESSION["connect"] == "1"){?>
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
    <title>Page Ajout client</title>
  </head>

  <nav>
    <?php include_once("../includes/nav_bar.php") ?>
  </nav>

  <header class="text-center header imageplume">
    <h1>Ajout client</h1>
  </header>

  <body>
    <br>
    <ul class="nav nav-tabs nav-justified buble_tabs" role="tablist">
      <li class="nav-item">
        <a class="nav-link active police" href="#profile" role="tab" data-toggle="tab">Adulte</a>
      </li>
      <li class="nav-item">
        <a class="nav-link police" href="#buzz" role="tab" data-toggle="tab">Enfant</a>
      </li>
    </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active show" id="profile"><br><?php require_once("../includes/form/form_adulte.html") ?></div>
    <div role="tabpanel" class="tab-pane fade" id="buzz"><br><?php require_once("../includes/form/form_enfant.html") ?></div>
  </div>
  </body>

  <footer>
      <?php include_once("../includes/footer.php") ?>
  </footer>
</html>
<?php } else {
    header("location:../error/error401.php");
} ?>
