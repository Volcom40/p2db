<?php
// voici le switch case qui va s'occuper de la redirection, chaque pages renverra un état suivi d'un chiffre, qui correspondra à une case
  require_once("../dao/materiel_dao.php");

  switch($_POST["etat"]){
    case "1":
    // permet d'ajouter un materiel dans la liste de prêt
     addmateriel();
     header('location:../pages/page_materiel.php');
     break;
    case "2":
    // permet de modifier les champs contenu dans la modification materiel
      $array = [
        "nom" => $_POST["nom_materiel"],
        "etat" => $_POST["etat_materiel"],
        "type" => intval($_POST["type_materiel"]),
        "descriptif" => $_POST["descriptif_materiel"],
      ];
      $retour = modifiermateriel($_POST["id"], $array);
      header('location:../pages/page_materiel.php');
      return $retour;
      break;
    case "3":
      // on affiche les anciennes données dans le menu modification materiel
      $retour = json_encode(getmaterielbyid($_POST["id"]));
      echo $retour;
      break;
    case "4":
      break;
    case "5":
      // permet de supprimer un materiel
      deletemateriel($_POST["id"]);
      return $retour;
      break;
    case "6":
      // permet d'ajouter un logement dans la liste des logement
      addlogement();
      header('location:../pages/page_materiel.php');
       break;
    case "6":
    // permet d'ajouter un logement dans la liste des logement
    addtypemateriel();
    header('location:../pages/page_materiel.php');
    break;
    case "7":
    // permet d'ajouter materiel à la liste de pret
    $arraypret = [
      "logement" => $_POST["pret_logement"],
      "etat" => "1",
      "descriptif" => $_POST["descriptif_materiel"],
    ];
    $retour1 = pretlocation($_POST["id"], $arraypret);
    header('location:../pages/page_materiel.php');
    // print_r($_POST);
    break;
    case "8":
    // permet de retirer le materiel de la liste de pret
    $arrayretour = [
      "logement" => NULL,
      "location" => "0",
      "etat" => $_POST["etat_materiel"],
      "descriptif" => $_POST["descriptif_materiel"]
    ];
    $retour2 = retourlocation($_POST["id"], $arrayretour);
    header('location:../pages/page_materiel.php');
    // print_r($_POST);
    break;
    case "9":
      deletelogement($_POST["id"]);      
      break;
    default:
      break;
  }
?>
