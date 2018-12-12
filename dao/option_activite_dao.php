<?php

//cette fonction permet l'affichage dynamique des valeurs contenu dans les listes d'activitées
 function secteuractivite($activite){
        $bdd = connectdbs();
        $requete = 'SELECT * FROM activite WHERE secteur_activite = :activite ';
        $resultat = $bdd-> prepare($requete);
        $resultat->bindValue(':activite', $activite);
        $resultat->execute();
        $tableau = $resultat -> fetchAll(PDO::FETCH_ASSOC);
        //Génération du tableau pour voir toutes les activites.
            if(count($tableau)>0){//Si la résultat de la recherche est vide, on affiche "Personne ne correspond"
              foreach ($tableau as $recherche) {?>
                <tr><!-- Model de chaques lignes du tableau -->
                  <th><?= $recherche["nom_activite"] ?></th>
                  <th><?= $recherche["tel_activite"] ?></th>
                  <th><?= $recherche["ville_activite"] ?></th>
                  <th><?= $recherche["date_activite"] ?></th>
                  <th>
                    <!-- Bouton pour le modal de modification du client -->
                    <button type="button" class="btn btn-default modal_modif" aria-label="Left Align" value="<?=$recherche["id_activite"]?>">
                      <span class="fa fa-wrench" aria-hidden="true"></span>
                    </button>
                    <!-- Bouton pour le visuel de la fiche du client -->
                    <button type="button" class="btn btn-default modal_look" aria-label="Left Align" value="<?=$recherche["id_activite"]?>">
                      <span class="fa fa-eye" aria-hidden="true"></span>
                    </button>
                    <!-- Bouton pour la supression du client  -->
                    <button type="button" class="btn btn-default" aria-label="Left Align">
                      <span class="fa fa-trash" aria-hidden="true"></span>
                    </button>
                  </th>
                </tr>
            <?php }} else{ ?></script>
            <tr>
              <th colspan="5" style="text-align:center;"> Aucune activité </th>
            <tr>
              <?php } }
    ?>

