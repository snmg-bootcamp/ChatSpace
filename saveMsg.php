<?php
	require_once("connectMsg.php");

	if (isset($_POST["content"]) && isset($_POST["timestamp"])){
		$contentSecured = htmlspecialchars($_POST["content"]);
		$sql = "INSERT INTO messages (content,time) VALUES ('$contentSecured','$_POST[timestamp]')";
		mysql_query( $sql, $conHost);
	}
?>