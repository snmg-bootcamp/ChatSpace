<?php
	require_once("connectMsg.php");
	$dataQualified = false;
	if (isset($_POST["content"]) && isset($_POST["timestamp"]) && isset($_POST["author"]) && isset($_POST["isAnonymous"])){
		$dataQualified = true;
		$contentSecured = htmlspecialchars($_POST["content"]);
		$authorSecured = htmlspecialchars($_POST["author"]);
		$sql = "INSERT INTO posts (author,content,anonymous,timestamp) VALUES ('$authorSecured','$contentSecured','$_POST[isAnonymous]','$_POST[timestamp]')";
		$queryStatus = mysql_query( $sql, $conHost);
		if ($queryStatus) {
			$postReturn = array(	'dataQualified' => $dataQualified ,
						'queryStatus' => $queryStatus ,
						'author' => $authorSecured ,
						'content' => $contentSecured ,
						'anonymous' => $_POST["isAnonymous"] ,
						'timestamp' => $_POST["timestamp"]);
			echo json_encode($postReturn);
		}else{
			$postReturn = array(	'dataQualified' => $dataQualified , 
						'queryStatus' => $queryStatus);
			echo json_encode($postReturn);
		}
	}else{
		$postReturn = array('dataQualified' => $dataQualified);
		echo json_encode($postReturn);
	}
?>