<?php

$db_host = "localhost";
$db_name = "datasave";
$db_username = "chatspace";
$db_password = "snmg3";
  
$conHost = mysql_connect($db_host, $db_username, $db_password);
if(!$conHost){
  die("Error: Couldn't connect to localhost");
}

$conDB = mysql_select_db($db_name);
if(!$conDB){
  die("Error when select database");  
}

mysql_query("SET NAMES 'utf8'");
?>