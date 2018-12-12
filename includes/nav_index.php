<nav class="navbar navbar-expand-md navbar-light bg-light ">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar1">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand fas fa-home " href="page_accueil.php">  Accueil</a>
  <div class="collapse navbar-collapse" id="navbar1">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
      <a class="fa fa-power-off nav-link" href="../php/disconnect.php" style="">  Déconnexion </a> <br>
      <a class="fas fa-cogs nav-link" data-target=".param-modal" data-toggle="modal" href="#" style="">  Paramètre </a>
      </li>
    </ul>
  </div>
</nav>
<?php require_once("../includes/modal/modal_motdepasse.html") ?>
