<?php
  session_start();
  if($_SESSION["connect"] == "1"){?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <?php include_once("../includes/feuilledestyle.php"); ?>
  <?php include_once("../includes/modal/activite/include_modal_ajactivite.php"); ?>
  <?php include_once("../includes/modal/activite/include_modal_typeactivite.php"); ?>
  <?php include_once("../includes/modal/activite/include_modal_activite.php"); ?>
  <?php include_once("../includes/modal/activite/include_modal_modif.html"); ?>
  <?php include_once("../modules/bdd_util.php");?>
  <?php require_once("../dao/activite_dao.php");?>
  <script type="application/javascript" src="../js/activity.js" ></script>
  <link rel="stylesheet" href="../css/style.css" type="text/css" media="screen" />
  <title>Page Activité </title>
</head>
<nav>
  <?php include_once("../includes/nav_bar.php") ?>
</nav>
<header>
  <header class="text-center header imageplume">
    <h1>Gestion d'activité</h1>
  </header>
</header>

<body>
  <div class="container-fluid tailleajout ">
    <br>
    <div class="row">
      <div class="col-lg-2 ">
      </div>
      <div class="col-lg-8" >
        <div class="accordion" id="accordionExample">
          <div class="card" style="min-height: 640px;">
            <div class="card-header" id="headingOne">
              <h5 class="mb-0 police">
                <div class="row">
                  <div class="col-lg-4 ">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-target="#modalajout" data-toggle="modal">
                    <h3 class="fa fa-plus-circle color"><span class="police text-center" >Ajouter activité </span></h3>
                    </button>
                  </div>
                  <div class="col-lg-5 ">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#modaltype">
                    <h3 class="fa fa-plus-circle color"><span class="police text-center" >Ajouter type activité </span></h3>
                    </button>
                  </div>
                  <!-- <div class="col-lg-4 ">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <h3 class="fa fa-cloud d-block mx-auto color text-center"><span class="police text-center" data-toggle="modal" data-target="#modalimp">Imprimer liste </span></h3>
                    </button>
                  </div> -->
            </div>
          </div>
            <?php
              $typeactivite = getalltypeactivite();
              $compteur = 1;
              foreach ($typeactivite as $row) {
                $compteur = $compteur +1;
                ?>
                <div class="card ">
              <div class="card-header " id= "heading ">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#<?= $compteur ?>" aria-expanded="false"aria-controls="collapseTwo">
                    <h3 class="fa fa-angle-down text-center color"> <span class="police">Liste des Activités <?= $row["secteur_activite"] ?></span></h3>
                  </button>
                  <button type="button" class="far fa-times-circle color btn float-right modal_delet_type_activite bg-light" id="modal_delet_type_activite" name="delet" value="<?=$row["id_type_activite"]?>">
                </h5>
              </div>
              <div id="<?= $compteur ?>" class="collapse" aria-labelledby="<?="heading".$row["id_type_activite"] ?>" data-parent="#accordionExample">
                <div class="card-body">
                  <table class="table table">
                    <thead class="thead-light">
                      <tr>
                        <th>Activité</th>
                        <th>Télephone</th>
                        <th>Ville</th>
                        <th>Edité le</th>
                        <th>Options</th>
                      </tr>
                    </thead>
                      <?php
                        $contenumenu = showmenus(strval($row["id_type_activite"]));
                        if( count($contenumenu) > 0){
                          foreach ($contenumenu as $col) {
                            ?>
                                <tr>
                                  <th><?= $col["nom_activite"] ?></th>
                                  <th><?= $col["tel_activite"] ?></th>
                                  <th><?= $col["ville_activite"] ?></th>
                                  <th><?= date('d/m/Y', strtotime($col["date_activite"]))   ?></th>
                                  <th>
                                    <!-- Bouton pour la modification de l'activite -->
                                    <button type="button" class="btn btn-default modal_modif" aria-label="Left Align" data-target="#modal_modif" data-toggle="modal" value="<?=$col["id_activite"]?>">
                                        <span class="fa fa-wrench" aria-hidden="true"></span>
                                      </button>
                                      <!-- Bouton pour le visuel de la fiche activite -->
                                      <button type="button" class="btn btn-default modal_look" aria-label="Left Align" data-target="#modal_look" value="<?=$col["id_activite"]?>">
                                        <span class="fa fa-eye" aria-hidden="true"></span>
                                      </button>
                                      <!-- Bouton pour la supression activite  -->
                                      <button type="button" class="btn btn-default delete_confirm" aria-label="Left Align" value="<?=$col["id_activite"]?>">
                                        <span class="fa fa-trash" aria-hidden="true"></span>
                                      </button>
                                 </th>
                                </tr>
                       <?php
                          }}
                          else {
                            ?>
                             <thead class="thead-danger">
                                <tr>
                                  <th class="text-center" colspan="5">... Pas d'activité ...</th>
                                </tr>
                              </thead>
                            <?php
                          }
                      ?>
                  </table>
                </div>
              </div>
            </div>
              <?php } 
            ?>
        </div>
      </div>

      <div class="col-lg-2">
      </div>
    </div>
  </div>
  </div>
</body>
<footer>
  <br> 
  <?php include_once("../includes/footer.php") ?>
</footer>
</html>
<?php } else {
    header("location:../error/error401.php");
} ?>
