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
<title>Studio2 Frozen</title>
<body id="main_body" background="mermaid.jpg" >

<div id="form_containerlog">
	
	
        <h1 class="fltleft">Studio Info...</h1><div style="clear:left"></div>

<link rel="stylesheet" type="text/css" href="style.css" media="all"><br>

<?php

		$sql = "SELECT * FROM studio_info where studio_name='Walt Disney Animation'";
		$res = mysql_query($sql);

	
		while($userRow=mysql_fetch_array($res))
			{
	?>
	
		
	
			<div><h2>Name:<?php echo $userRow['studio_name']; ?></h2></div>
			<div><h2>Established in:<?php echo $userRow['established_date']; ?></h2></div>
			<div><h2>Place:<?php echo $userRow['place']; ?></h2></div>
	<?php 
	
	}
	?>


<br><br><br>

<a href="home_page.php"><div><h4>Home</h4></div></a>

</body>
</html>