<?php
  header("Content-Type: text/html; charset=utf-8");
  require_once("connectodata.php");  //連結資料庫
  session_start(); //啟動SESSION引用資料庫連線引入檔

  //execute 會員登入動作
  if(isset($_POST["account"]) && isset($_POST["password"])){
  	//find會員資料
  	$sql = "SELECT*FROM`member`WHERE`account`='".$_POST["account"]."'";  //從member資料庫找到account
  	$RecLogin = mysql_query($sql);
  	
  	//取出帳號密碼
  	$row_RecLogin = mysql_fetch_assoc($RecLogin);
  	$account = $row_RecLogin["account"];
  	$password = $row_RecLogin["password"];

  	//比對密碼,成功就進入成功頁面
    if ($_POST["password"]==$password) {
    	
    	//設定登入者名稱
    	$_SESSION["account"]=$account;

    	//用cookie紀錄登入
    	if (isset($_POST["rememberme"]) && $_POST["rememberme"]=="true")) {
    		setcookie("account",$_POST["account"],time()+365*24*60*60);setcookie("password",$_POST["password"],time()+365*24*60*60);
    	}else{
    		if (isset($_COOKIE["account"])) {
    			setcookie("account",$_POST["account"],time()-100);
    			setcookie("password",$_POST["password"],time()-100);
    		}
    	}
    header("Location: memberadmin.php");
    }else{
    	header("Location: index.php?errMsg=1");
    }
  }

  //如果帳號已經設定好了就自動導向會員管理中心
  if (isset($_SESSION["account"]) && ($_SESSION["account"]!="")) {
  	//會員中心
  	header("Location: memberadmin.php");
  }
?>