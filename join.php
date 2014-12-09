<?php
  header("Content-Type: text/<html; charset=utf-8");
  require_once("connectodata.php");
  
  //account是否註冊過?
  $sql = "SELECT `account` FROM ˋmemberˋ WHERE ˋaccountˋ='".$_POST["account"]."'";
  $result = mysql_query($sql);
  $num = mysql_num_rows($result);
  if($num == 0){
    $sql="INSERT INTO ˋmemberˋ (ˋaccountˋ,ˋpasswordˋ,ˋnameˋ) VALUES (";
    $sql.="'".$_POST["account"]."',";
    $sql.="'".$_POST["password"]."',";
    $sql.="'".$_POST["name"]."',";
    mysql_query($sql);

    $response = array("status"=>true);
    echo json_encode($response);
  }else{
    $response = array("status"=>false);
    echo json_encode($response);
  }
?>
  

