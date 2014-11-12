<?php
  header("Content-Type: text/html; charset=utf-8");
  require_once("connectodata.php");
  session_start();
  require_once("login_check.php");

  $query_delete = "DELETE FROM ˋmemberˋ ";
  $query_delete .= "WHERE ˋaccountˋ ='".$_SESSION["account"]."'";
  echo $query_delete;
  mysql_query($query_delete);
  unset($_SESSION["account"]);
  
  header("Location: index.php");
?>