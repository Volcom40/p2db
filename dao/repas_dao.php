<?php
require_once("../modules/bdd_util.php");

function getMaxFormule(){
  $bdd = connectDBS();
  $requete = "SELECT MAX(id_formule) FROM formule";
  $resultats = $bdd -> prepare($requete);
  $resultats -> execute();
  $tableau = $resultats->fetchAll(PDO::FETCH_ASSOC);
  $bdd = NULL;
  return $tableau;
}

function getAllTypeFormule(){
  $bdd = connectDBS();
  // preparation de la requete
  $requete = "SELECT * FROM `type_formule`";
  $resultats = $bdd -> prepare($requete);
  $resultats -> execute();
  $tableau = $resultats->fetchAll(PDO::FETCH_ASSOC);
  $bdd = NULL;
  return $tableau ;
}

function getFormuleMatin(){
  $bdd = connectDBS();
  $requete = "SELECT * FROM formule
  JOIN formule_plat ON formule_plat.id_formule = formule.id_formule
  JOIN plat ON plat.id_plat = formule_plat.id_plat
  JOIN formule_boisson ON formule_boisson.id_formule = formule.id_formule
  JOIN boisson ON boisson.id_boisson = formule_boisson.id_boisson
  JOIN type_formule ON type_formule.id_typeformule = formule.id_typeformule
  WHERE formule.id_typeformule = 1"; //select * formules midi
  $resultat = $bdd-> prepare($requete);
  $resultat->execute();
  $tableau = $resultat -> fetchAll(PDO::FETCH_ASSOC);
  $bdd = NULL;
  return $tableau;
}

function getFormuleSoir(){
  $bdd = connectDBS();
  $requete = "SELECT * FROM formule
  JOIN formule_plat ON formule_plat.id_formule = formule.id_formule
  JOIN plat ON plat.id_plat = formule_plat.id_plat
  JOIN formule_boisson ON formule_boisson.id_formule = formule.id_formule
  JOIN boisson ON boisson.id_boisson = formule_boisson.id_boisson
  JOIN type_formule ON type_formule.id_typeformule = formule.id_typeformule
  WHERE formule.id_typeformule = 2"; //select * formules soir
  $resultat = $bdd-> prepare($requete);
  $resultat->execute();
  $tableau = $resultat -> fetchAll(PDO::FETCH_ASSOC);
  $bdd = NULL;
  return $tableau;
}

function getAllTypePlat(){
  $bdd = connectDBS();
  $requete = "SELECT * FROM `type_de_plats`";
  $resultat = $bdd->prepare($requete);
  $resultat->execute();
  $tableau = $resultat -> fetchAll(PDO::FETCH_ASSOC);
  $bdd = NULL;
  return $tableau;
}

function getAllPlat(){
  $bdd = connectDBS();
  $requete = "SELECT * FROM plat
  JOIN type_de_plats ON type_de_plats.id_typeplat = plat.id_typeplat";
  $resultat = $bdd-> prepare($requete);
  $resultat->execute();
  $tableau = $resultat -> fetchAll(PDO::FETCH_ASSOC);
  $bdd = NULL;
  return $tableau;
}

function getAllPlatAccompagne(){
  $bdd = connectDBS();
  $requete = "SELECT * FROM plat
  JOIN type_de_plats ON type_de_plats.id_typeplat = plat.id_typeplat WHERE type_de_plats.id_typeplat = 2 OR type_de_plats.id_typeplat = 3 ";
  $resultat = $bdd-> prepare($requete);
  $resultat->execute();
  $tableau = $resultat -> fetchAll(PDO::FETCH_ASSOC);
  $bdd = NULL;
  return $tableau;
}

function getAllPlatViande(){
  $bdd = connectDBS();
  $requete = "SELECT * FROM plat
  JOIN type_de_plats ON type_de_plats.id_typeplat = plat.id_typeplat
  WHERE type_de_plats.id_typeplat = 1 OR type_de_plats.id_typeplat = 4 ";
  $resultat = $bdd-> prepare($requete);
  $resultat->execute();
  $tableau = $resultat -> fetchAll(PDO::FETCH_ASSOC);
  $bdd = NULL;
  return $tableau;
}

function getAllBoisson(){
  $bdd = connectDBS();
  $requete = "SELECT * FROM boisson";
  $resultat = $bdd-> prepare($requete);
  $resultat->execute();
  $tableau = $resultat -> fetchAll(PDO::FETCH_ASSOC);
  $bdd = NULL;
  return $tableau;
}

//Cette fonction permet de créer une nouvelle Boisson
function createBoisson($array) {
  $bdd = connectDBS();
  // on prepare la requete et on l'execute
  // nous utiliserons la fonction NOW pour incrémenter la date
  $insert = $bdd -> prepare('INSERT INTO boisson (nom_boisson, alcoolise)
  VALUES (:nom, :alcool)');
  $insert->bindValue('nom',$array['nom_boisson']);
  $insert->bindValue('alcool',$array['alcool']);
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

//Cette fonction permet de créer un nouveau plat
function createPlat($array) {
  $bdd = connectDBS();
  // on prepare la requete et on l'execute
  $insert = $bdd -> prepare('INSERT INTO plat (nom_plat, id_typeplat)
  VALUES (:nom_plat, :id_typeplat)');
  $insert->bindValue(':nom_plat', $array["nom"]);
  $insert->bindValue(':id_typeplat', $array["type"]);
  $res = $insert -> execute();
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

//TODO executer la formule plat et boisson car elles doivent être créées après!!!
function createFormule($array) {
  $bdd = connectDBS();
  // on prepare la requete et on l'execute
  // TODO la requete
  $insert = $bdd -> prepare('INSERT INTO formule (nom_formule, date_formule, id_typeformule)
  VALUES (:nom_formule, NOW(), :id_typeformule)');
  $insert->bindValue(':nom_formule', $array["nom_formule"]);
  $insert->bindValue(':id_typeformule', $array["type_formule"]);
  $res = $insert -> execute();
  if ($res && $insert -> rowCount() > 0) {
    $retour = true;
  } else {
    $retour = false;
  }
  //Fermeture du statement
  $insert->closeCursor();
  //on ferme la connexion !
  $bdd = NULL;
  return $retour;
}

function createFormulePlat($array) {
  $bdd = connectDBS();
  // on prepare la requete et on l'execute
  $insert = $bdd -> prepare("INSERT INTO formule_plat (id_plat, id_formule)
  VALUES (:idp, :idf)");
  $insert->bindValue(':idp', $array["idp"]);
  $insert->bindValue(':idf', $array["idf"]);
  $res = $insert -> execute();
  if ($res && $insert -> rowCount() > 0) {
    $retour = true;
  } else {
    $retour = false;
  }
  //Fermeture du statement
  $insert->closeCursor();
  //on ferme la connexion !
  $bdd = NULL;
  return $retour;
}

function createFormuleBoisson($array) {
  $bdd = connectDBS();
  // on prepare la requete et on l'execute
  $insert = $bdd -> prepare('INSERT INTO formule_boisson (id_formule, id_boisson)
  VALUES (:idf, :idb)');
  $insert->bindValue(':idf', $array["id_formule"]);
  $insert->bindValue(':idb', $array["id_boisson"]);
  $res = $insert -> execute();
  if ($res && $insert -> rowCount() > 0) {
    $retour = true;
  } else {
    $retour = false;
  }
  //Fermeture du statement
  $insert->closeCursor();
  //on ferme la connexion !
  $bdd = NULL;
  return $retour;
}

function modifierBoisson($id,$array){
  $bdd = connectDBS();
  $requete= "UPDATE boisson SET
            nom_boisson = :nom ,
            alcoolise = :alcool
            WHERE id_boisson = :Mid ";
  $resultat = $bdd->prepare($requete);
  $resultat->bindValue(':nom', $array['nom_boisson'] );
  $resultat->bindValue(':alcool',$array['alcool']);
  $resultat->bindValue(':Mid',$id );
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

function modifierPlat($id,$array){
  $bdd = connectDBS();
  $requete= "UPDATE plat SET
            nom_plat = :nom ,
            id_typeplat = :type
            WHERE id_plat = :Mid ";
  $resultat = $bdd->prepare($requete);
  $resultat->bindValue(':type', $array['type'] );
  $resultat->bindValue(':nom',$array['nom']);
  $resultat->bindValue(':Mid',$id );
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

function modifierFormule($id,$array){
  $bdd = connectDBS();
  $requete= "UPDATE `formule` SET
            `id_typeformule`=:type,
            `nom_formule`=:nom,
            `date_formule`= NOW()
            WHERE id_formule = :Mid ";
  $resultat = $bdd->prepare($requete);
  $resultat->bindValue(':nom',$array['nom_formule']);
  $resultat->bindValue(':type',$array['type_formule']);
  $resultat->bindValue(':Mid',$id );
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

function modifierFormule_Plat($array){
  $bdd = connectDBS();
  $requete= "UPDATE `formule_plat` SET
            `id_plat`=:plat
            WHERE id_plat = :Mid ";
  $resultat = $bdd->prepare($requete);
  $resultat->bindValue(':plat', $array["idp"] );
  $resultat->bindValue(':Mid', $array["idf"] );
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

function modifierFormule_Boisson($array){
  $bdd = connectDBS();
  $requete= "UPDATE `formule_boisson` SET
            `id_boisson`=:boisson
            WHERE id_boisson = :Mid ";
  $resultat = $bdd->prepare($requete);
  $resultat->bindValue(':boisson', $array["id_boisson"] );
  $resultat->bindValue(':Mid', $array["id_formule"] );
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

function deleteboissonbyid($id) {
  $bdd = connectDBS();
  $requete ="DELETE FROM boisson WHERE id_boisson = :id";
  $resultat = $bdd-> prepare($requete);
   $resultat->bindValue(':id',$id);
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

function deleteboissoninformule($id) {
  $bdd = connectDBS();
  $requete ="DELETE FROM formule_boisson WHERE id_boisson = :id";
  $resultat = $bdd-> prepare($requete);
   $resultat->bindValue(':id',$id);
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

function deleteformulebyid($id) {
  $bdd = connectDBS();
  $requete ="DELETE FROM formule WHERE id_formule = :id";
  $resultat = $bdd-> prepare($requete);
   $resultat->bindValue(':id',$id);
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

function deleteformuleinformule_plat($id) {
  $bdd = connectDBS();
  $requete ="DELETE FROM formule_plat WHERE id_formule = :id";
  $resultat = $bdd-> prepare($requete);
   $resultat->bindValue(':id',$id);
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

function deleteformuleinformule_boisson($id) {
  $bdd = connectDBS();
  $requete ="DELETE FROM formule_boisson WHERE id_formule = :id";
  $resultat = $bdd-> prepare($requete);
   $resultat->bindValue(':id',$id);
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

function deleteplatbyid($id) {
  $bdd = connectDBS();
  $requete ="DELETE FROM plat WHERE id_plat = :id";
  $resultat = $bdd-> prepare($requete);
   $resultat->bindValue(':id',$id);
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

function deleteplatinformule($id) {
  $bdd = connectDBS();
  $requete ="DELETE FROM formule_plat WHERE id_plat= :id";
  $resultat = $bdd-> prepare($requete);
   $resultat->bindValue(':id',$id);
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
/**
* Cette dao permet de récupérer un plat en fonction de son id
* @param $id = l'id du plat qui correspond au value du bouton
* @return = toutes les informations du plat en json
*/
function getPlatbyid($id){
  $bdd = connectDBS();
  $requete = "SELECT * FROM plat
  JOIN type_de_plats ON type_de_plats.id_typeplat = plat.id_typeplat
  WHERE plat.id_plat = :id";
  $resultat = $bdd-> prepare($requete);
  $resultat->bindValue(':id',$id);
  $resultat->execute();
  while($row=$resultat->fetch(PDO::FETCH_ASSOC)){
    $tableau['Plat'][] = $row;
  }
  $bdd = NULL;
  return $tableau;
}
/**
* Cette dao permet de récupérer une boisson en fonction de son id
* @param $id = l'id du plat qui correspond au value du bouton
* @return = toutes les informations du plat en json
*/
function getBoissonbyid($id){
  $bdd = connectDBS();
  $requete = "SELECT * FROM boisson
  WHERE id_boisson = :id";
  $resultat = $bdd-> prepare($requete);
  $resultat->bindValue(':id',$id);
  $resultat->execute();
  while($row=$resultat->fetch(PDO::FETCH_ASSOC)){
    $tableau['Boisson'][] = $row;
  }
  $bdd = NULL;
  return $tableau;
}
/**
* Cette dao permet de récupérer une fonction en fonction de son id
* @param $id = l'id de la formule qui correspond au value du bouton
* @return = toutes les informations du plat en json
*/
function getFormulebyid($id){
  $bdd = connectDBS();
  $requete = "SELECT * FROM formule
  JOIN formule_plat ON formule_plat.id_formule = formule.id_formule
  JOIN plat ON plat.id_plat = formule_plat.id_plat
  JOIN formule_boisson ON formule_boisson.id_formule = formule.id_formule
  JOIN boisson ON boisson.id_boisson = formule_boisson.id_boisson
  JOIN type_formule ON type_formule.id_typeformule = formule.id_typeformule
  WHERE formule.id_formule = :Mid";
  $resultat = $bdd-> prepare($requete);
  $resultat->bindValue(':Mid',$id);
  $resultat->execute();
  while($row=$resultat->fetch(PDO::FETCH_ASSOC)){
    $tableau['Formule'][] = $row;
  }
  $bdd = NULL;
  return $tableau;
}
?>
