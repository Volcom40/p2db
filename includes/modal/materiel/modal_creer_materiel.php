<?php require_once("../dao/materiel_dao.php");?>
<!-- Modal -->
<div class="modal fade" id="creer_materiel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bgcolor border-dark text-white">
        <h5 class="modal-title fsize mx-auto" id="exampleModalLabel">Créer matériel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- lors du clic , envoie vers la page dao activite -->
        <form class="modal-body" action="./../php/switchcase_materiel.php" method="POST">
          <!-- on attribue une valeur état pour différencier les modals -->
          <input type="hidden" name="etat" value="1">
          <div class="form-group">
            <label for="exampleFormControlInput1">Nom Du Matériel</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Materiel" required name="nom_materiel">
          </div>
          <div class="form-group">
            <label for="type_materiel">Type De Matériel</label>
            <select class="form-control" id="type_materiel" name="type_materiel" required>
            <?php
              $typemateriel = getalltypemateriel();
            foreach ($typemateriel as $row) {?>
             <option value="<?= $row["id_type_materiel"] ?>"><?= $row["type_typemateriel"] ?></option>
            <?php
            }
            ?> 
            </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Descriptif</label>
            <textarea class="form-control" id="descriptif_materiel1" rows="3" placeholder="....." name="descriptif_materiel"></textarea>
          </div>

          <button type="button" class="btn btn-secondary buble" data-dismiss="modal">Fermer</button>
          <button type="submit" class="btn btn-secondary btn-lg bgcolor border-dark">Ajouter Matériel</button>
        </form>
      </div>
      <div class="modal-footer">

      </div>

    </div>
  </div>
</div>
