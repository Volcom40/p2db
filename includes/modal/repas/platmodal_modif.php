<link rel="stylesheet" href="../css/modal.css" type="text/css" media="screen" />
      <div class="modal fade" id="modalModif_plat" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-border " role="document">
          <div class="modal-content">
            <div class="modal-header bgcolor border-dark text-white">
              <h2 class="modal-title titre " id="exampleModalLongTitle "></h2>
              <span class="fsize mx-auto">Modification Plat</span>
              <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="./../php/switchcase_repas.php" method="post">
            <div class="modal-body">
              <div class="container-fluid">
                <div class="row"><!--Ligne contenant les informations civils et prospect du client -->
                  <div class="col-lg-3"></div>
                  <div class="col-lg-6">
                    <h3>Plat :</h3>
                    Nom du Plat :<input type="text" id="Mnom_plat" value="" name="nom_plat" class="form-control"><br>
                    Type de Plat :
                    <select class="form-control" id="Mtype_plat" name="type_plat">
                      <?php
                        $typeplat = getAllTypePlat();
                        foreach ($typeplat as $row) {?>
                      <option value="<?= $row["id_typeplat"] ?>"><?= $row["nom_typeplat"] ?></option>
                      <?php
                      }
                      ?>
                    </select><br>
                  </div>
                  <div class="col-lg-3"></div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <input type="hidden" value="7" name="type">
              <input type="hidden" value="" id="Mid_plat" name="id_plat">
              <button type="button" class="btn btn-secondary buble " data-dismiss="modal">Fermer</button>
              <button class="btn btn-secondary btn-lg bgcolor border-dark ">Sauvegarder les changements</button>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
