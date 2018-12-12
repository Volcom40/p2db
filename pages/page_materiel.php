<?php
  session_start();
  if($_SESSION["connect"] == "1"){?>
<!DOCTYPE html>
<html>

<head>
    <title>Page Matériel</title>
    <?php require_once("../includes/feuilledestyle.php") ?>
    <?php require_once("../includes/modal/materiel/modal_creer_materiel.php") ?>
    <?php require_once("../includes/modal/materiel/modal_modification_materiel.html") ?>
    <?php require_once("../includes/modal/materiel/modal_transfert_materiel.php") ?>
    <?php require_once("../includes/modal/materiel/modal_retour_materiel.php") ?>
    <?php require_once("../includes/modal/materiel/modal_creer_logement.html") ?>
    <?php require_once("../includes/modal/materiel/modal_creer_type_materiel.html") ?>
    <?php include_once("../modules/bdd_util.php");?>
    <?php require_once("../dao/materiel_dao.php");?>
    <script type="application/javascript" src="../js/materiel.js"></script>
    <link href="../css/style.css" rel="stylesheet"> 
    </nav>
</head>

<nav>
    <?php include_once("../includes/nav_bar.php") ?>


    <header class="text-center header imageplume">
        <h1>Page Matériel</h1>
    </header>

    <body>
        <div class="container">
            <br>
            
            <div class="col-lg-12 card bg-light">
            <div class="row">
                <div class="col-lg-7 d-flex justify-content-center border-bottom">
                    <button type="button" class="close" data-dismiss="modal" data-toggle="modal" data-target="#creer_materiel">
                        <h3 class="fa fa-plus-circle color m-3">
                            <span class="police text-center">Ajouter Matériel </span>
                        </h3>
                    </button>
                </div>
                <div class="col-lg-5 d-flex justify-content-center border-bottom">
                <button type="button" class="close" data-dismiss="modal" data-toggle="modal" data-target="#creer_logement">
                        <h3 class="fa fa-plus-circle color m-3 ">
                            <span class="police text-center">Ajouter Logement </span>
                        </h3>
                    </button>
                </div>
            </div>
            <!--  -->
                <div class="row">
                    <br>
                    <div class="col-lg-7 card" style="">
                        <br>
                        <h3 class="text-center police">Liste du matériel non prêté </h3>
                        <br>
                        <div id="accordion">
                            <?php
                        //fonction qui permet l'ajout dynamique des menus, le compteur sert à différencier ces menus
              $typemateriel = getalltypemateriel();
              $compteur = 1;
              foreach ($typemateriel as $row) {
                $compteur = $compteur +1;
                ?>
                        <div class="card">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link " data-toggle="collapse" data-target="#<?= $compteur ?>" aria-expanded="false" aria-controls="collapseOne">
                                        <h3 class="fa fa-angle-down text-center color">
                                            <span class="police">Matériels <?= $row["type_typemateriel"] ?></span>
                                        </h3>
                                    </button>
                                </h5>
                            </div>

                                <div id="<?= $compteur ?>" class="collapse" aria-labelledby="<?="heading".$row["id_type_materiel"] ?>" data-parent="#accordion">
                                    <div class="card-body">
                                        <table class="table table">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Matériel</th>
                                                    <th>Disponibilité</th>
                                                    <th>Descriptif</th>
                                                    <th>Options</th>
                                                </tr>
                                            </thead>
                                            <?php
                        $contenumenu = showmenus(strval($row["id_type_materiel"]));
                        if( count($contenumenu) > 0){
                          foreach ($contenumenu as $col) {
                            ?>
                                            <tr>
                                                <th>
                                                    <?= $col["nom_materiel"] ?>
                                                </th>
                                                <th>
                                                    <?php if($col["etat_materiel"] == 0){
                                                    ?>
                                                    <span class="green police cover" style="">Disponible....</span>
                                                    <?php }
                                                    if($col["etat_materiel"] == 1){
                                                    ?>
                                                    <span class="red police">Hors service</span>
                                                    <?php
                                                    }
                                                      ?>
                                                </th>
                                                <th>
                                                    <?= $col["descriptif_materiel"] ?>
                                                </th>
                                                <th>
                                                    <!-- Bouton pour la supression activite  -->
                                                    <button type="button" class="btn btn-default delete_confirm" aria-label="Left Align" value="<?=$col["id_materiel"]?>">
                                                        <span class="fa fa-trash" aria-hidden="true"></span>
                                                    </button>
                                                    <!-- Bouton pour la modification de l'activite -->
                                                    <button type="button" class="btn btn-default modal_modif_materiel" aria-label="Left Align" data-toggle="modal" value="<?=$col["id_materiel"]?>">
                                                        <span class="fa fa-wrench" aria-hidden="true"></span>
                                                    </button>
                                                    <!-- Bouton pour le visuel de la fiche activite -->
                                                    <?php if($col["etat_materiel"] == 0){?>
                                                    <button type="button" class="btn btn-default modal_transfert" aria-label="Left Align" data-target="#transfert_materiel" data-toggle="modal"
                                                        value="<?=$col["id_materiel"]?>" >
                                                        <span class="fas fa-angle-double-right" aria-hidden="true"></span>
                                                    </button>
                                                    <?php } else {
                                                        # code...
                                                    } ?>
                                                </th>
                                            </tr>
                                            <?php
                          }}
                          else {
                            ?>
                                            <thead class="thead-danger">
                                                <tr>
                                                    <th class="text-center police" colspan="5">... Pas de materiel ...</th>
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
                    <br></div>
                <div class="col-lg-5 card">
                        <br>
                    <h3 class="text-center police"> <b>Liste du matériel prêté</b>  </h3>
                        <?php $typelogement = getalltypelogement();
                                    $compteurlogement = 10000;
                                    foreach ($typelogement as $rows) {
                                        $compteurlogement = $compteurlogement +1;
                                        ?>
                        <div class="panel-group" id="accordion2">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <br>

                                    <h4 class="panel-title bg-light">


                                        <a data-toggle="collapse"  href="#<?= $compteurlogement ?>" class="police m-3 ">
                                            <?= $rows["nom_logement"] ?> </a>
                                        <button type="button" class="far fa-times-circle color btn float-right delete_logement bg-light" name="delet" value="<?=$rows["id_logement"]?>">
                                        </button>

                                    </h4>
                                </div>
                                <div id="<?= $compteurlogement ?>" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <table class="table table">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Matériel</th>
                                                    <th>Descriptif</th>
                                                    <th>Option</th>
                                                </tr>

                                                <tr>
                                                <?php
                                                    $contenumenuloc = showtransfert(strval($rows["id_logement"]));
                                                    if( count($contenumenuloc) > 0){
                                                      foreach ($contenumenuloc as $colonne) {
                                                ?>
                                            <tr>
                                                <th>
                                                    <?= $colonne["nom_materiel"] ?>
                                                </th>
                                                <th>
                                                    <?= $colonne["descriptif_materiel"] ?>
                                                </th>
                                                    <th>
                                                        <!-- Bouton pour le visuel de la fiche activite -->
                                                        <button type="button" class="btn btn-default modal_retour" aria-label="Left Align" data-target="#retour_materiel" value="<?=$colonne["id_materiel"]?>" data-toggle="modal">
                                                            <span class="fas fa-angle-double-left" aria-hidden="true"></span>
                                                        </button>


                                                  <?php   }} else { ?>
                                                    <thead class="thead-danger">
                                                        <tr>
                                                            <th class="text-center" colspan="3">... Pas de matériel ...</th>
                                                        </tr>
                                                    </thead>
                                                  <?php } ?>

                                                    </th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>

                            </div></div>
                        <?php } ?></div>
                    </div>
                  </div><br>
                </div>
        <br>
    </body>
<br>
<br>
<br>
<br>
<br>
<br>
    <footer>
        <br><br><br><br><br><br><br><br><br>
        <?php include_once("../includes/footer.php"); ?>
    </footer>
  <?php } else {
    header("location:../error/error401.php");
  } ?>
