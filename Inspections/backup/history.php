<?php 

require "config.php";

session_start();

require 'timer.php';

 ?>


<!DOCTYPE html>
<html>
<head>

	<title>Faceit Solutions Holdings</title>
</head>
<link rel="icon" type="image/png" href="image/logo.png">
<body>

	<table border="1" style="text-align: center;">
		<tr>
			<td>Customer Name</td>
			<td>Phone Model</td>
			<td>Contact Number</td>
			<td>Date</td>
			<td>Time</td>
			<td>Action</td>
		</tr>

		<?php 

			$query = mysqli_query($connect, "SELECT * FROM faceit");
	
			while ($show = mysqli_fetch_array($query)) {

				echo"<tr>";
				echo"<td>" .$show['Name']. "</td>";
				echo"<td>" .$show['Model']. "</td>";
				echo"<td>" .$show['Notel']. "</td>";
				echo "<td>" .$show['Date']. "</td>";
				echo "<td>" .$show['Time']. "</td>";
				echo "<td><a href=\"update.php?No=$show[No]\">Edit</a>";
				echo"</tr>";

				}

		 ?>

	</table>

</body>
</html>