<!-- Modal -->
<div class="modal fade" id="transfert_materiel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bgcolor border-dark text-white">
        <h5 class="modal-title fsize mx-auto" id="exampleModalLabel">Transfert</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="modal-body">
        <form class="modal-body" action="./../php/switchcase_materiel.php" method="POST">
        <input type="hidden" name="etat" value="7">
            <input type="hidden" id="Mtid" name="id" value="">
            <div class="form-group">
              <label for="logement_materiel">Prêt pour ...</label>
              <select class="form-control" id="logement_materiel" name="pret_logement" required>
                  <?php
                    $logementlist = getlogement();
                    foreach ($logementlist as $roww) {?>
                       <option value="<?= $roww["id_logement"] ?>"><?= $roww["nom_logement"] ?></option>
                      <?php
                    }
                  ?>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Descriptif</label>
              <textarea class="form-control" id="descriptif_materiel" name="descriptif_materiel" rows="3" placeholder="....."></textarea>
            </div>
            <button type="button" class="btn btn-secondary buble" data-dismiss="modal">Fermer</button>
        <button type="input" class="btn btn-secondary btn-lg bgcolor border-dark">Valider le transfert</button>
          </form>
        </div>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>
