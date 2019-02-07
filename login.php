<?php

ob_start();
session_start();
include('dbconnect.php');

    	if( isset($_POST['btn-login']) ) {	
		    
			$username = $_POST['user_name'];
			$upass = $_POST['password'];
			
			$res=mysql_query("SELECT user_name, password FROM user_info WHERE user_name='$username'");
			
			$row=mysql_fetch_array($res);
			
			$count = mysql_num_rows($res); // if uname/pass correct it returns must be 1 row
			
			if( $count == 1 && $row['password']==$upass ) {
				$_SESSION['user'] = $row['user_name'];
				header("Location: home_page.php");
			} else {
				echo '<script type="text/javascript">

						alert("Wrong Credentials, Try again...");		

                    </script>';  
			}
		}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Login</title>
<link rel="stylesheet" type="text/css" href="style.css" media="all" >
<script type="text/javascript" ></script>

<script>
function validateForm()
{
    //var x = document.forms["form1"]["req_ref_no"].value;
    if (document.forms["form_login"]["user_name"].value==null || document.forms["form_login"]["user_name"].value=="") 
	{
        alert("Provide UserName");
        return false;
    }
	else if (document.forms["form_login"]["password"].value==null || document.forms["form_login"]["password"].value=="") 
	{
        alert("Provide Password");
        return false;
    }
}

</script>
</head>
<body id="main_body" background="birds.jpg">
	
		
		
	<div id="form_containerlog">
	
        
		<div><h2>User Login<br>Form</h2></div>
		<form id="form_login" class="appnitro"  method="post" onsubmit="return validateForm()"><!--action="userdash.php"-->
					<div class="form_description">
			 		</div>						
			<ul >
			
					<li id="li_1" >
		<label class="description" for="element_1">User Name </label>
		<div>
			<input id="element_1" name="user_name" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>		<li id="li_2" >
		<label class="description" for="element_2">Password </label>
		<div>
			<input id="element_2" name="password" class="element text medium" type="password" maxlength="255" value=""/> 
		</div> 
		</li>		<li class="section_break">
			
			<p></p>
		</li>
			
					<li class="buttons">
			    <input type="hidden" name="form_id" value="919640" />
			    
				<input id="saveForm" class="button_text" type="submit" name="btn-login" value="Submit" />
				<a href="user_create.php">Register<a/>
		</li>
			</ul>
		</form>	
		<div id="footer">

		</div>
	</div>
	
	
	
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">




	</body>
</html>