<?php
  session_start();
  if($_SESSION["connect"] == "1"){
    require_once("../dao/search_dao.php");
  ?>
<!DOCTYPE html>
<!-- Code by P2DB/IN'TECH GRAND DAX 2018 -->
<html>
  <head>
    <!-- Importation des feuilles incluant bootstrap et jquery -->
    <?php include_once("../includes/feuilledestyle.php") ?>
    <title>Page Recherche Client</title>
    <meta charset="utf-8" />
    <script type="text/javascript" src="../modules/tableExport/tableExport.js"></script>
    <script type="text/javascript" src="../modules/tableExport/jquery.base64.js"></script>
    <script type="text/javascript" src="../modules/jsPDF/dist/jspdf.min.js"></script>
    <script type="text/javascript" src="../modules/jsPDF/dist/jspdf.debug.js"></script>
    <script type="text/javascript" src="../modules/jQuery.print.js"></script>
  </head>

  <nav>
    <!--Importation de la navbar de l'application-->
    <?php include_once("../includes/nav_bar.php") ?>
  </nav>

  <header class="text-center header imageplume">
    <h1>Recherche client</h1>
  </header>

  <body>
    <br>
    <div class="container taille">
    <!-- Mise en place de la recherche de contenu dans la base de donnée ( personne ) -->
      <form class="col-md-8 form-group mx-auto d-block" method="post">
              <input type="search" class="input-sm form-control" placeholder="Recherche Client " name="rechercher">
              <br>
              <!-- Index permettant de selectionner l'objet de la recherche, de base et si rien n'est sélectionner, c'est une recherche par nom -->
              <label class="radio-inline">
                <input type="radio" name="select" value="nom_personne" checked>Nom
              </label>
              <label class="radio-inline">
                <input type="radio" name="select" value="prenom_personne">Prénom
              </label>
              <select class="form-control col-2 vertical" name="age">
                  <option selected>Tous</option>
                  <option value="1">Adulte</option>
                  <option value="0">Enfant</option>
              </select>
              <button type="submit" class="btn btn-primary btn-sm float-right bgcolor border-dark">Nouvelle Recherche</button>
              <button type="submit" class="btn btn-primary btn-sm float-right bgcolor border-dark mr-2">Chercher</button>
              <button type="reset" class="btn btn-primary btn-sm float-right bgcolor border-dark mr-2 export_all_mail">Exporter clients</button>
              <br><br>
        </form>
          <?php
             $recherches = init_search($_POST);?>
            <table class="table table" id="table">
                <thead class="thead-light">
                  <tr><!-- Premiére ligne descriptive -->
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>Sexe</th>
                    <th>Enfant</th>
                    <th>Groupe</th>
                    <th>Options</th>
                  </tr>
                </thead>
               <?php
               //Génération du tableau pour voir tous les clients.
                  if(count($recherches)>0){//Si la résultat de la recherche est vide, on affiche "Personne ne correspond"
                    foreach ($recherches as $recherche) {?>
                      <tr><!-- Model de chaques lignes du tableau -->
                        <td><?= $recherche["prenom_personne"] ?></td>
                        <td><?= $recherche["nom_personne"] ?></td>
                        <td><?= $recherche["sexe_personne"] ?></td>
                        <td><?php
                          if($recherche["enfant"] == NULL || $recherche["enfant"] == 1) {
                            echo "Non";
                          } else {
                            echo "Oui";
                          }
                          ?></td>
                        <td> </td>
                        <td>
                          <?php if($recherche["enfant"] == NULL || $recherche["enfant"] == 1)  {?>
                            <!-- Bouton pour le modal de modification du client -->
                            <button type="button" class="btn btn-default modalModif_adulte" aria-label="Left Align" value="<?=$recherche["id_personne"]?>">
                              <span class="fa fa-wrench" aria-hidden="true"></span>
                            </button>
                            <!-- Bouton pour le visuel de la fiche du client -->
                            <button type="button" class="btn btn-default modalLook_adulte" aria-label="Left Align" value="<?=$recherche["id_personne"]?>">
                              <span class="fa fa-eye" aria-hidden="true"></span>
                            </button><?php } else { ?>
                              <!-- Bouton pour le modal de modification du client -->
                              <button type="button" class="btn btn-default modalModif_enfant" aria-label="Left Align" value="<?=$recherche["id_personne"]?>">
                                <span class="fa fa-wrench" aria-hidden="true"></span>
                              </button>
                              <!-- Bouton pour le visuel de la fiche du client -->
                              <button type="button" class="btn btn-default modalLook_enfant" aria-label="Left Align" value="<?=$recherche["id_personne"]?>">
                                <span class="fa fa-eye" aria-hidden="true"></span>
                                </button>
                          <?php } ?>
                          <!-- Bouton pour la supression du client  -->
                          <button type="button" class="btn btn-default delete_confirm" aria-label="Left Align" value="<?=$recherche["id_personne"]?>">
                            <span class="fa fa-trash" aria-hidden="true"></span>
                          </button>
                        </td>
                      </tr>
                  <?php }} else{ ?>
                  <tr>
                    <th colspan="6" style="text-align:center;"> Personne ne correspond </th>
                  <tr>
                    <?php } ?>
                    <script type="text/javascript" src="./../js/search.js">
                      //Appel du jquery pour les appel ajax + ouverture des modaux

                    </script>
            </table>
            <!-- Include des deux modals pour la modif et visuel du client -->
            <?php include_once("../includes/modal/search/searchmodal_modif_enfant.php");
                  include_once("../includes/modal/search/searchmodal_modif_adulte.php");
                  include_once("../includes/modal/search/searchmodal_look_adulte.html");
                  include_once("../includes/modal/search/searchmodal_look_enfant.html");
                  include_once("../includes/modal/search/searchmodal_look_mail.php");?>
      </div>
  </body>
  <footer>
      <?php include_once("../includes/footer.php") ?>
  </footer>
</html>
<?php } else {
    header("location:../error/error401.php");
} ?>
