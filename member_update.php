<?php
  header("Content: text/html; charset=utf-8");
  require_once("connectodata.php");
  session_start();
  require_once("login_check.php");
  $redirectUrl="memberadmin.php";

  $sql = "UPDATE `member` SET `name` = '".$_POST["name"]."' WHERE `id` = ".$_SESSION["id"];
  mysql_query($sql);
  echo $sql;
  header("Location: $redirectUrl");
?>

