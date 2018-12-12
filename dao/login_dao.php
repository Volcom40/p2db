<?php
/**
 *
 */
  require_once("../modules/bdd_util.php");
  function getprofilbylogin($login) {
    $connect = connectDBS();
    $requete = "SELECT login_utilisateur, pass_utilisateur, typeutilisateur_utilisateur FROM utilisateur WHERE login_utilisateur LIKE :login";
    $resultats = $connect -> prepare($requete);
    $resultats -> bindValue(':login', $login);
    $resultats -> execute();
    $result = $resultats->fetchAll(PDO::FETCH_ASSOC);
    $connection = NULL;
    return $result;
  }
  function getpassword() {
    $connect = connectDBS();
    $requete = "SELECT pass_utilisateur FROM utilisateur";
    $resultats = $connect -> prepare($requete);
    $resultats -> execute();
    $result = $resultats->fetchAll(PDO::FETCH_ASSOC);
    $connection = NULL;
    return $result;
  }
  function modifierPass($pass){
    $bdd = connectDBS();
    $requete= "UPDATE `utilisateur` SET
              `pass_utilisateur` = :pass";
    $resultat = $bdd->prepare($requete);
    $resultat->bindValue(':pass',$pass );
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
?>
