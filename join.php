<?php
  header("Content-Type: text/<html; charset=utf-8");
  require_once("connectodata.php");
  
  //account是否註冊過?
  $sql = "SELECT * FROM ˋmemberˋ WHERE ˋaccountˋ='".$_POST["account"]."'";
  $result = mysql_query($sql);
  
  if($result == false){
    $sql="INSERT INTO member (account, password, name) 
    VALUES ('$_POST[account]','$_POST[password]','$_POST[name]')";
    mysql_query($sql);

    $response = array("status"=>true);
    echo json_encode($response);
  }else{
    $response = array("status"=>false);
    echo json_encode($response);
  }
?>
  

