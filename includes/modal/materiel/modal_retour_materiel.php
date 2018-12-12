<!-- Modal -->
<div class="modal fade" id="retour_materiel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        <input type="hidden" name="etat" value="8">
            <input type="hidden" id="Mrid" name="id" value="">
            <div class="form-group">
              <label for="logement_materiel">État</label>
              <select class="form-control" id="Metat_materiel" name="etat_materiel" value="" required>
                <option value="0">Disponible</option>
                <option value="1">Hors Service</option>
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
