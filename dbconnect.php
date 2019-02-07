<?php
error_reporting(0);
//ob_start();
session_start();
$con = mysql_connect("localhost","root","") or die ('Error Connectiong to mysql: '.mysql_error());
$dbname = "movie";
mysql_select_db($dbname,$con) or die ("Select Error: ".mysql_error());
?>