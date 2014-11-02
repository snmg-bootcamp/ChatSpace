<?php
  
  //需要引入此檔案
  //資料庫主機設定
  $db_host = "localhost";
  $db_table = "datasave";
  $db_username = "root";
  $db_password = "";
  
  //設定連線
  if(!@mysql_connect($db_host, $db_username, $db_password))
  	die("資料連結失敗囉!");
  
  //連結資料庫
  if(!@mysql_connect_db($db_table)) 
  	die("資料選擇失敗呀!");
  
  //設定字元校對
  mysql_query("SET NAMES 'utf8'");
?>