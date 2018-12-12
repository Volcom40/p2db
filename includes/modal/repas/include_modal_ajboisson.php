<?php require_once("../modules/bdd_util.php");
      require_once("../dao/repas_dao.php");
      ?>
<!-- Modal -->

<div class="modal fade " id="modal_AjoutBoisson" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bgcolor border-dark text-white">
        <div class="col-lg-2"></div>
            <h5 class="fsize mx-auto" id="exampleModalLongTitle">Menu Ajout Boisson</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <!-- lors du clic , envoie vers la page dao activite -->
        <form class="modal-body" action="./../php/switchcase_repas.php" method="POST">
          <div class="form-group row">
            <label for="example-text-input" class="col-2 col-form-label">Boisson</label>
            <div class="col-12">
              <input class="form-control" name="nom_boisson" type="text" placeholder="Nom de la Boisson" value="" id="example-text-input" required>
            </div>
          </div>
          <div class="form-group">
              <label for="selectsecteur">Alcoolisée</label>
              <input type="checkbox" name="alcool" id="Balcoolisee" value="1">
          </div>
          <div class="modal-footer">
            <input type="hidden" name="type" value="2">
          <button type="button" class="btn btn-secondary buble " data-dismiss="modal">Fermer</button>
          <button type="submit" class="btn btn-secondary btn-lg bgcolor border-dark  ">Valider l'ajout</button>
        </form>


      </div>
    </div>
    </div>
  </div>
</div>
