<?php require_once("../modules/bdd_util.php");
      require_once("../dao/repas_dao.php");
      ?>
<!-- Modal -->

<div class="modal fade " id="modal_AjoutFormule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bgcolor border-dark text-white">
      <div class="col-lg-2"></div>
        <h5 class="fsize mx-auto" id="exampleModalLongTitle">Menu Ajout Formules</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- lors du clic , envoie vers la page dao activite -->
      <form class="modal-body" action="./../php/switchcase_repas.php" method="POST">
      <!-- on attribue une valeur état pour différencier les modals -->
      <input type="hidden" name="etat" value="1">
        <!-- Placer ici les formulaire d'ajout des activités -->

        <div class="nom_formule">
          <h4 class="buble">Nom de la formule</h4>
          <div class="col-12">
            <input class="form-control" name="Fnom" type="text" placeholder="Nom de la Formule" value="" id="Fnom" required>
          </div>
        </div>
        <br>
        <h4 class="buble">Type de formule</h4>
        <div class="form-group col-12">
          <select class="form-control" id="Ftype_formule" name="Ftype_formule">
          <?php
          $typeformule = getAllTypeFormule();
          foreach ($typeformule as $row) {?>
          <option value="<?= $row["id_typeformule"] ?>"><?= $row["nom_typeformule"] ?></option>
          <?php
          }
          ?>
          </select>
        </div>
        <h4 class="buble">Plats</h4>
        <div class="form-group col-12">
          <div class="col-5 vertical">
            <label for="select_plat" class="buble">Accompagnement</label>
            <select class="form-control" id="plat_formule" name="plat_accompagne">
              <?php
              $typeplataccompagne = getAllPlatAccompagne();
              foreach ($typeplataccompagne as $row) {?>
              <option value="<?= $row["id_plat"] ?>"><?= $row["nom_plat"] ?></option>
              <?php
              }
              ?>
            </select>
          </div>
          <div class="col-1 vertical">
          </div>
          <div class="col-5 vertical align-right">
            <label for="select_plat" class="buble">Viande/Poisson/Oeuf</label>
            <select class="form-control" id="plat_formule" name="plat_viande">
              <?php
              $typeplatviande = getAllPlatViande();
              foreach ($typeplatviande as $row) {?>
              <option value="<?= $row["id_plat"] ?>"><?= $row["nom_plat"] ?></option>
              <?php
              }
              ?>
            </select>
          </div>
        </div>
        <h4 class="buble">Boisson</h4>
        <div class="form-group col-12">
            <select class="form-control" id="plat_formule" name="boisson">
            <?php
            $typeformule = getAllBoisson();
            foreach ($typeformule as $row) {?>
            <option value="<?= $row["id_boisson"] ?>"><?= $row["nom_boisson"] ?></option>
            <?php
            }
            ?>
            </select>
        </div>
        <div class="modal-footer">
        <input type="hidden" name="type" value="1">
        <button type="button" class=" btn btn-secondary btn-lg bgcolor border-dark  " data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-secondary btn-lg bgcolor border-dark  ">Valider l'ajout</button>
      </form>
      </div>
    </div>
    </div>
  </div>
</div>
