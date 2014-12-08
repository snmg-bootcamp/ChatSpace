<?php
  header("Content-Type: text/html; charset=utf-8");
  require_once("connectodata.php");
  session_start();
  require_once("login_check.php");

  $sql = "UPDATE ˋmemberˋ SET";
  $sql .= "ˋpasswordˋ='".$_POST["password1"]."' ";
  $sql .= "WHERE ˋidˋ =".$_POST["id"];
  mysql_query($sql);

  unset($_SESSION["id"]);
  header("Location: index.php");
?>