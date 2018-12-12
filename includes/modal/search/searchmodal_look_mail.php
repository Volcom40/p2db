<?php require_once("../dao/search_dao.php");?>
<link rel="stylesheet" href="../css/modal.css" type="text/css" media="screen" />
<div class="modal fade" id="modalLook_mail" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-border " role="document">
    <div class="modal-content">
      <div class="modal-header bgcolor border-dark text-white">
        <h2 class="modal-title titre" id="exampleModalLongTitle "></h2>
        <div class="col-lg-2"></div>
        <span class="fsize mx-auto">Liste des clients avec e-mail</span>
        <button type="button" class="close " data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12">
             <table class="table table" id="table_mail">
                 <thead class="thead-light">
                   <tr><!-- Premiére ligne descriptive -->
                     <th>Prénom</th>
                     <th>Nom</th>
                     <th>E-mail</th>
                     <th>Ville</th>
                     <th>Adresse</th>
                     <th>Code postal</th>
                   </tr>
                 </thead>
                <?php
                //Génération du tableau pour voir tous les clients.
                  $recherches = getalluserswithmail();
                     foreach ($recherches as $recherche) {?>
                       <tr><!-- Model de chaques lignes du tableau -->
                         <td><?= $recherche["prenom_personne"] ?></td>
                         <td><?= $recherche["nom_personne"] ?></td>
                         <td><?= $recherche["mail_adulte"] ?></td>
                         <td><?= $recherche["ville_adulte"] ?></td>
                         <td><?= $recherche["adresse_adulte"] ?></td>
                         <td><?= $recherche["codepostal_adulte"] ?></td>
                        <tr>
                    <?php } ?>
                </table>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer ">
        <button type="button" class="btn btn-secondary btn-lg bgcolor border-dark export_csv">Imprimer la liste</button>
        <button type="button" class="btn btn-secondary btn-lg bgcolor border-dark  " data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>
