<?php
  header("Content-Type: text/<html; charset=utf-8");
  require_once("connectodata.php");
  
  //account是否註冊過?
  $sql = "SELECT ˋaccount ˋ FROM ˋ member ˋ WHERE ˋaccountˋ='".$_POST["account"]."'";
  $record = mysql_query($sql);

  if(mysql_num_rows($record)>0){
  	header("Location: join_page.php?errCode=1 & account="._POST["account"]);
  }else{
  	$sql="INSERT INTO ˋmemberˋ (ˋaccountˋ,ˋpasswordˋ,ˋnameˋ) VALUES (";
  	$sql.="'".$_POST["account"]."',";
  	$sql.="'".$_POST["password"]."',";
  	$sql.="'".$_POST["name"]."',";
  	mysql_query($sql);
  }
?>
  <script lanquage="javascript">
    alert('Congratulations to join us successfully!!\nPlease use your account and password to log in.');
    Window.Location.href='index.php';
  </script>