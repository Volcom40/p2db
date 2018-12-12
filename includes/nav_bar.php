<?php
      // On recupere l'URL de la page pour ensuite affecter class = "active" aux liens de nav
      function presence($cible){
        $page = $_SERVER['REQUEST_URI'];
        if(strpos($page, $cible)){
          echo "active";
        }else{
          return;
        }
      }
?>
<nav class="navbar navbar-expand-md navbar-light bg-light ">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar1">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand fas fa-home " href="page_accueil.php">  Accueil</a>
  <div class="collapse navbar-collapse" id="navbar1">
    <ul class="navbar-nav">
      <!-- On vérifie a chaque fois si on est sur la bonne page ou non, si oui on fait un echo "active" -->
      <li class="nav-item nav-item border border-dark border-bottom-0 border-top-0 <?php presence("page_ajoutclient.php")?>" >
        <a class="nav-link" href="page_ajoutclient.php">Ajouter compte</a>
      </li>
      <li class="nav-item border border-dark border-bottom-0 border-top-0 border-left-0 <?php presence("page_rechercheclient.php")?>" >
        <a class="nav-link" href="page_rechercheclient.php">Recherche Compte</a>
      </li>
       <li class="nav-item nav-item border border-dark border-bottom-0 border-top-0 border-left-0 <?php presence("page_activite.php")?>" >
        <a class="nav-link" href="page_activite.php">Activité</a>
      </li>
      <li class="nav-item nav-item border border-dark border-bottom-0 border-top-0 border-left-0 <?php presence("page_repas.php")?>" >
       <a class="nav-link" href="page_repas.php">Repas</a>
     </li>
     <li class="nav-item nav-item border border-dark border-bottom-0 border-top-0 border-left-0 <?php presence("page_materiel.php")?>" >
        <a class="nav-link" href="page_materiel.php">Matériel</a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
      <a class="fa fa-power-off nav-link" href="../php/disconnect.php" style="">  Déconnexion </a> <br>
      <a class="fas fa-cogs nav-link" data-target=".param-modal" data-toggle="modal" href="#" style="">  Paramètre </a>
      </li>
    </ul>
  </div>
</nav>
<!-- On importe le modal pour les mot de passe afin de ne pas le réecrire sur chaque page -->
<?php require_once("../includes/modal/modal_motdepasse.html") ?>
