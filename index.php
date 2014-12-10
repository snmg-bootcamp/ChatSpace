<?php
  session_start();

  //如果帳號已經設定好了就自動導向會員管理中心
  if (isset($_SESSION["id"]) && ($_SESSION["id"]!="")) {
        //會員中心
        header("Location: chatroom.php");
  }
  

?>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" /> 
	<!--屬性3種,內容-->
	<title>MemberAdmin System - Homepage</title>
        <link rel="stylesheet" type="text/css" href="extra/css/indexback.css">
        <script type="text/javascript" src="extra/js/jquery-1.11.1.min.js"></script>
</head>
<body>
        <form name="form1" method="post" action="login.php">  <!--傳遞方式,目標頁面-->
		
		<table id='form' width="600" border="0" valign="middle" align="center">
			<tr valign="middle"><td align="center">
                                <div id='title_block'>
                                <p>Hello Guys</p>
                                <p>Welcome to CHATSPACE</p>
                                </div>
                <label class="placeholder-label empty"><br>
                	<span class="placeholder">account</span>
                        <input name="account" type="text" value="<?php echo isset($_COOKIE["account"]) ? $_COOKIE["account"] : "";?>">
                </label>
                <br>
                <label class="placeholder-label empty"><br>
                	<span class="placeholder">password</span>
                	<input name="password" type="password" value="<?php echo isset($_COOKIE["account"]) ? $_COOKIE["account"] : "";?>">
                </p>
                <p><input name="rememberme" type="checkbox">remember my account and password</p>
                <p align="center">
                        <input class="submit" type="submit" name="login" value="log in">
                        
                </p>	
                <p><a href="join_page.php">Join us!!</a></p>
			</td></tr>

		</table>

	</form>

    <script language="javascript">
$(document).ready(function(){
    $("#join").click(function(){
         alert($("#password1").val());
         if(checkForm() && check_password()){  
             $.ajax({
                 type : 'POST',
                 url : "join.php",
                 data : {"account":account,"password":password,"name":name},
                 //dataType : jsonp,
                 success : function(data){
                     console.log(data);
                     if(data.status ==false){
                        alert("Someone have used this account!");
                     }
                 },
                 error:  function(){alert("error");}
             },"json");
         }
     });

});
    

    function checkForm(){
      if($("#account").val()==""){  
        alert("Please input your account!");
        return false;
      }else{
        uid=$("#account").val();
        if(uid.length<5 || uid.length>20){
           alert("Your account must be between 5-20 characters in length!");
           return false;
        }
      }

      if($("#password1").val()!="" || $("#password2").val()!="")
      {
          if(!check_password($("#password1").val(),$("#password2").val()))
          {
              return false;
          }

      }

      if($("#name").val()=="")
      {
         alert("Please input your name!");
         return false;
      }

      return confirm('Are you sure to send out?');

    }

    function check_password(password1,password2)
    {
        
        var b = $("#password1").val();
        var a = b.toString();
        if(password1==''){
            alert("The password can't be blank!");
            alert(password1);
            return false;
        }
        //abc
        if(a.match(/[a-zA-Z0-9]{5,20}/) == null){
            alert("Your password may only contain alphabetic characters (A-Z) and numbers(0-9)!\n")
            return false;
        }

        if(password1!=password2)
        {
            alert("Passwords must match!\n");
            return false;
        }

        return true;

        
    }
  
  </script>

    <table width="800" border="0" align="center" cellpadding="4" cellspacing="0">
    <tr valign="top">
     <td width="600">
       <p><font size="6" color="#FF0000">Join us!</font></p> 
       <div>
        <hr size="1" />
        <p><strong>Enter your name</strong>:
          <input type="text" name="name" id="name">
          <font color="#FF0000">*</font>
        </p>
        <p><strong>Enter your account</strong>:
          <input type="text" name="account" id="account">
          <font color="#FF0000">*</font>
        </p>
        <p><strong>Enter your password</strong>:
          <input type="password" name="password1" id="password1">
          <font color="#FF0000">*</font>
        </p>
        <p><strong>Re-enter your password</strong>:
          <input type="password" name="password2" id="password2">
          <font color="#FF0000">*</font>
        </p>
       </div>
       <hr size="1" />
       <p align="center">
        <BUTTON id="join" >Join us!</BUTTON>
        <input type="reset" name="reset" value="Reset data!">
       </p>
     </td>
    </tr>  
  </table>
    
</body>
</html>

