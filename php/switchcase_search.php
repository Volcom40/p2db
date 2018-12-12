<?php
  require_once("../dao/search_dao.php");
  //On définit l'id dans une variable
  $id = $_POST["id"];
  //Un switch case pour savoir dans quel cas on est.
  switch ($_POST["type"]){
    case "1"://Cas où l'action est de récupérer un utilisateur
      $userdata = json_encode(getuserbyid($id));//On récupére toutes infos du client sous forme d'un json, pour faciliter le traitement avec jquery
      echo $userdata;//Un petit echo pour la réponse de l'ajax.
      break;
    case "2"://On demande le delete de la personne
      $last=getidbyuser($id)[0];//On récupére les id qui nous interesse pour les préférence et les infos_adultes
      deletepersonneingroupe($id);
      deleteuserbyid($id);//On delete en premier la personne
      deleteconciergeriebyid($last["id_preference"]);//Puis ses préférences
      deleteinfobyid($last["id_info_adulte"]);//On delete les info client si c'est adulte.
      header('location:../pages/page_rechercheclient.php');//Et on finit par rediriger afin de recharger la page.
      break;
    case "3"://C'est la mise a jour pour les clients adultes
      $last=getidbyuser($id)[0];//On récupére les id qui nous interesse pour les préférence et les infos_adultes.
      updatepreferencebyid($last["id_preference"],postonconciergerie());//On met a jour les préférences.
      updateinfobyid($last["id_info_adulte"], postoninfo_adulte());//On met a jour les informations des adultes.
      updateuserbyid($id, postonpersonne());//On met a jour la personne en elle même.
      header('location:../pages/page_rechercheclient.php');//Et on finit par rediriger afin de recharger la page.
      break;
    case "4"://C'est la mise a jour pour les clients enfants
      $last=getidbyuser($id)[0];//On récupére les id qui nous interesse pour les préférences.
      updatepreferencebyid_enfant($last["id_preference"],postonconciergerie_enfant());//On met a jour les préférences de l'enfant.
      updateuserbyid($id, postonpersonne());//On met a jour la personne en elle même, vu qu'elle est considérer sur ce point, comme un adulte.
      header('location:../pages/page_rechercheclient.php');//Et on finit par rediriger afin de recharger la page.
      break;
    case "5":
      $childdata = json_encode(getchildbyid($id));//On récupére toutes infos du client sous forme d'un json, pour faciliter le traitement avec jquery
      echo $childdata;//Un petit echo pour la réponse de l'ajax.
      break;
    case "6":
      $usermail = json_encode(getalluserswithmail());//On récupére toutes infos du client sous pour le csv mail
      echo $usermail;//Un petit echo pour la réponse de l'ajax.
      break;
    default:
      break;
  }
  //On met toutes les données qui ont besoin d'être update sous forme d'un tableau associatif, afin de ne pas avoir de $_POST dans la dao
  function postonconciergerie() {
    $array = [
      "regime" => $_POST["regime"],
      "aimeaimepas" => $_POST["aimeaimepas"],
      "loisir" => $_POST["Ploisir"],
      "hdiner" => $_POST["hdiner"],
      "hdejeuner" => $_POST["hpetitdej"],
      "gouts" => $_POST["Pgout"],
      "arrive" => $_POST["darriver"],
      "depart" => $_POST["ddepart"],
      "attente" => $_POST["Attentes"],
      "raisonvenue" => $_POST["Praisonvenue"],
      "connaisance" => $_POST["Poriginevenue"]
    ];
    return $array;
  }
  function postonpersonne() {
    $array = [
      "nom" => $_POST["nom"],
      "prenom" => $_POST["prenom"]
    ];
    return $array;
  }
  function postoninfo_adulte() {
    $array = [
      "situation" => $_POST["situation"],
      "mail" => $_POST["mail"],
      "phone" => $_POST["phone"],
      "entreprise" => $_POST["profession"],
      "codep" => $_POST["codep"],
      "adresse" => $_POST["adresse"],
      "ville" => $_POST["ville"]
    ];
    return $array;
  }
  function postonconciergerie_enfant() {
    $array = [
      "regime" => $_POST["regime"],
      "aimeaimepas" => $_POST["aimeaimepas"],
      "loisir" => $_POST["Ploisir"],
      "hdiner" => $_POST["hdiner"],
      "hdejeuner" => $_POST["hpetitdej"],
      "gouts" => $_POST["Pgout"],
      "arrive" => NULL,
      "depart" => NULL,
      "attente" => NULL,
      "raisonvenue" => NULL,
      "connaisance" => NULL
    ];
    return $array;
  }
?>
