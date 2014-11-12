<?php
  require_once("connectodata.php");
  session_start();

  $query_Member = "SELECT*FROMˋmemberˋWHEREˋaccountˋ='".$_SESSION["account"]."'";
  $Member = mysql_query("$query_Member");
  $row_Member=mysqli_fetch_assoc($Member);
?>
<div align="center">
	<p>Your name:
		<strong><?php echo $row_Member["name"];?></strong>
	</p>
	<p align="center">
	<a href="memberadmin.php">Member Center</a><br>
	<a href="update_form.php">Modify your data</a><br>
	<a href="update_password_form.php">Modify your password</a><br>
	<a href="delete.php">Delete your account</a><br>
	<a href="logout.php">Leave</a><br>
	</p>
</div>