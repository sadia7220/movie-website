<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';

	if( !isset($_SESSION['user']) ) {
		header("Location: index.php");
		exit;
	}
	// select loggedin users detail
	$res=mysql_query("SELECT * FROM user_info WHERE user_name='".$_SESSION['user']."'");
	$userRow=mysql_fetch_array($res);

	if (isset($_POST['submit'])) 
	{	
	  //keep user input in variables
			$flag = 0;
			$name = trim($_POST['name']); 
			$email_id=trim($_POST['email_id']); 
			$age = trim($_POST['age']); 
			$gender = trim($_POST['gender']);
			$favourite_genre = trim($_POST['favourite_genre']);
			$user_name = trim($_POST['user_name']);
			$password = trim($_POST['password']);
		
			$sql="UPDATE `user_info` SET `name`='$name',`email_id`='$email_id',`age`='$age',`gender`='$gender',`favourite_genre`='$favourite_genre',`password`='$password' WHERE user_name='$user_name'";
			$res = mysql_query($sql);
			if ($res) {
				echo '<script type="text/javascript">

						var answer = confirm ("SUCCESSFULLY USER UPDATED")			

                    </script>';   
                    header("Location: profile.php");
			} else {
				echo '<script type="text/javascript">

						alert("SOMETHING IS WRONG!");		

                    </script>';   
			}				
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Profile</title>
<link rel="stylesheet" type="text/css" href="style.css" media="all">

<script>
function validateForm()
{
    //var x = document.forms["from_name"]["field_name"].value;
    
	if (document.forms["form1"]["name"].value==null || document.forms["form1"]["name"].value=="") 
	{
        alert("Enter your NAME");
        return false;
    }
	else if (document.forms["form1"]["email_id"].value==null || document.forms["form1"]["email_id"].value=="") 
	{
        alert("Enter your EMAIL_ID");
        return false;
    }
	
	else if (document.forms["form1"]["age"].value==null || document.forms["form1"]["age"].value=="") 
	{
        alert("Enter your AGE");
        return false;
    }
	else if (document.forms["form1"]["gender"].value==null || document.forms["form1"]["gender"].value=="") 
	{
        alert("Enter your GENDER");
        return false;
    }
	else if (document.forms["form1"]["favourite_genre"].value==null || document.forms["form1"]["favourite_genre"].value=="") 
	{
        alert("Enter your FAVOURITE_GENRE");
        return false;
    }
	else if (document.forms["form1"]["user_name"].value==null || document.forms["form1"]["user_name"].value=="") 
	{
        alert("Enter your USER_NAME");
        return false;
    }
	else if (document.forms["form1"]["password"].value==null || document.forms["form1"]["password"].value=="") 
	{
        alert("Enter your PASSWORD");
        return false;
    }

	
}
</script>

</head>
<body id="main_body" background="ice.jpg" >
	
	<!--img id="top" src="top.png" alt=""-->
	<div id="form_container">
    
    
       <div id="main">
		 	
            <!--div class="fltleft" style="width:20%; margin:0 auto;"><img src="sadia.jpg" width="100" height="100" /></div-->
       		 <h1> User Profile</h1><!--div style="clear:left"></div-->
        
		<!--<div><h2>User Add Form</h2></div>-->
        
        	
     <?//php include('left_sidebar.php') ?>
	 
       <!------------------form starts here ------------------>    
            
   <div id="content">
            <h2>User Info</h2>	
            <form id="form1" class="appnitro" onsubmit="return validateForm()" method="post">	 	 
		</div>						
			<ul >
			
		<li id="li_1" >
		<label class="description" for="element_1">Name </label>
		<div>
			<input id="element_1" name="name" value="<?php echo htmlspecialchars($userRow[name]); ?>" class="element text medium" type="text" maxlength="255" /> 
		</div> 
		</li>	
		
       <li id="li_2" >
		<label class="description" for="element_2">Email ID</label>
		<div>
			<input id="element_2" name="email_id" class="element text medium" type="text" maxlength="255" value="<?php echo htmlspecialchars($userRow[email_id]); ?>"/> 
		</div> 
		</li>	
		
		<li id="li_3" >
		<label class="description" for="element_3">Age</label>
		<div>
			<input id="element_3" name="age" class="element text medium" type="text" maxlength="255" value="<?php echo htmlspecialchars($userRow[age]); ?>"/> 
		</div> 
		</li>	
		
		<li id="li_4" >
		<label class="description" for="element_4">Gender</label>
		<div>
			<input id="element_4" name="gender" class="element text medium" type="text" maxlength="255" value="<?php echo htmlspecialchars($userRow[gender]); ?>"/> 
		</div> 
		</li>	
		
		<li id="li_5" >
		<label class="description" for="element_5">Favourite Genre</label>
		<div>
			<input id="element_5" name="favourite_genre" class="element text medium" type="text" maxlength="255" value="<?php echo htmlspecialchars($userRow[favourite_genre]); ?>"/>
            </div>
        <span id="confirmMessage" class="confirmMessage"></span>  
		</li>
		
		<li id="li_6" >
		<label class="description" for="element_6">User Name</label>
		<div>
			<input readonly id="element_6" name="user_name" class="element text medium" type="text" maxlength="255" value="<?php echo htmlspecialchars($userRow[user_name]); ?>" />
            
		</div>
        <span id="confirmMessage" class="confirmMessage"></span>  
		</li>
		
		<li id="li_7" >
		<label class="description" for="element_7">Password</label>
		<div>
		<input id="element_7" name="password" class="element text medium" type="password" maxlength="255" value="<?php echo htmlspecialchars($userRow[password]); ?>"/>
		<!--	<input id="pass2" name="password" class="element text medium" type="password" maxlength="255" value="" onkeyup="checkPass(); return false;"/>-->
            
		</div>
        <span id="confirmMessage" class="confirmMessage"></span>  
		</li>
		
		<li class="buttons">
			    <input type="hidden" name="form_id" value="919640" />
				<input id="saveForm" class="button_text" type="submit" name="submit" value="update" />
		</li>
	</ul>
</form>
            </div><!--contnet-->
            <div style="clear:left"></div>
        </div>
         
         <br><br><br>
		<a href="home_page.php"><div><h4>Home</h4></div></a>
		<a href="logout.php"><div><h4>Sign Out</h4></div></a>
    </body>
</html>