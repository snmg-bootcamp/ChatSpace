<?php
  header("Content-Type: text/html; charset=utf-8");
  require_once("include/connectodata.php");
  session_start();
  require_once("include/login_check.php");

  $query_Member = "SELECT * FROM `member` WHERE `id` = ".$_SESSION["id"];
  $Member = mysql_query($query_Member);
  $row_Member=mysql_fetch_assoc($Member);
?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>Member Center</title>
	<script type="text/javascript" src="extra/js/jquery-1.11.1.min.js"></script>
</head>
<body>
	<script language="javascript">
	function checkForm()
	{
	  if($("#name").val()==""){
          alert("Please insert your name!");
          return false;
	  }
      
      return confirm('Are you sure to send out?');
    }
    </script>
	<table width="800" border="0" align="center" cellpadding="4" cellspacing="0">
		<tr valign="top">
			<td width="600">
				<form action="member/member_update.php" method="POST" name="form1" onSubmit="return checkForm();">
					<p><font size="6" color="#FF0000">Modify your data</font></p>
					<div>
						<hr size="1" />
						<p><strong>Use account</strong>:
							<input name="account" type="text" value="<?php echo $row_Member["account"];?>" disabled="true">
							<font color="#FF0000">*</font>
						</p>
						<p><strong>Name</strong>:
							<input name="name" type="text" value="">
							<font color="#FF0000">*</font>
						</p>
					</div>
					<hr size="1" />
					<p align="center">
						<input name="id" type="hidden" value="">
						<input type="submit" name="update" value="modify data">
						<input type="reset" name="reset" value="reset data">
					</p>
				</form>
			</td>
			<td width="200">
				
			</td>
		</tr>
	</table>
</body>
<html>