<?php
  function logout(){
  	header("Location: logout.php");
  }

  function logincheck(){
  	header("Location: login_check.php");
  }

  function getAccount(){
  	session_start();
    $sql = "SELECT `account` FROM `member` WHERE `id`='".$_SESSION["id"]."'";
    $RecLogin = mysql_query($sql);
    $row_RecLogin = mysql_fetch_assoc($RecLogin);
    return $row_RecLogin["account"];
  }

  function getName(){
  	session_start();
    $sql = "SELECT `name` FROM `member` WHERE `id`='".$_SESSION["id"]."'";
    $RecLogin = mysql_query($sql);
    $row_RecLogin = mysql_fetch_assoc($RecLogin);
    return $row_RecLogin["name"];
  }

  function getId(){
    session_start();
    return $_SESSION["id"];
  }
?>

