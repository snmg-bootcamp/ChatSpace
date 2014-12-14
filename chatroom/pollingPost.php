<?php
	require_once("../include/connectodata.php");
	set_time_limit(0);
	$last_call = $_POST["timestamp"];

	$sql = "SELECT * FROM posts WHERE timestamp > '".$last_call."' ORDER BY timestamp";


	while (true) {
		
		$result = mysql_query($sql);
		$num = mysql_num_rows($result);

		if ($num > 0){
			while($row = mysql_fetch_assoc($result)){
     			$json[] = $row;
			}
			//$messages = mysql_fetch_array($result);
			$posts = json_encode($json);
			
			echo $posts;
			break;
		}else{
			sleep( 1 );
			continue;
		}

	}
?>