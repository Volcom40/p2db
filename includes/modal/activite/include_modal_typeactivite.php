<?php require_once("../modules/bdd_util.php");
      require_once("../dao/activite_dao.php"); ?>
<!-- Modal qui permettra d'ajouter un type d'activite -->
<div class="modal fade" id="modaltype" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bgcolor border-dark text-white">
        <div class="col-lg-1"></div>
        <h5 class="fsize mx-auto" id="exampleModalLongTitle">Menu Ajout Type Activité</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form class="modal-body" action="../php/redirection_activite.php" method="POST">
        <!-- on attribue une valeur état pour différencier les modals -->
        <input type="hidden" name="etat" value="2">
        <div class="form-group container">
          <div class="col-6">
            <br>
            <label> Ajouter un Secteur d'Activité</label>
          </div>
          <div class="col-6">
            <input class="form-control" type="text" name="secteur_type_activite" required>
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary buble " data-dismiss="modal">Fermer</button>
          <button type="submit" class="btn btn-secondary btn-lg bgcolor border-dark   ">Valider l'ajout</button>
        </div>
      </form>
    </div>
  </div>
</div>



<div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-lg"
  aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Menu Ajout Type Activité</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

    </div>
  </div>
</div>




</div>