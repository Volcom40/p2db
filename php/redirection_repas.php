<?php
    require_once("../dao/repas_dao.php");
    header('location:../pages/page_repas.php');
    //variable d'état, pour verifier l'ajout d'un élément rattaché à la page repas, nous allons donc dans chaque modal
    //Etat 1 = formule, 2 = plat, 3 = boisson, 
    if($_POST["etat"] == 1){
        // Validation bouton ajout activité
        $statement1 = createFormule();
        if($statement1 == false || $statement1 == NULL){
            echo "<script>alert(\"Echec de la création d'une formule !\")</script>";
        } else { 
            echo "<script>alert(\"Formule créée !\")</script>";
        }
    }
    else if($_POST["etat"] == 2) {
        // Validation ajout type activité
        $statement2 = createPlat();
        if($statement2 == false || $statement2 == NULL){
            echo "<script>alert(\"Echec de la création d'un plat !!\")</script>";
        } else {
            echo "<script>alert(\"Plat créé !!\")</script>";
        }
    }
    else if($_POST["etat"] == 3) {
        // Validation ajout type activité
        $statement2 = createBoisson();
        if($statement2 == false || $statement2 == NULL){
            echo "<script>alert(\"Echec de la création d'une boisson !!\")</script>";
        } else {
            echo "<script>alert(\"Boisson créée !!\")</script>";
        }
    }
    print_r($_POST);
?>

