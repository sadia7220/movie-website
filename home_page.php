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
<title>Home</title>
<body id="main_body" background="lorax.jpg" >

<div id="form_containerlog">
	<!--<div class="fltleft"><img src="sadia.jpg" width="100" height="100" /></div>-->
	
        <h1 class="fltleft">WELCOME <?php echo($_SESSION['user']);?>!!!!</h1><div style="clear:left"></div>

<link rel="stylesheet" type="text/css" href="style.css" media="all"><br>


<div><h2>Recent Movies</h2></div>


<h2><a href="movie.php">Wall E</h2></a>
<h2><a href="movie2.php">Frozen</h2></a>
<h2><a href="movie.php">Epic</h2></a>
<h2><a href="movie.php">Tangled</h2></a>
<h2><a href="movie.php">Inside Out</h2></a>
<h2><a href="movie.php">Angry Birds</h2></a>
<h2><a href="movie.php">The Little Mermaid</h2></a>

<br><br><br>
<a href="profile.php"><div><h4>Profile</h4></div></a>
<a href="logout.php"><div><h4>Sign Out</h4></div></a>

</div>
	 <h3> <center>Developed by <br/>Sadia Alam</center></h3>


<!--a href="click_link.php">Submit<a/>
				<input type="button" onclick="document.location.href = 'http://google.com'" /--> 
</body>
</html>