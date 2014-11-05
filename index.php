<html>
<head>
	<meta http-equiv="Content-Type" conntent="text/html;charset=utf-8'" /> 
	<!--屬性3種,內容-->
	<title>MemberAdmin System - Homepage</title>
</head>
<body>
	<form name="formal" method="post" action="login.php">  <!--傳遞方式,目標頁面-->
		
		<table width="600" border="1" valign="middle" align="center">
			<tr valign="middle"><td align="center">
				<p>MemberAdmin System</p>
                <p>帳號：<br>
                	<input name="account" type="text" value="<?php echo $_COOKIE["account"];?>">
                </p>
                <p>密碼：<br>
                	<input name="password" type="password" value="<?php echo $_COOKIE["password"];?>">
                </p>
                <p><input name="rememberme" type="checkbox" value="true" checked>記住我的帳號密碼</p>
                <p align="center">
                	<input type="submit" name="login" value="登入">
                </p>	
                <p><a href="join_page.php">心動了嗎??馬上加入我們吧!!</a></p>
			</td></tr>

		</table>

	</form>
</body>
</html>