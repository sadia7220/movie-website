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
<title>Movie Details</title>
<body id="main_body" background="inside2.jpg" >

<div id="form_containerlog">
	
	
        <h1 class="fltleft">Movie Information...</h1><div style="clear:left"></div>

<link rel="stylesheet" type="text/css" href="style.css" media="all"><br>
<?php

		$sql = "SELECT * FROM animated_movie where movie_name='Wall E'";
		$res = mysql_query($sql);

	
		while($userRow=mysql_fetch_array($res))
			{
	?>
	
		
	<div><h2>Name:<?php echo $userRow['movie_name']; ?></h2></div>
<div><h2>Director:<a href="director.php">Andrew Stanton</h2></a></div>
<div><h2>Studio:<a href="studio.php">Pixar Animation</h2></a></div>
<div><h2>Resolution: <?php echo $userRow['resolution']; ?>____Size: <?php echo $userRow['size']; ?></h2></div>
<div><h2>Release Date: <?php echo $userRow['release_date']; ?></h2></div>
<div><h2>Duration: <?php echo $userRow['duration']; ?></h2></div>
<div><h2>Genre: <?php echo $userRow['genre']; ?></h2></div>
<div><h2>Language: <?php echo $userRow['language']; ?>____Subtitle: <?php echo $userRow['subtitle']; ?></h2></div>
<div><h2>IMDB: <?php echo $userRow['imdb']; ?></h2></div>

	<?php 
	
	}
	?>





<h2>watch <a href="click_link.php">trailer</h2></a>
<h2>to <a href="click_link.php">download </h2></a>


<a href="home_page.php"><div><h4>Home</h4></div></a>




</body>
</html>