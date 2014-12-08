<?php
  header("Content-Type: text/html; charset=utf-8");
  require_once("connectodata.php");
  session_start();
  require_once("login_check.php");

  $sql = "UPDATE `member` SET `password` = '".$_POST["password1"]."' WHERE `id` = ".$_SESSION["id"];
  mysql_query($sql);

  unset($_SESSION["id"]);
  header("Location: index.php");
?>