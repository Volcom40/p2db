<?php
  session_start();
  if($_SESSION["connect"] == "1"){?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge" >
  <?php include_once("../dao/repas_dao.php");
        include_once("../modules/bdd_util.php");
        include_once("../includes/feuilledestyle.php");
        include_once("../includes/modal/repas/boissonmodal_modif.php");
        include_once("../includes/modal/repas/formulemodal_modif.php");
        include_once("../includes/modal/repas/platmodal_modif.php");
        include_once("../includes/modal/repas/include_modal_ajformule.php");
        include_once("../includes/modal/repas/include_modal_ajplat.php");
        include_once("../includes/modal/repas/include_modal_ajboisson.php")?>
  <link rel="stylesheet" href="../css/page_ajout.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="../css/style.css" type="text/css" media="screen" />
  <script src="./../js/repas.js"></script>
  <title>Page Repas</title>
</head>

<nav>
  <?php include_once("../includes/nav_bar.php") ?>
</nav>

<header class="text-center header imageplume">
    <h1>Page Repas</h1>
</header>

<body>
  <div class="container-fluid py-4 mx-auto" style="max-width: 1525px;">
    <div class="row">
      <div class="col-lg-2 ">
      </div>
      <div class="col-lg-8" >
        <div class="accordion" id="accordionExample">

          <!-- **************************Ajout formule, plat, boisson****************** -->

        <div class="accordion" id="accordionExample">
          <div class="card ">
            <div class="card-header " id="headingOne">
              <h5 class="mb-0 police">
                <div class="row">
                  <div class="col-lg-4 text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-target="#modal_AjoutFormule" data-toggle="modal"> <!-- //TODO id modal voulu -->
                    <h3 class="fa fa-plus-circle color"><span class="police text-center" >Ajouter Formule </span></h3>
                    </button>
                  </div>
                  <div class="col-lg-3 text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-target="#modal_AjoutPlat" data-toggle="modal">
                    <h3 class="fa fa-plus-circle color"><span class="police text-center" >Ajouter Plat</span></h3>
                    </button>
                  </div>
                  <div class="col-lg-4 text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" data-target="#modal_AjoutBoisson" data-toggle="modal">
                    <h3 class="fa fa-plus-circle color"><span class="police text-center" >Ajouter Boisson </span></h3>
                    </button>
                  </div>
            </div>
          </div>

          <!-- ***************************Liste des formules matin*************************** -->

          <div class="card">
            <div class="card-header" id="headingOne">
              <h5 class="mb-0 police">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false"
                  aria-controls="collapseOne">
                  <h3 class="fa fa-angle-down text-center color">
                    <span class="police">Liste des Formules Matin</span>
                  </h3>
                </button>
              </h5>
            </div>
            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
              <div class="card-body">
                <table class="table table">
                  <thead class="thead-light">
                    <tr>
                      <th>Formule</th>
                      <th>Plat</th>
                      <th>Boisson</th>
                      <th>Edité le</th>
                      <th>Options</th>
                    </tr>
                  </thead>
                  <?php $tableau = getFormuleMatin();
                  //Génération du tableau pour voir tous les clients.
                    if(count($tableau)>0){//Si la résultat de la recherche est vide, on affiche "Personne ne correspond"
                      foreach ($tableau as $recherche) {?>
                          <tr><!-- Model de chaques lignes du tableau -->
                          <th><?= $recherche["nom_formule"] ?></th>
                          <th><?= $recherche["nom_plat"] ?></th>
                          <th><?= $recherche["nom_boisson"] ?></th>
                          <th><?= date('d/m/Y', strtotime($recherche["date_formule"]))  ?></th>
                          <th>
                              <!-- Bouton pour le modal de modification du client -->
                              <button type="button" class="btn btn-default modal_modif_formule" aria-label="Left Align" data-target="#modalModif_formule" value="<?=$recherche["id_formule"]?>">
                              <span class="fa fa-wrench" aria-hidden="true"></span>
                              </button>
                              <!-- Bouton pour la supression du client  -->
                              <button type="button" class="btn btn-default delete_formule" aria-label="Left Align" value="<?=$recherche["id_formule"]?>">
                              <span class="fa fa-trash" aria-hidden="true"></span>
                              </button>
                          </th>
                          </tr>
                      <?php }} else { ?>
                      <tr>
                      <th colspan="5" style="text-align:center;">... Aucune Formule ...</th>
                      <tr>
                      <?php } ?>
                </table>
              </div>
            </div>
          </div>

          <!-- ****************************Liste des formules soir********************************* -->
          <div class="card">
            <div class="card-header" id="headingBis">
              <h5 class="mb-0 police">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseBis" aria-expanded="false"
                  aria-controls="collapseBis">
                  <h3 class="fa fa-angle-down text-center color">
                    <span class="police">Liste des Formules Soir</span>
                  </h3>
                </button>
              </h5>
            </div>
            <div id="collapseBis" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
              <div class="card-body">
                <table class="table table">
                  <thead class="thead-light">
                    <tr>
                      <th>Formule</th>
                      <th>Plat</th>
                      <th>Boisson</th>
                      <th>Edité le</th>
                      <th>Options</th>
                    </tr>
                  </thead>
                  <?php $tableau = getFormuleSoir();
                    if(count($tableau)>0){//Si la résultat de la recherche est vide, on affiche "Personne ne correspond"
                    foreach ($tableau as $recherche) {?>
                    <tr><!-- Model de chaques lignes du tableau -->
                    <th><?= $recherche["nom_formule"] ?></th>
                    <th><?= $recherche["nom_plat"] ?></th>
                    <th><?= $recherche["nom_boisson"] ?></th>
                    <th><?= date('d/m/Y', strtotime($recherche["date_formule"]))  ?></th>
                  <th>
                  <!-- Bouton pour le modal de modification du client -->
                  <button type="button" class="btn btn-default modal_modif_formule" aria-label="Left Align" value="<?=$recherche["id_formule"]?>">
                  <span class="fa fa-wrench" aria-hidden="true"></span>
                  </button>
                  <!-- Bouton pour la supression du client  -->
                  <button type="button" class="btn btn-default delete_formule" aria-label="Left Align" value="<?=$recherche["id_formule"]?>">
                  <span class="fa fa-trash" aria-hidden="true"></span>
                  </button>
              </th>
              </tr>
                <?php }} else { ?>
                <tr>
                <th colspan="5" style="text-align:center;">... Aucune Formule ...</th>
                <tr>
                <?php } ?>
                </table>
              </div>
            </div>
          </div>

          <!-- *********************************Liste des plats******************************* -->

          <div class="card">
            <div class="card-header" id="headingTwo">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                  aria-controls="collapseTwo">
                  <h3 class="fa fa-angle-down text-center color">
                    <span class="police">Liste des Plats</span>
                  </h3>
                </button>
              </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
              <div class="card-body">
                <table class="table table">
                  <thead class="thead-light">
                    <tr>
                      <th>Nom Plat</th>
                      <th>Type Plat</th>
                      <th>Options</th>
                    </tr>
                  </thead>
                  <?php $tableau = getAllPlat();
                      //Génération du tableau pour voir tous les clients.
                        if(count($tableau)>0){//Si la résultat de la recherche est vide, on affiche "Personne ne correspond"
                        foreach ($tableau as $recherche) {?>
                            <tr><!-- Model de chaques lignes du tableau -->
                            <th><?= $recherche["nom_plat"] ?></th>
                            <th><?= $recherche["nom_typeplat"] ?></th>
                            <th>
                                <!-- Bouton pour le modal de modification du client -->
                                <button type="button" class="btn btn-default modal_modif_plat" aria-label="Left Align" value="<?=$recherche["id_plat"]?>">
                                <span class="fa fa-wrench" aria-hidden="true"></span>
                                </button>
                                <!-- Bouton pour la supression du client  -->
                                <button type="button" class="btn btn-default delete_plat" aria-label="Left Align" value="<?=$recherche["id_plat"]?>">
                                <span class="fa fa-trash" aria-hidden="true"></span>
                                </button>
                            </th>
                            </tr>
                        <?php }} else { ?>
                        <tr>
                        <th colspan="5" style="text-align:center;">... Aucun Plat ...</th>
                        <tr>
                        <?php } ?>
                </table>
              </div>
            </div>
          </div>

          <!-- *********************************Liste des boissons************************ -->

          <div class="card">
            <div class="card-header" id="headingTrois">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapsetrois" aria-expanded="false"
                  aria-controls="collapsetrois">
                  <h3 class="fa fa-angle-down text-center color">
                    <span class="police">Liste des Boissons<span>
                  </h3>
                </button>
              </h5>
            </div>
            <div id="collapsetrois" class="collapse" aria-labelledby="headingtrois" data-parent="#accordionExample">
              <div class="card-body">
                <table class="table table">
                  <thead class="thead-light">
                    <tr>
                      <th>Nom Boisson</th>
                      <th>Boisson Alcoolisée</th>
                      <th>Options</th>
                    </tr>
                  </thead>
                  <?php $tableau = getAllBoisson();
                  //Génération du tableau pour voir tous les clients.
                  if(count($tableau)>0){//Si la résultat de la recherche est vide, on affiche "Personne ne correspond"
                    foreach ($tableau as $recherche) {?>
                        <tr><!-- Model de chaques lignes du tableau -->
                        <th><?= $recherche["nom_boisson"] ?></th>
                        <th><?php if($recherche["alcoolise"] == 1){
                            echo "Oui";
                        } else {
                            echo "Non";
                        }?></th>
                        <th>
                            <!-- Bouton pour le modal de modification du client -->
                            <button type="button" class="btn btn-default modal_modif_boisson" aria-label="Left Align" value="<?=$recherche["id_boisson"]?>">
                            <span class="fa fa-wrench" aria-hidden="true"></span>
                            </button>
                            <!-- Bouton pour la supression du client  -->
                            <button type="button" class="btn btn-default delete_boisson_confirm" aria-label="Left Align" value="<?=$recherche["id_boisson"]?>">
                            <span class="fa fa-trash" aria-hidden="true"></span>
                            </button>
                        </th>
                        </tr>
                    <?php }} else { ?>
                    <tr>
                    <th colspan="5" style="text-align:center;">... Aucune boisson ...</th>
                    <tr>
                    <?php } ?>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
      <div class="col-lg-2">
      </div>

  </div>
  </div></div>
</body>

<footer>
  <br><br><br><br><br><br><br><br><br><br><br>
  <?php include_once("../includes/footer.php") ?>
</footer>
<?php } else {
    header("location:../error/error401.php");
} ?>
