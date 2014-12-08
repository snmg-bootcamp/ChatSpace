<?php
  session_start();
  unset($_SESSION["id"]);
  echo 'logout';
  header("Location: index.php");
?>