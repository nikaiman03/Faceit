<!DOCTYPE html>
<html>
<head>
    <title>Update Data</title>
</head>
<body>

</body>
</html

<?php 

	require "config.php";

	$query = mysqli_query($connect, "SELECT * FROM faceit");

	if (isset($_POST['update'])) {

		$No = $_POST['No'];
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
		$Espeaker = $_POST['Espeaker'];
		$Bhealth = $_POST['Bhealth'];
		$Charging = $_POST['Charging'];
		$Bmic = $_POST['Bmic'];
		$Body = $_POST['Body'];
		$Other = $_POST['Other'];

		$queryUpdate = mysqli_query($connect, "UPDATE faceit set Name = '".$Name."', Notel = '".$Notel."', Model = '".$Model."', Pin = '".$Pin."', Date = '".$Date."', Time = '".$Time."', Sim = '".$Sim."', Bspeaker = '".$Bspeaker."', Bluetooth = '".$Bluetooth."', Tmic = '".$Tmic."', Fprint = '".$Fprint."', Espeaker = '".$Espeaker."', Bhealth = '".$Bhealth."', Charging = '".$Charging."', Bmic = '".$Bmic."', Body = '".$Body."', Other = '".$Other."' WHERE No = '".$No."' ");

		/*if ($queryUpdate) {

			header("location : index.php");

		}else{

			die(mysqli_error($connect));

		}*/

		echo "<script>alert('The Latest Data Has Been Successfull Saved');
		window.location='home.php'</script>";

		}

 ?>