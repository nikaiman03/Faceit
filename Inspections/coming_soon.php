<?php 
session_start();

	include("config.php");
	include("functions.php");

	$user_data = check_login($connect);

require 'timer.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>Website Ongoing</title>
	<link rel="icon" type="image/png" href="image/logo.png">

	<style type="text/css">
		img{
			background-size: cover;
			background-repeat: no-repeat;
			background-position: center;
			align-content: center;
		}

		.inputBtn{

			background-color: red;
			width: 120px;
			height: 50px;
			border-radius: 35px;	
			color: white;

			margin-top: 3%;

			font-size: 18px;

			align-content: center;

		}
	</style>
</head>
<body>
<center><img src="image/Gif.gif"></center>

<br>	<br>

<center><a href="home.php"><button class="inputBtn"> Back </button></a>
<br><a href="reminder.php" style="font-size: 9px;">-- Lite Version --</a></center>
</body>
</html>