<?php
error_reporting(0);
session_start();

include('dbconnect.php');


//login work start

	
if (isset($_POST['login'])) 
{
	
	$user_name = trim($_POST['user_name']); 
	$password = trim($_POST['password']); 
	
	
	$_SESSION["user_name"] = $user_name;
	$_SESSION["password"] = $password;
	
	
	$sql = "SELECT * FROM user_info WHERE user_name = '$user_name' and password = '$password'";
	$result = mysql_query($sql);
	

	if (!$result) 
	{
    	//die('Invalid query: ' . mysql_error());
		//header('Location: userlogin.php');   
		exit("Unable to connect to $site");
	}
	else
	{
    	 // output data of each row
		$flag = 0;
     	while($row = mysql_fetch_array($result)) 
		{
         	$flag = 1;
			$_SESSION["user_name"] = $row["user_name"];
			$_SESSION["password"] = $row["password"];
			
						
     	}
		if ($flag == 0)
		{
			header('Location: index.php');   
			exit("Unable to connect to $site");
		}
		else
		{
			header('Location: click_link.php');
		}
		
	}
	
}

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
	
		
		$sql = "SELECT * FROM user_info where user_name = '$user_name'";
		$result = mysql_query($sql);	
	
		while($row = mysql_fetch_array($result)) 
		{
			$flag=1;			
		}
		
		
			/* if(strcmp($password && $flag==0)
			{
			 */	
			 $sql="INSERT INTO user_info (name, email_id, age, gender, favourite_genre, user_name, password) values
				('$name', '$email_id', '$age', '$gender', '$favourite_genre','$user_name','$password')";
				
				
				echo '<script type="text/javascript">

				var answer = confirm ("SUCCESSFULLY USER CREATED")			

                    </script>';     	
			
			/* }
			else
			{
				echo '<script type="text/javascript">

				var answer = confirm ("USERNAME ALREADY EXISTS, CHOOSE A DIFFERENT ONE")			

				</script>';     				
				
			} */
	
		mysql_query($sql) or die(mysql_error().$sql);
			
}

?>






<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>USER create FORM</title>
<link rel="stylesheet" type="text/css" href="style.css" media="all">



<script>

// javascript validation to check data input in user form

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
	
	<div id="form_container">
    
    
       <div id="main">
		 	
 
       		 <h1> User Profile <?php echo $_SESSION["user_name"]; ?></h1>
        
		
          <!------------------form starts here ------------------>    
            
   <div id="content">
            <h2>User Info</h2>		 
		<form id="form1" class="appnitro" onsubmit="return validateForm()" method="post" action="user_create.php">
					<div class="form_description">
			
		</div>						
			<ul >
			
		<li id="li_1" >
		<label class="description" for="element_1">Name </label>
		<div>
			<input id="element_1" name="name" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>	
		
       <li id="li_2" >
		<label class="description" for="element_2">Email ID</label>
		<div>
			<input id="element_2" name="email_id" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>	
		
		<li id="li_3" >
		<label class="description" for="element_3">Age</label>
		<div>
			<input id="element_3" name="age" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>	
		
		<li id="li_4" >
		<label class="description" for="element_4">Gender</label>
		<div>
			<input id="element_4" name="gender" class="element text medium" type="text" maxlength="255" value=""/> 
		</div> 
		</li>	
		
		<li id="li_5" >
		<label class="description" for="element_5">Favourite Genre</label>
		<div>
			<input id="element_5" name="favourite_genre" class="element text medium" type="text" maxlength="255" value=""/>
            </div>
        <span id="confirmMessage" class="confirmMessage"></span>  
		</li>
		
		
		
		<li id="li_6" >
		<label class="description" for="element_6">User Name</label>
		<div>
			<input id="element_6" name="user_name" class="element text medium" type="text" maxlength="255" value="" />
            
		</div>
        <span id="confirmMessage" class="confirmMessage"></span>  
		</li>
		
		<li id="li_7" >
		<label class="description" for="element_7">Password</label>
		<div>
		<input id="element_7" name="password" class="element text medium" type="password" maxlength="255" value=""/>
	
		</div>
        <span id="confirmMessage" class="confirmMessage"></span>  
		</li>
		
		
	 <li class="buttons">
			    <input type="hidden" name="form_id" value="919640" />
			    
				<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
				<input type="reset" value="Reset">
		</li>
			</ul>
		</form>	
      
            </div><!--contnet-->
            <div style="clear:left"></div>
        </div>
         
        <br><br><br>
		<a href="login.php"><div><h4>Sign In</h4></div></a>

    </body>
</html>