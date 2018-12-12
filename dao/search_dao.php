<?php
  require_once("../modules/bdd_util.php");
  /** formulaire simple de recherche, verifie egalement que le champ ne soit pas vide
   * @param $get correspond à la personne recherchée
   */
  function init_search ($get){
    $bdd = connectDBS();
    if(isset($get["age"])==NULL){
      $get["age"] = "Tous";
    }
    if(isset($get['rechercher']) AND !empty($get['rechercher'])){
        $rechercher = htmlspecialchars($get['rechercher']);
        if(isset($get["select"]) && $get["age"] == "Tous"){
          $recherche='SELECT * FROM personne WHERE '.$get["select"].' LIKE "'.$rechercher.'%"';
          $resultats = $bdd->prepare($recherche);
        }
        elseif(isset($get["select"]) && ($get["age"] == "1" || $get["age"] == "0")) {
          $recherche= 'SELECT * FROM personne WHERE '.$get['select'].' LIKE "'.$rechercher.'%" AND enfant = :id';
          $resultats = $bdd->prepare($recherche);
          $resultats -> bindValue(':id', $get["age"]);
        }
        elseif($get["age"] == "1" || $get["age"] == "0") {
          $recherche= 'SELECT * FROM personne WHERE nom_personne LIKE "'.$rechercher.'%" AND enfant = :id';
          $resultats = $bdd->prepare($recherche);
          $resultats -> bindValue(':id', $get["age"]);
        }
        else {
          $recherche= 'SELECT * FROM personne WHERE nom_personne LIKE "'.$rechercher.'%"';
          $resultats = $bdd->prepare($recherche);
        }
    }
    elseif($get["age"] == "1" || $get["age"] == "0") {
      $recherche='SELECT * FROM personne WHERE enfant = :id';
      $resultats = $bdd->prepare($recherche);
      $resultats -> bindValue(':id', $get["age"]);
    }
    else{
      $recherche='SELECT * FROM personne';
      $resultats = $bdd->prepare($recherche);
    }
    $resultats -> execute();
    $result = $resultats->fetchAll(PDO::FETCH_ASSOC);
    $bdd = NULL;
    return $result ;
  }
  /*Cette dao récupére toutes les données d'une personne en fonction de l'id renseigner */
  /**
   * @param $id id correspond à la personne recherchée
   */
  function getuserbyid ($id) {
    $connection = connectDBS();
    $query = "SELECT * FROM personne JOIN conciergerie ON personne.id_preference = conciergerie.id_preference
              JOIN info_adulte ON personne.id_info_adulte = info_adulte.id_info_adulte WHERE id_personne = :id";
    $result = $connection -> prepare($query);
    $result -> bindValue(':id', $id);
    $result -> execute();
    while($row=$result->fetch(PDO::FETCH_ASSOC)){
      $userData['AllUsers'][] = $row;
    }
    $connection = NULL;
    return $userData;
  }
  //Cette dao permet de supprimer un utilisateur en fonction de son id
  /**
   * @param $id id correspond à la personne recherchée
   */
  function deleteuserbyid($id){
    $connection = connectDBS();
    $query = "DELETE FROM personne WHERE id_personne = :id";
    $result = $connection -> prepare($query);
    $result -> bindValue(':id', $id);
    $res = $result -> execute();
    if ($res && $result -> rowCount() > 0) {
      $retour = true;
    }else {
      $retour = false;
    }
    //Fermeture du statement
    $result->closeCursor();
    //on ferme la connexion !
    $query = NULL;

    return $retour;
  }
  //On supprime les informations de préférence
  /**
   * @param $id id correspond à la personne recherchée
   */
  function deleteconciergeriebyid($id){
    $connection = connectDBS();
    $query = "DELETE FROM conciergerie WHERE id_preference = :id";
    $result = $connection -> prepare($query);
    $result -> bindValue(':id', $id);
    $res = $result -> execute();
    if ($res && $result -> rowCount() > 0) {
      $retour = true;
    }else {
      $retour = false;
    }
    //Fermeture du statement
    $result->closeCursor();
    //on ferme la connexion !
    $query = NULL;

    return $retour;
  }
  //On supprime les infos pour les adultes uniquement
  /**
   * @param $id id correspond à la personne recherchée
   */
  function deleteinfobyid($id){
    $connection = connectDBS();
    $query = "DELETE FROM info_adulte WHERE id_info_adulte = :id";
    $result = $connection -> prepare($query);
    $result -> bindValue(':id', $id);
    $res = $result -> execute();
    if ($res && $result -> rowCount() > 0) {
      $retour = true;
    }else {
      $retour = false;
    }
    //Fermeture du statement
    $result->closeCursor();
    //on ferme la connexion !
    $query = NULL;

    return $retour;
  }
  //On supprime la personne dans la table d'association pour les groupes.
  /**
   * @param $id id correspond à la personne recherchée
   */
  function deletepersonneingroupe($id){
    $connection = connectDBS();
    $query = "DELETE FROM personne_groupe WHERE id_personne = :id";
    $result = $connection -> prepare($query);
    $result -> bindValue(':id', $id);
    $res = $result -> execute();
    if ($res && $result -> rowCount() > 0) {
      $retour = true;
    }else {
      $retour = false;
    }
    //Fermeture du statement
    $result->closeCursor();
    //on ferme la connexion !
    $query = NULL;

    return $retour;
  }
  //Cette dao permet de récupérer les id attribuer a la personne afin de savoir lesquels il faut supprimer
  /**
   * @param $id id correspond à la personne recherchée
   */
  function getidbyuser($id){
    $connection = connectDBS();
    $query = "SELECT id_info_adulte, id_preference, id_utilisateur FROM personne WHERE id_personne = :id";
    $resultats = $connection -> prepare($query);
    $resultats -> bindValue(':id', $id);
    $resultats -> execute();
    $result = $resultats->fetchAll(PDO::FETCH_ASSOC);
    //Fermeture du statement
    $resultats->closeCursor();
    //on ferme la connexion !
    $connection = NULL;
    //renvoie le resultat ok=true, false sinon
    return $result;
  }
  //Toute la série d'update pour la modification du client adulte
  /**
   * @param $id id correspond à la personne recherchée
   * @param $data la donnée à remplacer dans le formulaire
   */
  function updateuserbyid ($id, $data){
    $connection = connectDBS();
    $query = "UPDATE `personne` SET
              `nom_personne`=:nom,
              `prenom_personne`=:prenom
              WHERE id_personne = :id";
    $resultats = $connection -> prepare($query);
    $resultats -> bindValue(':id', $id);
    $resultats->bindValue(':nom', $data["nom"]);
    $resultats->bindValue(':prenom', $data["prenom"]);
    $resultats -> execute();
    //Fermeture du statement
    $resultats->closeCursor();
    //on ferme la connexion !
    $connection = NULL;
    return;
  }
  /** mise à jour des préférence via un formulaire
   * @param $id id correspond à la personne recherchée
   * @param $data la donnée à remplacer dans le formulaire
   */
  function updatepreferencebyid ($id, $data){
    $connection = connectDBS();
    $query = "UPDATE `conciergerie` SET
              `regime_conciergerie`=:regime,
              `aimeaimepas_conciergerie`=:aimeaimepas,
              `loisir_conciergerie`=:loisir,
              `hdiner_conciergerie`=:hdiner,
              `hdejeuner_conciergerie`=:hdejeuner,
              `gouts_conciergerie`=:gouts,
              `arrive_conciergerie`=:arrive,
              `depart_conciergerie`=:depart,
              `attente_conciergerie`=:attente,
              `raisonvenue_conciergerie`=:raisonvenue,
              `connaisetablissement_conciergerie`=:connaisetablissement
              WHERE id_preference = :id";
    $resultats = $connection -> prepare($query);
    $resultats -> bindValue(':id', $id);
    $resultats->bindValue(':regime', $data["regime"]);
    $resultats->bindValue(':aimeaimepas', $data["aimeaimepas"]);
    $resultats->bindValue(':loisir', $data["loisir"]);
    $resultats->bindValue(':hdiner', $data["hdiner"]);
    $resultats->bindValue(':hdejeuner', $data["hdejeuner"]);
    $resultats->bindValue(':gouts', $data["gouts"]);
    $resultats->bindValue(':arrive', $data["arrive"]);
    $resultats->bindValue(':depart', $data["depart"]);
    $resultats->bindValue(':attente', $data["attente"]);
    $resultats->bindValue(':raisonvenue', $data["raisonvenue"]);
    $resultats->bindValue(':connaisetablissement', $data["connaisance"]);
    $resultats -> execute();
    //Fermeture du statement
    $resultats->closeCursor();
    //on ferme la connexion !
    $connection = NULL;
  }
  /** mise à jour des infos via un formulaire
   * @param $id id correspond à la personne recherchée
   * @param $data la donnée à remplacer dans le formulaire
   */
  function updateinfobyid ($id ,$data) {
    $connection = connectDBS();
    $query = "UPDATE `info_adulte` SET
              `situationfamiliale_adulte`=:situation,
              `mail_adulte`=:email,
              `phone_adulte`=:phone,
              `entreprise_adulte`=:entreprise,
              `codepostal_adulte` = :codep,
              `adresse_adulte` = :adresse,
              `ville_adulte` = :ville
              WHERE id_info_adulte = :id";
    $resultats = $connection -> prepare($query);
    $resultats -> bindValue(':id', $id);
    $resultats->bindValue(':situation', $data["situation"]);
    $resultats->bindValue(':email', $data["mail"]);
    $resultats->bindValue(':phone', $data["phone"]);
    $resultats->bindValue(':entreprise', $data["entreprise"]);
    $resultats->bindValue(':codep', $data["codep"]);
    $resultats->bindValue(':adresse', $data["adresse"]);
    $resultats->bindValue(':ville', $data["ville"]);
    $resultats -> execute();
    //Fermeture du statement
     $resultats->closeCursor();
    //on ferme la connexion !
    $connection = NULL;
  }
  //Un UPDATE trés spécial pour l'enfant uniquement, ainsi que son SELECT
  /**
   * @param $id id correspond à la personne recherchée
   * @param $data la donnée à remplacer dans le formulaire
   */
  function updatepreferencebyid_enfant ($id, $data){
    $connection = connectDBS();
    $query = "UPDATE `conciergerie` SET
              `regime_conciergerie`=:regime,
              `aimeaimepas_conciergerie`=:aimeaimepas,
              `loisir_conciergerie`=:loisir,
              `hdiner_conciergerie`=:hdiner,
              `hdejeuner_conciergerie`=:hdejeuner,
              `gouts_conciergerie`=:gouts,
              `arrive_conciergerie`=:arrive,
              `depart_conciergerie`=:depart,
              `attente_conciergerie`=:attente,
              `raisonvenue_conciergerie`=:raisonvenue,
              `connaisetablissement_conciergerie`=:connaisetablissement
              WHERE id_preference = :id";
    $resultats = $connection -> prepare($query);
    $resultats -> bindValue(':id', $id);
    $resultats->bindValue(':regime', $data["regime"]);
    $resultats->bindValue(':aimeaimepas', $data["aimeaimepas"]);
    $resultats->bindValue(':loisir', $data["loisir"]);
    $resultats->bindValue(':hdiner', $data["hdiner"]);
    $resultats->bindValue(':hdejeuner', $data["hdejeuner"]);
    $resultats->bindValue(':gouts', $data["gouts"]);
    $resultats->bindValue(':arrive', $data["arrive"]);
    $resultats->bindValue(':depart', $data["depart"]);
    $resultats->bindValue(':attente', $data["attente"]);
    $resultats->bindValue(':raisonvenue', $data["raisonvenue"]);
    $resultats->bindValue(':connaisetablissement', $data["connaisance"]);
    $resultats -> execute();
    //Fermeture du statement
    $resultats->closeCursor();
    //on ferme la connexion !
    $connection = NULL;
  }
  /** récupere un enfant via son id
   * @param $id id correspond à la personne recherchée
   */
  function getchildbyid ($id) {
    $connection = connectDBS();
    $query = "SELECT * FROM personne JOIN conciergerie ON personne.id_preference = conciergerie.id_preference
              WHERE id_personne = :id";
    $result = $connection -> prepare($query);
    $result -> bindValue(':id', $id);
    $result -> execute();
    while($row=$result->fetch(PDO::FETCH_ASSOC)){
      $userData['AllUsers'][] = $row;
    }
    $connection = NULL;
    return $userData;
  }
  /** Récupére la liste des adultes, avec mails seulement
  */
  function getalluserswithmail(){
    $connection = connectDBS();
    $query = "SELECT nom_personne, prenom_personne,adresse_adulte, mail_adulte, codepostal_adulte, ville_adulte FROM personne
              JOIN info_adulte ON personne.id_info_adulte = info_adulte.id_info_adulte
              WHERE mail_adulte  IS NOT NULL";
    $result = $connection -> prepare($query);
    $result -> execute();
    $resultats = $result->fetchAll(PDO::FETCH_ASSOC);
    $connection = NULL;
    return $resultats;
  }
?>
