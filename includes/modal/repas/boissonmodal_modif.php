<link rel="stylesheet" href="../css/modal.css" type="text/css" media="screen" />
      <div class="modal fade" id="modalModif_boisson" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-border " role="document">
          <div class="modal-content">
            <div class="modal-header bgcolor border-dark text-white">
              <h2 class="modal-title fsize mx-auto " id="exampleModalLongTitle ">Modification Boisson</h2>
              <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form class="modal-body" action="./../php/switchcase_repas.php" method="POST">
              <div class="form-group row">
                <label for="example-text-input" class="col-2 col-form-label">Boisson</label>
                <div class="col-12">
                  <input class="form-control" name="nom_boisson" type="text" placeholder="Nom de la Boisson" value="" id="Mnom_boisson" required>
                </div>
              </div>
              <div class="form-group">
                  <label for="selectsecteur">Alcoolisée</label>
                  <input type="checkbox" name="alcool" id="Malcool">
              </div>
              <div class="modal-footer">
                <input type="hidden" name="type" value="8">
                <input type="hidden" name="id_boisson" value="" id="Mid_boisson">
              <button type="button" class="btn btn-secondary buble " data-dismiss="modal">Fermer</button>
              <button type="submit" class="btn btn-secondary btn-lg bgcolor border-dark ">Valider la modification</button>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
