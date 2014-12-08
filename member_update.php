<?php
  header("Content: text/html; charset=utf-8");
  require_once("connectodata.php");
  session_start();
  require_once("login_check.php");
  $redirectUrl="memberadmin.php";

  $sql="UPDATEˋmemberˋSET";
  $sql.="ˋnameˋ='".$_POST["name"]."',";
  $sql.="WHEREˋidˋ=".$_POST["id"];
  mysql_query($sql);

  header("Location: $redirectUrl");
?>