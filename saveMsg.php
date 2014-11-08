<?php
	require_once("connectMsg.php");

	if (isset($_POST["content"]) && isset($_POST["timestamp"])){
		$sql = "INSERT INTO messages (content,time) VALUES ('$_POST[content]','$_POST[timestamp]')";
		mysql_query( $sql, $conHost);
	}
?>