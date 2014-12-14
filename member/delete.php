<?php
  header("Content-Type: text/html; charset=utf-8");
  require_once("connectodata.php");
  session_start();
  require_once("login_check.php");

  $sql = "UPDATE `member` SET `status` = '0' WHERE `account`='".$_POST["account"]."'";
  mysql_query($sql);
  
  header("Location: index.php");
?>