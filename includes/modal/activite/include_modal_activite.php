<!-- ceci est le modal qui se présentera sous la forme d'un oeil dans la page recherche des clients
celle-ci permettra de visualiser toutes les informations relative au client en question -->
<link rel="stylesheet" href="../css/modal.css" type="text/css" media="screen" />
<div class="modal fade" id="modal_look" tabindex="-1" role="dialog" aria-labelledby="modal_look" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-border" role="document">
    <div class="modal-content">
      <input type="hidden" name="etat" value="3">
      <div class="modal-header bgcolor border-dark text-white">

        <h5 class="fsize mx-auto" id="exampleModalLongTitle">Visuel de l'activité</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
        <div class="row">
          <div class="col-12">
            <div class="col-7">

              <label for="example-text-input" class="col-form-label">Activité:</label>
              <span id="nom_activite" class="ml-3"> </span>
            </div>
            <div class="col-7">
              <label for="tel" class="col-form-label"> Numéro de téléphone:</label>
              <span id="tel_activite" class="ml-3"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="col-7">
              <label for="tel" class=" col-form-label"> Adresse:</label>
              <span id="adresse_activite" class="ml-3"></span>
            </div>
            <div class="col-7">
              <label for="tel" class=" col-form-label"> Ville:</label>
              <span id="ville_activite" class="ml-3"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="col-7">
              <label for="example-email-input" class=" col-form-label">Email:</label>
              <span id="mail_activite" class="ml-3"></span>
            </div>
            <div class="col-7">
              <label for="example-url-input" class=" col-form-label">URL:</label>
              <span id="url_activite" class="ml-3"></span>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="col-12">
                <label for="descriptif_activite">Descriptif de l'activité:</label>
                <span id="descriptif_activite" class="ml-3"></span>
              </div>
              <div class="col-12">
                <label for="example-url-input" class=" col-form-label">Mis à jour le:</label>
                <span id="date_activite" class="ml-3"></span>
              </div>


            </div>
          </div>
        </div>
      </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-lg bgcolor border-dark  " data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>