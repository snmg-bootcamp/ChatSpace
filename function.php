<?php
  function logout(){
  	header("Location: logout.php");
  }

  function logincheck(){
  	header("Location: login_check.php");
  }

  function getAccount($account){
  	require_once("connectodata.php"); 
    $sql = "SELECT * FROM `member` WHERE `account`='".$account."'";
  	$RecLogin = mysql_query($sql);
  	$row_RecLogin = mysql_fetch_assoc($RecLogin);
  	return $row_RecLogin["account"];
  }

  function getName($account){
  	require_once("connectodata.php"); 
  	$sql = "SELECT `name` FROM `member` WHERE `account`='".$account."'";
  	$RecLogin = mysql_query($sql);
  	$row_RecLogin = mysql_fetch_assoc($RecLogin);
  	return $row_RecLogin["name"];
  }
?>

