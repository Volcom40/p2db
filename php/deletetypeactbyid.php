<?php
  require_once("../dao/activite_dao.php");

  switch($_POST["type"]){
    case "1":
      deleteactivitebytype($_POST["id"]);
      $retour = deletetypeactivite($_POST["id"]);
      return $retour;
      break;
    case "2":
      deleteactivite($_POST["id"]);
      return $retour;
      break;
    case "3":
      $retour = json_encode(showmodalactivite($_POST["id"]));
      echo $retour;
      break;
      case "4":
      $array = [
        "mail" => $_POST["mail_activite"],
        "nom" => $_POST["nom_activite"],
        "tel" => $_POST["tel_activite"],
        "ville" => $_POST["ville_activite"],
        "url" => $_POST["url_activite"],
        "descriptif" => $_POST["descriptif_activite"],
        "adresse" => $_POST["adresse_activite"]
    ];
      $retour = modifieractivite($_POST["id"], $array);
      header('location:../pages/page_activite.php');
      return $retour;
      break;
      case "5":
      // on affiche les anciennes données
      $retour = json_encode(showmodalactivite($_POST["id"]));
      echo $retour;
      break;
      default:
      break;
  }
?>
