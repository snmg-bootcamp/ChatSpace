<?php
	require_once("connectMsg.php");

	$timestamp = time();

	if (isset($_POST["content"])){
		$sql = "INSERT INTO messages (content,time) VALUES ('$_POST[content]','$timestamp')";
		mysql_query( $sql, $conHost);
	}
?>