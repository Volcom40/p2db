<link rel="stylesheet" href="../css/modal.css" type="text/css" media="screen" />
<div class="modal fade" id="modalModif_adulte" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-border " role="document">
    <div class="modal-content">
      <div class="modal-header bgcolor border-dark text-white">
        <div class="col-lg-2"></div>
        <h2 class="modal-title titre fsize mx-auto " id="exampleModalLongTitle ">Modification Client</h2>
        <button type="button" class="close " data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="./../php/switchcase_search.php">
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row">
              <!--Ligne contenant les informations civils et prospect du client -->
              <div class="col-lg-6">
                <h3>Données civiles</h3>
                Nom :
                <input type="text" value="" class="form-control" name="nom" id="Mnom_adulte" required>
                Prénom :
                <input type="text" value="" name="prenom" class="form-control" id="Mprenom_adulte" required>
                E-mail :
                <input type="text" class="form-control" value="" name="mail" id="Memail_adulte">
                Numéro de telephone :
                <input type="text" value="" class="form-control" name="phone" id="Mtel_adulte">
                Situation familiale :
                <div class="form-group">
                  <select class="form-control" id="Mselect2_adulte" name='situation'>
                    <option>Célibataire</option>
                    <option>Marié(e)</option>
                    <option>veuf(ve)</option>
                    <option>En concubinage</option>
                    <option>Ne veut pas le spécifier </option>
                  </select>
                </div>
                Id famille/ groupe :
                <input type="number" value="" class="form-control" name="groupe" id="Mgroupe_adulte">
                Profession :
                <input type="text" value="" class="form-control" name="profession" id="Mprofession_adulte">
                <br>
                <br>
                <h3>Informations personnalisées </h3>
                <br> Date d'arrivée :
                <input type="date" value="" class="form-control" name="darriver" id="Mdarrive_adulte">
                <br> Date de départ :
                <input type="date" value="" class="form-control" name="ddepart" id="Mddepart_adulte">
                <br> Attentes à l'arrivée :
                <textarea class="form-control" rows="3" id="Mattentes_adulte" name="Attentes"></textarea>
                <br>
                <br> Heure petit déjeuner :
                <input type="time" value="" class="form-control" name="hpetitdej" id="Mhpetitdej_adulte">
                <br> Heure diner :
                <input type="time" value="" class="form-control" name="hdiner" id="Mhdiner_adulte">
                <br> Aime/Aime pas :
                <textarea class="form-control" rows="3" id="Maime_adulte" name="aimeaimepas"></textarea>
                <br> Régime alimentaire :
                <select class="form-control" id="Mselect_adulte" name="regime">
                <option>Aucun</option>
                <option>Végétarien</option>
                <option>Sans porc</option>
                <option>Sans Gluten</option>
                <option>Sans Sel</option>
                </select>
              </div>
              <div class="col-lg-6 border-left">
                <h3>Adresse</h3>
                Adresse :
                <input type="text" class="form-control" id="Madresse" name="adresse">
                Code postal :
                <input type="text" class="form-control" id="Mcodepostal" name="codep">
                Ville :
                <input type="text" class="form-control" id="Mcommune" name="ville">
                <br>
                <br>
                <h3>Prospect</h3>
                Origine de la venue :
                <input type="text" value="" class="form-control" name="Poriginevenue" id="Mconnaisance_adulte">
                <br> Raison de la venue :
                <input type="text" value="" class="form-control" name="Praisonvenue" id="Mraison_adulte">
                <br>
                <br>
                <h3>Intérêts</h3>
                Goûts :
                <textarea class="form-control" rows="3" id="Mgouts_adulte" name="Pgout"></textarea>
                <br>
                Loisirs / Passions:
                <textarea class="form-control" rows="3" id="Mloisirs_adulte" name="Ploisir"></textarea>
                <br>

              </div>
            </div>
          </div>
        </div>

      <div class="modal-footer">
        <input type="hidden" name="type" value="3">
        <input type="hidden" name="id" id="Mid" value="">
        <button class="btn btn-secondary btn-lg bgcolor border-dark  ">Sauvegarder les changements</button>
      </div>
    </form>
    </div>

  </div>
</div>
