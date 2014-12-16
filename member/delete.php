<?php
  header("Content-Type: text/html; charset=utf-8");
  require_once("../include/connectodata.php");
  session_start();
  require_once("../include/login_check.php");

  $sql = "UPDATE `member` SET `status` = '0' WHERE `id` = '".$_SESSION["id"]."'";
  mysql_query($sql);
  unset($_SESSION["id"]);
  
  header("Location: ../index.php");
?>