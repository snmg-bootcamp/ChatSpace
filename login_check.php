<?php
  if(!isset($_SESSION["account"]) || ($_SESSION("account")=="")){
  	header("Location: index.php");
  }else{
  	header("Location: chatroom.php");
  }
?>