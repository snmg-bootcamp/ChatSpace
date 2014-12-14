<?php
	require_once("connectMsg.php");
	set_time_limit(0);
	$last_call = $_POST["timestamp"];

	$sql = "SELECT * FROM messages WHERE time > '".$last_call."' ORDER BY time";


	while (true) {
		
		$result = mysql_query($sql);
		$num = mysql_num_rows($result);

		if ($num > 0){
			while($row = mysql_fetch_assoc($result)){
     			$json[] = $row;
			}
			//$messages = mysql_fetch_array($result);
			$messages = json_encode($json);
			
			echo $messages;
			break;
		}else{
			sleep( 1 );
			continue;
		}

	}
?>