<?php require_once("../modules/bdd_util.php");
      require_once("../dao/repas_dao.php");
      ?>
<!-- Modal -->

<div class="modal fade " id="modal_AjoutPlat" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bgcolor border-dark text-white">
      <div class="col-lg-2"></div>
        <h5 class="fsize mx-auto" id="exampleModalLongTitle">Menu Ajout Plat</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- lors du clic , envoie vers la page dao activite -->
      <form class="modal-body" action="./../php/switchcase_repas.php" method="POST">
      <!-- on attribue une valeur état pour différencier les modals -->
      <input type="hidden" name="etat" value="2">
        <!-- Placer ici les formulaire d'ajout des activités -->

        <div class="form-group row">
          <label for="example-text-input" class="col-2 col-form-label">Plat</label>
          <div class="col-12">
            <input class="form-control" name="nom_plat" type="text" placeholder="Nom du Plat" value="" id="Nplat" required>
          </div>
        </div>
        <div class="form-group">
            <label for="selectsecteur">Type Plat</label>
            <select class="form-control" id="Ptype_plat" name="type_plat">
            <?php
            $typeplat = getAllTypePlat();
            foreach ($typeplat as $row) {?>
            <option value="<?= $row["id_typeplat"] ?>"><?= $row["nom_typeplat"] ?></option>
            <?php
            }
            ?>
            </select>
        </div>
        <div class="modal-footer">
          <input type="hidden" name="type" value="6">
          <button type="button" class=" btn btn-secondary buble" data-dismiss="modal">Fermer</button>
          <button type="submit" class="btn btn-secondary btn-lg bgcolor border-dark  ">Valider l'ajout</button>
          </form>
      </div>
    </div>
    </div>
  </div>
</div>
