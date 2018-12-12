<?php
  require_once("../dao/login_dao.php");
  session_start();
  $profil = getprofilbylogin($_POST["login"]);
  if(count($profil) != 0){
    $localprofil = $profil[0];
    if($localprofil["login_utilisateur"] == $_POST['login'] /*&& password_verify($_POST['pass'],$localprofil["pass_utilisateur"])*/){
      $_SESSION["connect"]=1;
      $_SESSION["type_account"]=admin;
      $_SESSION["login"]=$localprofil["login_utilisateur"];
      header('location:../pages/page_accueil.php');
      exit();
    } else {
        header("location:../error/error401.php");
      exit();
    }
  }else{
      header("location:../error/error401.php");
    exit();
  }
?>
