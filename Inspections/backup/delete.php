<?php 

require "config.php";

$No = $_GET['No'];

$delete = mysqli_query($connect, "DELETE FROM faceit where No = '".$No."' ");


if ($delete) {
	
	echo "<script>alert('Data Successful Deleted');
		window.location='home.php'</script>";

}else{

	die(mysqli_error($connect));

}

 ?>