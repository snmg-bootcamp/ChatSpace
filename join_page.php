<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>MemberAdmin System</title>
	<script language="javascript"></script>
	<!--檢查表單填寫格式-->
	function checkForm()
  {
	  if(document.form1.account.value=="")
    {
	    alert("Please input your account!");
	    document.form1.account.focus();
	    return false;
	  }else
     {
        uid=document.form1.account.value;
        if(uid.length<5 || uid.length>20)
        {
           alert("Your account must be between 5-20 characters in length!");
           document.form1.account.focus();
           return false;
        }
     }

      if(document.form1.password1.value!="" || document.form1.password2.value!="")
      {
          if(!check_password(document.form1.password1.value,document.form1.password2.value))
          {
              document.form1.password1.focus();
              return false;
          }

      }

      if(ducument.form1.name.value=="")
      {
         alert("Please input your name!");
         document.form1.name.focus();
         return false;
      }

      return confirm('Are you sure to send out?');

    }

    function check_password(password1,password2)
    {
        if(password1==''){
            alert("The password can't be blank!");
            return false;
        }

        for(var char=0;char<password1.length;char++)
        {
            if(password1.charAt(char)=='' || password1.charAt(char)=='\"')
            {
                alert("Your password may only contain alphabetic characters (A-Z) and numbers(0-9)!\n");
                return false;
            }
            if(password1.length<5 || password1.length>20)
            {
                alert("Your password must be between 5-20 characters in length!\n"); 
                return false; 
            }
            if(password1!=password2)
            {
                alert("Passwords must match!\n");
                return false;
            }
        }
        return true;
    }
  }
</head>
<body>
  <table width="800" border="0" align="center" cellpadding="4" cellspacing="0">
    <tr valign="top">
     <td width="600">
      <form name="form1" method="post" action="join.php" onSubmit="return checkForm();">
       <p><font size="6" color="#FF0000">Join us!</font></p> 
       <?php if(isset($_GET["errCode"]) || ($_GET["errCode"]=="1")){?>
       <div>account <?php echo $_GET["account"];?> Oh no!There have been someone using this account!</div>
       <?php }?>
       <div>
        <hr size="1" />
        <p><strong>Enter your name</strong>:
          <input type="text" name="name">
          <font color="#FF0000">*</font>
        </p>
        <p><strong>Enter your account</strong>:
          <input type="text" name="account">
          <font color="#FF0000">*</font>
        </p>
        <p><strong>Enter your password</strong>:
          <input type="password" name="password1">
          <font color="#FF0000">*</font>
        </p>
        <p><strong>Re-enter your password</strong>:
          <input type="password" name="password2">
          <font color="#FF0000">*</font>
        </p>
       </div>
       <hr size="1" />
       <p align="center">
        <input type="submit" name="join" value="Join us!">
        <input type="reset" name="reset" value="Reset data!">
       </p>
      </form>
     </td>
    </tr>  
  </table>
	
</body>
</html>