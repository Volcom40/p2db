<?php
  require_once("../dao/activite_dao.php");
  header('location:../pages/page_activite.php');
   //variable d'état, pour verifier l'ajout du type d'activité, nous allons donc dans chacun des modals 
   //différencier ces plusieurs états
    if($_POST["etat"] == 1){
     // Validation bouton ajout activité
    $statement1 = creeractivite();
    if($statement1 == false || $statement1 == NULL){
       echo "<script>alert(\"Echec de l'envoie !\")</script>";
    } else { 
       echo "<script>alert(\"Envoie réussi !\")</script>";
    }}
    else if($_POST["etat"] == 2) { 
     // Validation ajout type activité
     $statement2 = addtypeactivite();
    if($statement2 == false || $statement2 == NULL){
      echo "<script>alert(\"Echec de la création d'un nouveau secteur d\'activité ! !\")</script>";
    }else {
      echo "<script>alert(\"Le nouveau secteur d'activité à été créé !  !\")</script>";
    }}
    // if($_POST["etat"] == 3) {
    //   $array = [
    //     "mail" => $_POST["mail_activite"],
    //     "nom" => $_POST["nom_activite"],
    //     "tel" => $_POST["tel_activite"],
    //     "ville" => $_POST["ville_activite"],
    //     "url" => $_POST["url_activite"],
    //     "descriptif" => $_POST["descriptif_activite"],
    //     "adresse" => $_POST["adresse_activite"]
    // ];
    //   $statement3 = modifieractivite($_POST["id"], $array);
    // if($statement3 == false || $statement3 == NULL){
    //   echo "<script>alert(\"good ! !\")</script>";
    // }else { 
    //   echo "<script>alert(\"bad  !\")</script>";
    //   }}
  print_r($_POST);
?>
