<?php require_once("../modules/bdd_util.php");
      require_once("../dao/repas_dao.php");
      ?>
<!-- Modal -->

<div class="modal fade " id="modalModif_formule" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bgcolor border-dark text-white">
      <div class="col-lg-2"></div>
        <h5 class="fsize mx-auto" id="exampleModalLongTitle">Modification Formules</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="modal-body" action="./../php/switchcase_repas.php" method="POST">

        <div class="nom_formule">
          <h4 class="buble">Nom de la formule</h4>
          <div class="col-12">
            <input class="form-control" name="Fnom" type="text" placeholder="Nom de la Formule" value="" id="Mnom_formule" required>
          </div>
        </div>
        <br>
        <h4 class="buble">Type de formule</h4>
        <div class="form-group col-12">
          <select class="form-control" id="Mtype_formule" name="Ftype_formule">
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
            <select class="form-control" id="Maccompagne_formule" name="plat_accompagne">
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
            <select class="form-control" id="Mviande_formule" name="plat_viande">
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
            <select class="form-control" id="Mboisson_formule" name="boisson">
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
        <input type="hidden" name="type" value="9">
        <input type="hidden" name="Mid_formule" id="Mid_formule" value="">
        <input type="hidden" name="Mid_accompagne" id="Mid_accompagne" value="">
        <input type="hidden" name="Mid_viande" id="Mid_viande" value="">
        <input type="hidden" name="Mid_boisson" id="MFid_boisson" value="">
        <button type="button" class=" btn btn-secondary btn-lg bgcolor border-dark  " data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-secondary btn-lg bgcolor border-dark  ">Sauvegarder la modification</button>
      </form>
      </div>
    </div>
    </div>
  </div>
</div>
