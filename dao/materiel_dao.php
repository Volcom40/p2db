<?php
// voici l'ensemble des DAO qui vont intervenir sur la page_materiel.php ainsi que les modals qui y sont rattachés
require_once("../modules/bdd_util.php");
// nous avons une fonction qui va nous permettre de creer un nouveau materiel
function addmateriel (){
  $bdd = connectDBS();
  $insert = $bdd -> prepare('INSERT INTO materiel (nom_materiel, descriptif_materiel,id_type_materiel, location_logement)
                               VALUES (:nom, :descriptif, :typem, :location)');
  $insert->bindValue(':nom', $_POST["nom_materiel"]);
  $insert->bindValue(':typem', $_POST["type_materiel"]);
  $insert->bindValue(':descriptif', $_POST["descriptif_materiel"]);
  $insert->bindValue(':location',0);
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
/**fonction qui sert à récuperer la liste du matériel en base de donnée pour l'incorporer aux menus
 * @param, recupere l'id en cours d'utilisation 
 */
function getmaterielbyid($id){
  $bdd = connectDBS();
  $requete = 'SELECT * FROM materiel WHERE id_materiel LIKE :materiel';
  $resultat = $bdd-> prepare($requete);
  $resultat->bindValue(':materiel', $id);
  $resultat->execute();
  while($row=$resultat->fetch(PDO::FETCH_ASSOC)){
    $userData['materiel'][] = $row;
  }
  $bdd = NULL;
  return $userData;
}
//permet de déployer dynamiquement les types de matériels contenue dans la base de données
function getalltypemateriel(){
  $bdd = connectDBS();
  $requete = "SELECT * FROM type_materiel";
  $resultats = $bdd -> prepare($requete);
  $resultats -> execute();
  $result = $resultats->fetchAll(PDO::FETCH_ASSOC);
  $bdd = NULL;
  return $result ; // retourne true / false
 }
// on recupere le contenu des menus du materiel à condition qu'il ne soit pas loué ( false )
 function showmenus($idmateriel){
  $bdd = connectDBS();
  
  $requete = "SELECT * FROM materiel WHERE id_type_materiel like :id_type_materiel and location_logement = false ";
  $resultats = $bdd -> prepare($requete);
  $resultats -> bindValue(":id_type_materiel" , $idmateriel);
  $resultats -> execute();
  $result = $resultats->fetchAll(PDO::FETCH_ASSOC);
  $bdd = NULL;
  return $result ;
}
// fonction qui va permettre de montrer les matériels qui sont disponible au prêt
function showmateriel($materiel_type){
  $bdd = connectDBS();
  $requete = "SELECT * FROM materiel WHERE type_materiel = :materiel_type ";
  $resultats = $bdd -> prepare($requete);
  $resultats -> bindValue(":materiel_type" , $materiel_type);
  $resultats -> execute();
  $result = $resultats->fetchAll(PDO::FETCH_ASSOC);
  $bdd = NULL;
  return $result ;
}

// fonction qui permettra de delet un matériel
// @param l'id de l'objet à supprimer
function deletemateriel($id){
// fonction qui permettra de supprimer les materiels directement par l'onglet 'poubelle'
  $bdd = connectDBS();
  $requete ="DELETE FROM materiel WHERE id_materiel = :idmateriel";
  $resultat = $bdd-> prepare($requete);
   $resultat->bindValue(':idmateriel',$id);
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
// fonction qui va permettre de modifier un matériel
function modifiermateriel($id,$array){
  $bdd = connectDBS();
  $requete= "UPDATE materiel SET
              nom_materiel = :nom ,
                etat_materiel = :etat,
                id_type_materiel = :idtype,
                descriptif_materiel = :descriptif
                WHERE id_materiel = :Mid ";
  $resultat = $bdd->prepare($requete);
  $resultat->bindValue(':nom', $array['nom'] );
  $resultat->bindValue(':etat',$array['etat']);
  $resultat->bindValue(':idtype',$array['type']);
  $resultat->bindValue(':descriptif',$array['descriptif']);
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
// on ajoute à la liste déroulante les logements 
function getalltypelogement(){
  $bdd = connectDBS();
  $requete = "SELECT * FROM logement";
  $resultats = $bdd -> prepare($requete);
  $resultats -> execute();
  $result = $resultats->fetchAll(PDO::FETCH_ASSOC);
  $bdd = NULL;
  return $result ; // retourne true / false
}
// permet d'ajouter des logements en base de données 
function addlogement (){
  $bdd = connectDBS();
  $insert = $bdd -> prepare('INSERT INTO logement (nom_logement)
                             VALUES (:logement)');
  $insert->bindValue(':logement', $_POST['nom_logement']);
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
// ajoute un type de matériel en base de données
function addtypemateriel(){
  $bdd = connectDBS();
  $insert = $bdd->prepare('INSERT INTO type_materiel (type_materiel) VALUE (:materiel)');
  $insert->bindValue(':materiel', $_POST["type_typemateriel"]);
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
// permet de l'ajout dynamique des logments dans le select des transferts
function getlogement(){
  $bdd = connectDBS();
  $requete = "SELECT * FROM logement";
  $resultats = $bdd -> prepare($requete);
  $resultats -> execute();
  $result = $resultats->fetchAll(PDO::FETCH_ASSOC);
  $bdd = NULL;
  return $result ; // retourne true / false
 }
// permet de visualiser les objets prétés dans la colonne prévue à cet effet dans la partie materiel_logement
// @param idtransfert= tranfert du logement
function showtransfert($idtransfert){
  $bdd = connectDBS();
  // on recupere le contenu des menus activité
  $requete = "SELECT * FROM materiel WHERE id_logement like :id_type_transfert and location_logement = true ";
  $resultats = $bdd -> prepare($requete);
  $resultats -> bindValue(":id_type_transfert" , $idtransfert);
  $resultats -> execute();
  $result = $resultats->fetchAll(PDO::FETCH_ASSOC);
  $bdd = NULL;
  return $result ;
}
//fonction qui va mettre l'objet en état location
/**
 * @param $id = numéro du logement 
 * @param $array récupere les données à ajouter sous forme de tableau 
 */
function pretlocation($id,$array){
  $bdd = connectDBS();
  $requete= "UPDATE materiel SET
              -- numéro du logement
              id_logement = :logement ,
              -- true si loué , false non loué
                location_logement = :etat,
                descriptif_materiel = :descriptif
                WHERE id_materiel = :Mid ";
  $resultat = $bdd->prepare($requete);
  $resultat->bindValue(':logement', $array['logement'] );
  $resultat->bindValue(':etat',$array['etat']);
  $resultat->bindValue(':descriptif',$array['descriptif']);
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
//fonction qui va mettre l'objet en état non loué
/**
 * @param $id = numéro du logement 
 * @param $array récupere les données à ajouter sous forme de tableau 
 */
function retourlocation($id,$array){
  $bdd = connectDBS();
  $requete= "UPDATE materiel SET
              -- numéro du logement
                id_logement = :logement ,
              -- true si loué , false non loué
                location_logement = :location,
                descriptif_materiel = :descriptif,
                etat_materiel = :etat
                WHERE id_materiel = :Mid ";
  $resultat = $bdd->prepare($requete);
  $resultat->bindValue(':logement',NULL);
  $resultat->bindValue(':location',"0");
  $resultat->bindValue(':etat', $array['etat']);
  $resultat->bindValue(':descriptif',$array['descriptif']);
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
// fonction qui permettra de delet un logement
// @param l'id de l'objet à supprimer
function deletelogement($id){
// fonction qui permettra de supprimer les materiels directement par l'onglet 'poubelle'
  $bdd = connectDBS();
  $requete ="DELETE FROM logement WHERE id_logement = :logement";
  $resultat = $bdd-> prepare($requete);
  $resultat->bindValue(':logement',$id);
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
