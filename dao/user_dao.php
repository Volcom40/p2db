<?php
  require_once("../modules/bdd_util.php");

  function recuplastofconciergerie(){
    $connection = connectDBS();
    $query = "SELECT MAX(id_preference) FROM conciergerie";
    $resultats = $connection -> prepare($query);
    $resultats -> execute();
    $result = $resultats->fetchAll(PDO::FETCH_ASSOC);
    //Fermeture du statement
    $resultats->closeCursor();
    //on ferme la connexion !
    $connection = NULL;
    //renvoie le resultat ok=true, false sinon
    return $result;
  }

  function recuplastofinfo(){
    $connection = connectDBS();
    $query = "SELECT MAX(id_info_adulte) FROM info_adulte";
    $resultats = $connection -> prepare($query);
    $resultats -> execute();
    $result = $resultats->fetchAll(PDO::FETCH_ASSOC);
    //Fermeture du statement
    $resultats->closeCursor();
    //on ferme la connexion !
    $connection = NULL;
    //renvoie le resultat ok=true, false sinon
    return $result;
  }

  function ajoutconciergerie($type) {
    //Connexion a la base de donnees
    $connection = connectDBS();
    //La requete
    $query = "INSERT INTO conciergerie (`regime_conciergerie`, `aimeaimepas_conciergerie`, `loisir_conciergerie`, `hdiner_conciergerie`, `hdejeuner_conciergerie`, `gouts_conciergerie`, `arrive_conciergerie`, `depart_conciergerie`, `attente_conciergerie`, `raisonvenue_conciergerie`, `connaisetablissement_conciergerie`) VALUES (
            :regime,
            :aimeaimepas,
            :loisir,
            :hdiner,
            :hdejeuner,
            :gouts,
            :arrive,
            :depart,
            :attente,
            :raisonvenue,
            :connaisetablissement)";
    //Prepare la requete
    $statement = $connection->prepare($query);

    $statement->bindValue(':regime', $_POST["regime"]);
    $statement->bindValue(':aimeaimepas', $_POST["aimeaimepas"]);
    $statement->bindValue(':loisir', $_POST["Ploisir"]);
    $statement->bindValue(':hdiner', $_POST["Pdiner"]);
    $statement->bindValue(':hdejeuner', $_POST["hpetitdejeuner"]);
    $statement->bindValue(':gouts', $_POST["Pgout"]);
    if($type == "1") {
      $statement->bindValue(':arrive', $_POST["Datearriver"]);
      $statement->bindValue(':depart', $_POST["Datedepart"]);
      $statement->bindValue(':attente', $_POST["Attentes"]);
      $statement->bindValue(':raisonvenue', $_POST["Praisonvenue"]);
      $statement->bindValue(':connaisetablissement', $_POST["Poriginevenue"]);
    }else {
      $statement->bindValue(':arrive', NULL);
      $statement->bindValue(':depart', NULL);
      $statement->bindValue(':attente', NULL);
      $statement->bindValue(':raisonvenue', NULL);
      $statement->bindValue(':connaisetablissement', NULL);
    }
    //Execute la requete
    $res = $statement -> execute();
    //on test si update est bien passe
    if ($res && $statement -> rowCount() > 0) {
      $retour = true;
    }else {
      $retour = false;
    }
    //Fermeture du statement
    $statement->closeCursor();
    //on ferme la connexion !
    $bdd = NULL;
    //renvoie le resultat ok=true, false sinon
    return $retour;
  }

  function ajoutinfoadulte (){
    //Connexion a la base de donnees
    $connection = connectDBS();
    //La requete
    $query = "INSERT INTO `info_adulte`(`situationfamiliale_adulte`, `mail_adulte`, `phone_adulte`, `entreprise_adulte`, `codepostal_adulte`, `adresse_adulte`,`ville_adulte`)
              VALUES (:situation, :mail, :phone, :entreprise, :codepostal, :adresse, :ville)";
    //Prepare la requete
    $statement = $connection->prepare($query);
    $statement->bindValue(':situation', $_POST["PsituationF"]);
    $statement->bindValue(':mail', $_POST["Pmail"]);
    $statement->bindValue(':phone', $_POST["Pphone"]);
    $statement->bindValue(':entreprise', $_POST["Pentreprise"]);
    $statement->bindValue(':codepostal', $_POST["Vcodep"]);
    $statement->bindValue(':adresse', $_POST["Padresse"]);
    $statement->bindValue(':ville', $_POST["Vcommune"]);
    //Execute la requete
    $res = $statement -> execute();
    //on test si update est bien passe
    if ($res && $statement -> rowCount() > 0) {
      $retour = true;
    }else {
      $retour = false;
    }
    //Fermeture du statement
    $statement->closeCursor();
    //on ferme la connexion !
    $bdd = NULL;
    //renvoie le resultat ok=true, false sinon
    return $retour;
  }

  function ajoutpersonne ($id1 , $id2, $enfant){
    //Connexion a la base de donnees
    $connection = connectDBS();
    //La requete

    $query = "INSERT INTO personne (`nom_personne`, `prenom_personne`, `sexe_personne`, `enfant`, `id_preference`, `id_info_adulte`) VALUES (
            :nom,
            :prenom,
            :sexe,
            :enfant,
            :idpref,
            :idinfo)";
    //Prepare la requete
    $statement = $connection->prepare($query);
    $statement->bindValue(':nom', $_POST["Pnom"]);
    $statement->bindValue(':prenom', $_POST["Pprenom"]);
    $statement->bindValue(':sexe', $_POST["Psexe"]);
    $statement->bindValue(':enfant', $enfant);
    $statement->bindValue(':idpref', $id1);
    $statement->bindValue(':idinfo', $id2);
    //Execute la requete
    $res = $statement -> execute();
    //on test si update est bien passe
    //if ($res && $statement -> rowCount() > 0) {
      $retour = true;
    /*}else {
      $retour = false;
    }*/
    //Fermeture du statement
    $statement->closeCursor();
    //on ferme la connexion !
    $bdd = NULL;
    //renvoie le resultat ok=true, false sinon
    return $retour;
  }

  function checkgroupe($groupe){
    $connection = connectDBS();
    $query = "SELECT nom_groupe FROM groupe
              JOIN personne_groupe ON groupe.id_groupe = personne_groupe.id_groupe
              JOIN personne ON personne_groupe.id_personne = personne.id_personne
              WHERE groupe.id_groupe = :groupe";
    $resultats = $connection -> prepare($query);
    $resultats -> bindValue(':groupe', $groupe);
    $resultats -> execute();
    $result = $resultats->fetchAll(PDO::FETCH_ASSOC);
    //Fermeture du statement
    $resultats->closeCursor();
    //on ferme la connexion !
    $connection = NULL;
    //return le
    return $result;
  }

  function creationgroupe($type,$nom){
    $connection = connectDBS();
    $query = "INSERT INTO groupe (famille_groupe, nom_groupe)
              VALUES (:type, :nom)";
    $resultats = $connection -> prepare($query);
    $resultats -> bindValue(':type', $type);
    $resultats -> bindValue(':nom', $nom);
    $resultats -> execute();
    //Fermeture du statement
    $resultats->closeCursor();
    //on ferme la connexion !
    $connection = NULL;
  }
?>
