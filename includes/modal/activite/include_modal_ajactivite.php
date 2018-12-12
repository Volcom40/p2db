<?php require_once("../modules/bdd_util.php");
      require_once("../dao/activite_dao.php");
      ?>
<!-- Modal qui permet d'acceder à l'ajout d'activité, directement par le biais du bouton 
ajouter activité -->

<div class="modal fade " id="modalajout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bgcolor border-dark text-white">
        <div class="col-lg-2"></div>
        <h5 class="fsize mx-auto" id="exampleModalLongTitle">Menu Ajout Activité</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- lors du clic , envoie vers la page dao activite -->
      <form class="modal-body" action="./../php/redirection_activite.php" method="POST">
        <!-- on attribue une valeur état pour différencier les modals -->
        <input type="hidden" name="etat" value="1">
        <!-- Placer ici les formulaire d'ajout des activités -->


        <div class="form-group">
          <div class="row">
            <div class="col-6">
              <label for="example-text-input" class="col-2 col-form-label">Activité</label>
              <input class="form-control" name="nom_activite" type="text" placeholder="Nom de l'activité" value="" id="example-text-input"
                required>

            </div>
            <div class="col-6">
              <label for="selectsecteur">Secteur d'Activité</label>
              <select class="form-control" id="selectsecteur" name="secteur_activite" required>
                <?php
                      $typeactivite = getalltypeactivite();
                      foreach ($typeactivite as $row) {?>
                <option value="<?= $row["id_type_activite"] ?>">
                  <?= $row["secteur_activite"] ?> 
                </option>
                <?php
            }
            ?>
              </select>

            </div>
          </div>
          <br>
          <div class="row border-top">
            <div class="col-6">
              <label for="tel" class="col-4 col-form-label"> Adresse</label>
              <textarea class="form-control" type="text" rows="2" value="" id="adresse" name="adresse_activite" required></textarea>
            </div>
            <div class="col-6 ">
              <label for="tel" class=" col-form-label"> Ville</label>
              <input class="form-control" type="text" value="" id="ville" name="ville_activite" required>
            </div>
          </div>
            <br>
          <div class="row border-top">
            <div class="col-6">
              <label for="tel" class=" col-form-label"> Numéro de téléphone</label>
              <input class="form-control" type="text" id="tel" name="tel_activite">
            </div>
            <div class="col-6">
              <label for="example-email-input" class="col-form-label">Email</label>
              <input class="form-control" type="email" value="" id="example-email-input" name="mail_activite">
            </div>
          </div>
          <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                  <label for="example-url-input" class=" col-form-label">URL</label>
                  <input class="form-control" type="url" value="" id="example-url-input" name="url_activite">
              </div>
          </div>
          
        

              <br>
            <div class="row border-top">
              <div class="col-12">
                <label for="exampleTextarea">Descriptif de l'activité</label>
                <textarea class="form-control" id="exampleTextarea" rows="3" required name="descriptif_activite"></textarea>
              </div>
            </div>
          </div>
        <div class="modal-footer">
          <button type="button" class=" btn btn-secondary buble " data-dismiss="modal">Fermer</button>
          <button type="submit" class="btn btn-secondary btn-lg bgcolor border-dark  ">Valider l'ajout</button>
        </div>
      </form> 
    </div>
  </div>
</div>