<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';
	
		if( !isset($_SESSION['user']) ) {
		header("Location: index.php");
		exit;
		}
	

?>

<!DOCTYPE html>
<html>
<title>Director Wall E</title>
    <body id="main_body" background="walle.jpg" >

      <div id="form_containerlog">
	
	
        <h1 class="fltleft">Director Info...</h1><div style="clear:left"></div>
		


<link rel="stylesheet" type="text/css" href="style.css" media="all"><br>




 <?php

		$sql = "SELECT * FROM director_info where director_name='Andrew Stanton'";
		$res = mysql_query($sql);

	
		while($userRow=mysql_fetch_array($res))
			{
	?>
	
		
	
			<div><h2>Name:<?php echo $userRow['director_name']; ?></h2></div>
			<div><h2>Birth Date:<?php echo $userRow['birth_date']; ?></h2></div>
			<div><h2>Nationality:<?php echo $userRow['nationality']; ?></h2></div>
	<?php 
	
	}
	?>


<br><br><br>

<a href="home_page.php"><div><h4>Home</h4></div></a>


</body>
</html>