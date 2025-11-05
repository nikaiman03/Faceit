<!DOCTYPE html>
<html>
<head>
    <title>Saving Your Data</title>
</head>
<body>

</body>
</html

<?php 

require "config.php";


if (isset($_POST['save'])) {
	
	$Inspec = $_POST['Inspec'];
	$Name = $_POST['Name'];
	$Notel = $_POST['Notel'];
	$Model = $_POST['Model'];
	$Pin = $_POST['Pin'];
	$Date = $_POST['Date'];
	$Time = $_POST['Time'];
	$Sim = $_POST['Sim'];
	$Bspeaker = $_POST['Bspeaker'];
	$Bluetooth = $_POST['Bluetooth'];
	$Tmic = $_POST['Tmic'];
	$Fprint = $_POST['Fprint'];
	$Gyro = $_POST['Gyro'];
	$Espeaker = $_POST['Espeaker'];
	$Bhealth = $_POST['Bhealth'];
	$Charging = $_POST['Charging'];
	$Bmic = $_POST['Bmic'];
	$Body = $_POST['Body'];
	$Compass = $_POST['Compass'];
	$Other = $_POST['Other'];

	$insert = mysqli_query($connect, "INSERT into faceit (Inspec, Name, Notel, Model, Pin, Date, Time, Sim, Bspeaker, Bluetooth, Tmic, Fprint, Gyro, Espeaker, Bhealth, Charging, Bmic, Body, Compass, Other) VALUES ('".$Inspec."', '".$Name."', '".$Notel."', '".$Model."', '".$Pin."', '".$Date."', '".$Time."', '".$Sim."', '".$Bspeaker."', '".$Bluetooth."', '".$Tmic."', '".$Fprint."', '".$Gyro."', '".$Espeaker."', '".$Bhealth."', '".$Charging."', '".$Bmic."', '".$Body."', '".$Compass."', '".$Other."')");

	if ($insert) {

		header("location: home.php");

	}else{

		die(mysqli_error($connect));

	}

}

 ?>