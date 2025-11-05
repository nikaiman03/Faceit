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

	$query = mysqli_query($connect, "SELECT * FROM remind");

	if (isset($_POST['UpdateReminder'])) {

		$No = $_POST['No'];
		$Name = $_POST['Name'];
		$Model = $_POST['Model'];
		$Notel = $_POST['Notel'];
		$ItemRepair = $_POST['ItemRepair'];
		$ItemRepairO = $_POST['ItemRepairO'];
		$DateR = $_POST['DateR'];
		$DateF = $_POST['DateF'];

		$queryUpdate = mysqli_query($connect, "UPDATE remind set Name = '".$Name."', Model = '".$Model."', Notel = '".$Notel."', ItemRepair = '".$ItemRepair."', ItemRepairO = '".$ItemRepairO."', DateR = '".$DateR."', DateF = '".$DateF."' WHERE No = '".$No."' ");

		if ($queryUpdate) {

			header("location: reminder.php");

		}else{

			die(mysqli_error($connect));

		}

		

		}

 ?>