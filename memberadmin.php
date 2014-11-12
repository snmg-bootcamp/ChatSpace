<?php
  header("Connect-Type": text/html; charset=utf-8);
  session_start();

  require_once("login_check.php");
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
  				<p>Welcome</p>
  				<ol>
  					<li>Join us</li>
  					<li>Modify data</li>
  					<li>Modify password</li>	
  					<li>Delete account</li>	
  				</ol>
  			</td>
  			<td width="200">
  				<?php require_once("menu.php"); ?>
  			</td>
  		</tr>
  	</table>
  </body>
<html>
