<!DOCTYPE html>
<html>
<head>
    <title>Saving Your Data</title>
</head>
<body>

</body>
</html>

<?php 

require "config.php";


if (isset($_POST['saveReminder'])) {
	
	$Name = $_POST['Name'];
	$Model = $_POST['Model'];
	$Notel = $_POST['Notel'];
	$ItemRepair = $_POST['ItemRepair'];
	$ItemRepairO = $_POST['ItemRepairO'];
	$DateR = $_POST['DateR'];
	$DateF = $_POST['DateF'];
	

	$insert = mysqli_query($connect, "INSERT into remind (Name, Model, Notel, ItemRepair, ItemRepairO, DateR, DateF) VALUES ('".$Name."', '".$Model."', '".$Notel."', '".$ItemRepair."', '".$ItemRepairO."', '".$DateR."', '".$DateF."')");


	if ($insert) {

		header("location: reminder.php");

	}else{

		die(mysqli_error($connect));

	}

}

 ?>