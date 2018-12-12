<?php
  require_once("../dao/user_dao.php");
  //Traitement des préférences
  if($_POST["type"] == "2"){
    $enfant = 0;
  }else {
    $enfant = 1;
  }
  switch ($_POST["type"]){
    case "1"://On va créer un client adulte, pour cela, on passe par plusieurs étapes
      $resultcon = ajoutconciergerie( $_POST["type"]);//On créer dans un premier temps, la partie conciergerie
      $resultinf = ajoutinfoadulte();//Puis la partie info_adulte
      $result = recuplastofconciergerie();//On récupére les deux derniers id qu'on a créer avec ajoutconciergerie et ajoutinfoadulte
      $value = $result[0];
      $idconciergerie = $value ["MAX(id_preference)"];
      $resultats = recuplastofinfo();
      $valeur = $resultats[0];
      $idinfo = $valeur ["MAX(id_info_adulte)"];
      $resultper = ajoutpersonne ($idconciergerie , $idinfo, $enfant);//Aprés avoir
      break;
    case "2"://On va créer un client enfant, pour cela, on repasse les mêmes étapes que si dessus, mais pour l'idinfo, qui sont les infos_adultes vaut NULL
      $resultcon = ajoutconciergerie( $_POST["type"]);//On créer dans un premier temps, la partie conciergerie, comme un adulte car un enfant est considérer comme étant un client
      $resultinf = NULL;//Cette fois si il vaut NULL car un enfant, n'a pas besoin d'infmortion adulte
      $result = recuplastofconciergerie();
      $value = $result[0];
      $idconciergerie = $value ["MAX(id_preference)"];
      $resultper = ajoutpersonne ($idconciergerie , NULL, $enfant);//Et on recommence la même chose
      break;
    default:
      break;
  }
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
      <title>Page Ajout client</title>
    </head>

    <nav>
      <?php include_once("../includes/nav_index.php") ?>
    </nav>

    <header class="text-center header imageplume">
      <h1>Résultat Ajout Client</h1>
    </header>

    <body class="text-center buble">
      <div class="container-fluid tailleconfirmation">

        <?php if($resultcon == false || $resultinf == false && $resultinf != NULL || $resultper == false ){
          // Ceci permet de voir si tous les "INSERT INTO" sont valide
        ?>
          <!-- Message d'erreur, qui est une card, et une seul  redirection possible -->
          <div class="card cardconfirm " style="width: 56rem;">
            <div class="card-body">
              <h5 class="card-title">Échec lors de la création.</h5>
              <p class="card-text">La création du client a échoué. Recommencez s'il vous plaît.</p>
              <a href="../pages/page_ajoutclient.php" class="btn btn-primary btn-sm  bgcolor border-dark">Revenir à Création Client.</a>
            </div>
          </div>
        <?php }else { ?>
          <!-- Message de réussite, qui est une card, et avec deux redirections possible -->
          <div class="card  cardconfirm" style="width: 56rem;">
            <div class="card-body">
              <h5 class="card-title">Réussite de la création.</h5>
              <p class="card-text">La création du client a réussi. Vous pouvez y accéder dès maintenant.</p>
              <a href="../pages/page_ajoutclient.php" class="btn btn-primary btn-sm  bgcolor border-dark">Revenir à Création Client.</a>
              <a href="../pages/page_accueil.php" class="btn btn-primary btn-sm bgcolor border-dark">Revenir à la page principale.</a>
            </div>
          </div>
        <?php } ?>
        </div>
      </div>
    </body>
    <footer>
      <?php include_once("../includes/footer.php") ?>
    </footer>
  </html>


  <?php
    function postonconciergerie() {
      $array = [
        "regime" => $_POST["regime"],
        "aimeaimepas" => $_POST["aimeaimepas"],
        "loisir" => $_POST["Ploisir"],
        "hdiner" => $_POST["hdiner"],
        "hdejeuner" => $_POST["hpetitdej"],
        "gouts" => $_POST["Pgout"],
        "arrive" => $_POST["darriver"],
        "depart" => $_POST["ddepart"],
        "attente" => $_POST["Attentes"],
        "raisonvenue" => $_POST["Praisonvenue"],
        "connaisance" => $_POST["Poriginevenue"]
      ];
      return $array;
    }
    function postonpersonne() {
      $array = [
        "nom" => $_POST["nom"],
        "prenom" => $_POST["prenom"]
      ];
      return $array;
    }
    function postoninfo_adulte() {
      $array = [
        "situation" => $_POST["situation"],
        "mail" => $_POST["mail"],
        "phone" => $_POST["phone"],
        "entreprise" => $_POST["profession"]
      ];
      return $array;
    }
    function postonconciergerie_enfant() {
      $array = [
        "regime" => $_POST["regime"],
        "aimeaimepas" => $_POST["aimeaimepas"],
        "loisir" => $_POST["Ploisir"],
        "hdiner" => $_POST["hdiner"],
        "hdejeuner" => $_POST["hpetitdej"],
        "gouts" => $_POST["Pgout"]
      ];
      return $array;
    }
  ?>
