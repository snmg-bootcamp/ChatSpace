<?php
  header("Content-Type: text/html; charset=utf-8");
  require_once("connectodata.php");
  session_start();

  require_once("login_check.php");

  $query_Member = "SELECT * FROM `member` WHERE `id` = ".$_SESSION["id"];
  $Member = mysql_query($query_Member);
  $row_Member=mysql_fetch_assoc($Member);
?>

<html>
  <head>
  	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  	<title>Member Center</title>
  </head>
  <body>
  	<table width="800" border="0" align="center" cellpadding="4" cellspacing="0">
  		<tr valign="top">
  			<td>
  				<p><font size="6" color="#FF0000">Member Center</font></p>
  				<hr size="1" />
  				<p>Your name:
              <strong><?php echo $row_Member["name"];?></strong>
          </p>
          <p align="center">
          <a href="update_form.php">Modify your data</a><br>
          <a href="update_password_form.php">Modify your password</a><br>
          <a href="delete.php">Delete your account</a><br>
          </p>
  			</td>
  			<td width="200">
  			</td>
  		</tr>
  	</table>
  </body>
<html>
