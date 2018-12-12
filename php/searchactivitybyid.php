<?php
  require_once("../modules/bdd_util.php");
  require_once("../dao/activite_dao.php");
  $connection = connectDBS();
  $result = getactivitebyid ($connection);
  print_r($result);
  $resultf = json_encode($result);
  echo $resultf;
?>
