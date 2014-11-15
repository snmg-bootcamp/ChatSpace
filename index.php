<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" /> 
	<!--屬性3種,內容-->
	<title>MemberAdmin System - Homepage</title>
        <link rel="stylesheet" type="text/css" href="indexback.css">
</head>
<body>
	<form name="form1" method="post" action="login.php">  <!--傳遞方式,目標頁面-->
		
		<table id='form' width="600" border="1" valign="middle" align="center">
			<tr valign="middle"><td align="center">
				<p>Hello Guys</p>
                <label class="placeholder-label empty"><br>
                	<span class="placeholder">account</span>
                	<input name="account" type="text" value="<?php echo $_COOKIE["account"];?>">
                </label>
                <br>
                <label class="placeholder-label empty"><br>
                	<span class="placeholder">password</span>
                	<input name="password" type="password" value="<?php echo $_COOKIE["password"];?>">
                </p>
                <p><input name="rememberme" type="checkbox" value="true" checked>remember my account and password</p>
                <p align="center">
                	<input type="submit" name="login" value="log in">
                </p>	
                <p><a href="join_page.php">Join us!!</a></p>
			</td></tr>

		</table>

	</form>
</body>
</html>