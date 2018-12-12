<?php
/**
*  Cette page sert à utiliser les dao dans des cas trés précis
*
* @since 36/06/2018
* @author P2DB / INTECH DAX
* @version 1
*
*/
  require_once("../dao/repas_dao.php");
  switch($_POST["type"]){
    case "1"://Case ajout_formule pour ajouter une formule
      createFormule(formuleonarray());
      $id_formule = getMaxFormule()[0];
      createFormulePlat(plat_accompagneonarray($id_formule["MAX(id_formule)"]));
      createFormulePlat(plat_vpoonarray($id_formule["MAX(id_formule)"]));
      createFormuleBoisson(boisson_formule_onarray($id_formule["MAX(id_formule)"]));
      header('location:../pages/page_repas.php');
      break;
    case "2"://Case pour ajout boisson
      createBoisson(boissononarray());
      header('location:../pages/page_repas.php');
      break;
    case "3"://Case pour le delete de la boisson
      deleteboissoninformule($_POST["id"]);
      deleteboissonbyid($_POST["id"]);
      break;
    case "4"://Case pour le delete du plat
      deleteplatinformule($_POST["id"]);
      deleteplatbyid($_POST["id"]);
      break;
    case "5"://Case pour delete une formule complétement
      deleteformuleinformule_plat($_POST["id"]);
      deleteformuleinformule_boisson($_POST["id"]);
      deleteformulebyid($_POST["id"]);
    case "6"://Case permettant la création d'un plat
      createPLat(platonarray());
      header('location:../pages/page_repas.php');
      break;
    case "7"://Case permettant la modification d'un plat
      modifierPlat($_POST["id_plat"],platonarray());
      header('location:../pages/page_repas.php');
      break;
    case "8"://Case permettant la modification d'une boisson
      modifierBoisson($_POST["id_boisson"],boissononarray());
      header('location:../pages/page_repas.php');
      break;
    case "9"://Case permettant la modification d'une formule
      modifierFormule($_POST["Mid_formule"],formuleonarray());
      modifierFormule_Plat(plat_accompagneonarray($_POST["Mid_accompagne"]));
      modifierFormule_Plat(plat_vpoonarray($_POST["Mid_viande"]));
      modifierFormule_Boisson(boisson_formule_onarray($_POST["Mid_boisson"]));
      header('location:../pages/page_repas.php');
      break;
    case "10"://Case pour récupérer les infos d'un plat sous format d'un json
      $plat = json_encode(getPlatbyid($_POST["id"]));
      echo $plat;
      break;
    case "11"://Case pour récupérer les infos d'une boisson sous format d'un json
      $boisson = json_encode(getBoissonbyid($_POST["id"]));
      echo $boisson;
      break;
    case "12"://Case pour récupérer une formule grace a son id sous format d'un json
      $formule = json_encode(getFormulebyid($_POST["id"]));
      echo $formule;
      break;
    default:
      break;
  }
  /**
  * Fonction qui sert a mettre le $_POST pour les formules sous format d'un tableau assoc
  * @return $retour = le tableau associatif qui contient toutes les données
  */
  function platonarray(){
    return $array=[
      "nom" => $_POST["nom_plat"],
      "type" => $_POST["type_plat"]
    ];
  }
  /**
  * Fonction qui sert a mettre le $_POST pour les formules sous format d'un tableau assoc
  * @return $retour = le tableau associatif qui contient toutes les données
  */
  function formuleonarray(){
    return $array=[
      "nom_formule" => $_POST["Fnom"],
      "type_formule" => $_POST["Ftype_formule"]
    ];
  }
  /**
  * Fonction qui sert a mettre le $_POST pour les boissons sous format d'un tableau assoc
  * @return $retour = le tableau associatif qui contient toutes les données
  */
  function boissononarray(){
    if(isset($_POST["alcool"])){
      return $array=[
        "nom_boisson" => $_POST["nom_boisson"],
        "alcool"=> "1"
      ];
    } else {
      return $array=[
        "nom_boisson" => $_POST["nom_boisson"],
        "alcool"=> "0"
      ];
    }
  }
  /**
  * Fonction qui sert a mettre le $_POST pour les plats sous format d'un tableau assoc
  * @param $id = Correspond a l'id de la formule qui vient juste d'être créer
  * @return $retour = le tableau associatif qui contient toutes les données
  */
  function plat_accompagneonarray($id){
    return $array=[
      "idp" => $_POST["plat_accompagne"],
      "idf" => $id
    ];
  }
  /**
  * Fonction qui sert a mettre le $_POST pour les plats sous format d'un tableau assoc
  * @param $id = Correspond a l'id de la formule qui vient juste d'être créer
  * @return $retour = le tableau associatif qui contient toutes les données
  */
  function plat_vpoonarray($id){
    return $array=[
      "idp" => $_POST["plat_viande"],
      "idf" => $id
    ];
  }
  /**
  * Fonction qui sert a mettre le $_POST pour les plats sous format d'un tableau assoc
  * @param $id = Correspond a l'id de la formule qui vient juste d'être créer
  * @return $retour = le tableau associatif qui contient toutes les données
  */
  function boisson_formule_onarray($id){
    return $array=[
      "id_formule" => $id,
      "id_boisson" => $_POST["boisson"]
    ];
  }
?>
