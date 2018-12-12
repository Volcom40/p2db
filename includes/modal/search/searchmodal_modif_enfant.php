<link rel="stylesheet" href="../css/modal.css" type="text/css" media="screen" />
<div class="modal fade" id="modalModif_enfant" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-border " role="document">
    <div class="modal-content">
      <div class="modal-header bgcolor border-dark text-white">
        <div class="col-lg-2"></div>
        <h2 class="modal-title titre fsize mx-auto " id="exampleModalLongTitle ">Modification Client</h2>
        <button type="button" class="close " data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="./../php/switchcase_search.php" method="POST">
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <!--Ligne contenant les informations civils et prospect du client -->
            <div class="col-lg-6">
              <h3>Données civiles</h3>
              Nom :
              <input type="text" class="form-control" value="" name="nom" id="Mnom_enfant" required>
              Prénom :
              <input type="text" value="" class="form-control" name="prenom" id="Mprenom_enfant" required>
              Id famille / groupe :
              <input type="number" value="" class="form-control "  name="groupe" id="Mgroupe_enfant">
              <br>
              <h3>Informations personnalisées </h3>
              Heure petit déjeuner :
              <input type="time" value="" class="form-control" name="hpetitdej" id="Mhpetitdej_enfant">
              Heure diner :
              <input type="time" value="" class="form-control" name="hdiner" id="Mhdiner_enfant">
              Aime/Aime pas :
              <textarea type="text" value="" class="form-control" name="aimeaimepas" id="Maime_enfant"></textarea>
              Régime alimentaire :
              <select class="form-control" id="Mselect_enfant" name="regime">
              <option>Aucun</option>
              <option>Végétarien</option>
              <option>Sans porc</option>
              <option>Sans Gluten</option>
              <option>Sans Sel</option>
              </select>
            </div>
            <div class="col-lg-6 border-left">
              <h3>Intérêts</h3>
              Goûts :
              <textarea class="form-control" rows="3" id="Mgouts_enfant" name="Pgout"></textarea>
              Loisirs / Passions:
              <textarea class="form-control" rows="3" id="Mloisirs_enfant" name="Ploisir"></textarea>
              <br>
              <br>

              <br>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <input type="hidden" name="type" value="4">
        <input type="hidden" name="id" id="Meid" value="">
        <button class="btn btn-secondary btn-lg bgcolor border-dark  ">Sauvegarder les changements</button>
      </div>
    </form>
    </div>

  </div>
</div>
