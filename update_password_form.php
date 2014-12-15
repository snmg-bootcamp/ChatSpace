<?php
  header("Content-Type: text/html; charset=utf-8");
  require_once("include/connectodata.php");
  session_start();
  require_once("include/login_check.php");

?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Member Center</title>
	<script language="javascript">
	function checkForm(){
		if (document.form1.password1.value!="" || document.form1.password2.value!="") {
			if (!check_password(document.form1.password1.value,document.form1.password2.value)) {
				document.form1.password1.focus();
				return false;
			}
		}
		return confirm('Are you sure to send out?');
	}
	function check_password(password1,password2){
		if (password1=='') {
			alert("Please insert your password");
			return false;
		}
		for (var i = 0; i<password1.length;i++){
			if(password1.chatAt(i)==' ' || password1.chatAt(i)=='\"'){
				alert("password can't be empty or any other sign\n");
				return false;
			}
		}
		if (password1.length<5 || password1.length>20) {
			alert("The length of your password just can be between 5-20!");
			return false;
		}
		if (password1!=password2) {
			alert("The password two times you insert are not the same,please re-insert again!\n");
            return false;
		}
		return true;
	}
	</script>

</head>
<body>
	<table width="800" border="0" align="center" cellpadding="4" cellspacing="0">
		<tr valign="top">
			<td width="600">
				<form action="member/update_password.php" method="POST" name="form1" onSubmit="return checkForm();">
					<p> <font size="6" color="#FF0000">Modify member's data</font></p>
					<hr size="1" />
				  <p><strong>Use password</strong> :
				  	<input type="password" name="password1"><br>
				  </p>
				  <p><strong>Confirm password</strong>:
                    <input type="password" name="password2"><br>
				  </p>
				  <hr size="1" />
				  <p align="center">
				<input name="ID" type="hidden" value="">
				   <input type="submit" name="change" value="modify password">
				   <input type="reset" name="reset" value="reset data">
				   </p>  	
				</form>
			</td>
			<td width="200">
				
			</td>
		</tr>
	</table>
</body>
</html>