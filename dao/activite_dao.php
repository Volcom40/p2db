<?php
require_once("../modules/bdd_util.php");
    // fonction qui permet d'ajouter dynamiquement les informations visible dans le menu accordéon (sans cliquer sur l'oeil )
function getalltypeactivite(){
  $bdd = connectDBS();
        // preparation de la requete
  $requete = "SELECT id_type_activite , secteur_activite FROM type_activite";
  $resultats = $bdd -> prepare($requete);
  $resultats -> execute();
  $result = $resultats->fetchAll(PDO::FETCH_ASSOC);
  $bdd = NULL;
  return $result ; // retourne true / false
}
  
/**cette fonction permet l'ajout dynamique du menu acordéon de la page_activite.php
* @param, $idactivite récupere l'id de l'activité 
*/
  function showmenus($idactivite){
    $bdd = connectDBS();
        // on recupere le contenu des menus activité
    $requete = "SELECT * FROM activite WHERE id_type_activite like :id_type_activite";
    $resultats = $bdd -> prepare($requete);
    $resultats -> bindValue(":id_type_activite" , $idactivite);
    $resultats -> execute();
    $result = $resultats->fetchAll(PDO::FETCH_ASSOC);
    $bdd = NULL;
    return $result ;
}
// cette fonction permet l'ajout dynamique des secteurs d'activité dans le select de création d'activité (ajout activité -> )
function getactivitebyid(){
  $bdd = connectDBS();
  $requete = 'SELECT * FROM activite WHERE id_activite LIKE :activite';
  $resultat = $bdd-> prepare($requete);
  $resultat->bindValue(':activite', $_POST["id"]);
  $resultat->execute();
  while($row=$resultat->fetch(PDO::FETCH_ASSOC)){
      $userData['Activity'][] = $row;
  }
  $bdd = NULL;
  return $userData;
}
/**fonction qui permet de voir les données des activités en cliquant sur l'oeil de l'accordéon
 * @param, $id récupère l'id en cours 
 */
function showmodalactivite($id){
  $bdd = connectDBS();
  $requete = 'SELECT * FROM activite JOIN type_activite ON activite.id_type_activite = type_activite.id_type_activite WHERE id_activite = :id';
  $resultats = $bdd -> prepare($requete);
  $resultats -> bindValue(':id',$id);
  $resultats -> execute();
    while($row=$resultats->fetch(PDO::FETCH_ASSOC)){
        $userData['Activity'][] = $row;
    }
    $bdd = NULL;
    return $userData ;
}
// cette fonction servira à ajouter un type d'activité dans le modal ajout type activite (tableau type_activite)
function addtypeactivite(){
  $bdd = connectDBS();
  $insert = $bdd->prepare('INSERT INTO type_activite (secteur_activite) VALUE (:secteur)');
  $insert->bindValue(':secteur', $_POST["secteur_type_activite"]);
  $res = $insert -> execute();
  if ($res && $insert -> rowCount() > 0) {
    $retour = true;
  }else {
    $retour = false;
  }
  $insert->closeCursor();
  $bdd = NULL;
  return $retour;
}
//Cette fonction permet de créer une nouvelle activité (ajout activité)
function creeractivite() {
  $bdd = connectDBS();
  // on prepare la requete et on l'execute
  // nous utiliserons la fonction NOW pour incrémenter la date
  $insert = $bdd -> prepare('INSERT INTO activite (nom_activite, tel_activite, mail_activite, url_activite,descriptif_activite, date_activite, ville_activite, adresse_activite, id_type_activite)
  VALUES (:nom, :tel, :mail, :url, :descriptif, NOW(), :ville, :adresse, :idtype)');
  // $insert = $bdd -> prepare('INSERT INTO type_activite (id_type_activite) VALUES (?)');
  $insert->bindValue(':nom', $_POST["nom_activite"]);
  $insert->bindValue(':tel', $_POST["tel_activite"]);
  $insert->bindValue(':mail', $_POST["mail_activite"]);
  $insert->bindValue(':url', $_POST["url_activite"]);
  $insert->bindValue(':descriptif', $_POST["descriptif_activite"]);
  $insert->bindValue(':ville', $_POST["ville_activite"]);
  $insert->bindValue(':adresse', $_POST["adresse_activite"]);
  $insert->bindValue(':idtype', $_POST["secteur_activite"]);
  $res = $insert -> execute();
  // $insert -> execute(array($secteur_activite));
  if ($res && $insert -> rowCount() > 0) {
    $retour = true;
  }else {
    $retour = false;
  }
  //Fermeture du statement
  $insert->closeCursor();
  //on ferme la connexion !
  $bdd = NULL;
  return $retour;
}

// cette requete va supprimer les secteurs d"activité
function deletetypeactivite($id) {
  $bdd = connectDBS();
  $requete ="DELETE FROM type_activite WHERE id_type_activite = :idactivite";
  $resultat = $bdd-> prepare($requete);
  $resultat->bindValue(':idactivite', $id);
  $res = $resultat->execute();
// $insert -> execute(array($secteur_activite));
  if ($res && $resultat -> rowCount() > 0) {
    $retour = true;
  }else {
    $retour = false;
  }
//Fermeture du statement
  $resultat->closeCursor();
//on ferme la connexion !
  $bdd = NULL;
  return $retour;
}
// fonction qui permettra de supprimer les activitées directement par l'onglet 'poubelle'
  function deleteactivite($id) {
    $bdd = connectDBS();
    $requete ="DELETE FROM activite WHERE id_activite = :idactivite";
    $resultat = $bdd-> prepare($requete);
    $resultat->bindValue(':idactivite',$id);
    $res = $resultat->execute();
    if ($res && $resultat -> rowCount() > 0) {
      $retour = true;
    }else {
      $retour = false;
    }
//Fermeture du statement
    $resultat->closeCursor();
//on ferme la connexion !
    $bdd = NULL;
    return $retour;
}
// cette fonction prends en compte la suppression des activitées ainsi
//que la suppression des secteur par le biais 'de la croix' affilié au menu accordéon
/**
 * @param, $id récupere l'id en cours d'utilisation
 */
function deleteactivitebytype($id) {
  $bdd = connectDBS();
  $requete ="DELETE FROM activite WHERE id_type_activite = :idactivite";
  $resultat = $bdd-> prepare($requete);
  $resultat->bindValue(':idactivite',$id);
  $res = $resultat->execute();
  if ($res && $resultat -> rowCount() > 0) {
    $retour = true;
  }else {
    $retour = false;
  }
//Fermeture du statement
  $resultat->closeCursor();
//on ferme la connexion !
  $bdd = NULL;
  return $retour;
}

// cette fonction va permettre de modifier les activitées, ceci sera possible directement
// en cliquant sur la clef à molette contenue dans les options des activitées
// @param id = identifiant de l'activité
// @param array = tableau listing du contenu de l'activite
function modifieractivite($id,$array){
  $bdd = connectDBS();
  $requete= "UPDATE activite SET
                date_activite = NOW() ,
                mail_activite = :mail,
                nom_activite = :nom,
                tel_activite = :tel,
                ville_activite = :ville,
                url_activite = :liens,
                descriptif_activite = :descriptif,
                adresse_activite = :adresse
                WHERE id_activite = :Mid ";
  $resultat = $bdd->prepare($requete);
  $resultat->bindValue(':mail', $array['mail'] );
  $resultat->bindValue(':nom',$array['nom']);
  $resultat->bindValue(':tel',$array['tel']);
  $resultat->bindValue(':ville',$array['ville']);
  $resultat->bindValue(':liens',$array['url']);
  $resultat->bindValue(':descriptif',$array['descriptif']);
  $resultat->bindValue(':adresse',$array['adresse']);
  $resultat->bindValue(':Mid',$id );
  $res = $resultat->execute();
  if ($res && $resultat -> rowCount() > 0) {
      $retour = true;
  }else {
      $retour = false;
  }
  $resultat->closeCursor();
  $bdd = NULL;
  return $retour;
}
?>
