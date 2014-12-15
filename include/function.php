<?php
  require_once("connectodata.php");
  //session_start();
  function logout(){
  	header("Location: logout.php");
  }

  function logincheck(){
  	header("Location: login_check.php");
  }

  function getAccount(){
  	
    $sql = "SELECT `account` FROM `member` WHERE `id`='".$_SESSION["id"]."'";
    $RecLogin = mysql_query($sql);
    $row_RecLogin = mysql_fetch_assoc($RecLogin);
    return $row_RecLogin["account"];
  }

  function getName(){
    $sql = "SELECT `name` FROM `member` WHERE `id`='".$_SESSION["id"]."'";
    $RecLogin = mysql_query($sql);
    $row_RecLogin = mysql_fetch_assoc($RecLogin);
    return $row_RecLogin["name"];
  }

  function getId(){
    return $_SESSION["id"];
  }

  function getStatus(){
    $sql = "SELECT `status` FROM `member` WHERE `id`='".$_SESSION["id"]."'";
    $RecLogin = mysql_query($sql);
    $row_RecLogin = mysql_fetch_assoc($RecLogin);
    return $row_RecLogin["status"];
  }
?>

