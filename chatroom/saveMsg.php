<?php
	require_once("../include/connectodata.php");

	if (isset($_POST["content"]) && isset($_POST["timestamp"]) && isset($_POST["author"])){
		$contentSecured = htmlspecialchars($_POST["content"]);
		$authorSecured = htmlspecialchars($_POST["author"]);
		$sql = "INSERT INTO messages (author,content,time) VALUES ('$authorSecured','$contentSecured','$_POST[timestamp]')";
		mysql_query( $sql);
	}
?>