<?php 

require "config.php";


 ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type="image/png" href="image/logo.png">
	<title></title>
	<style type="text/css">
		
		.img1{
			width: 450px;
		}

		.tableHeader{

			width: 80%;
			margin-top: 1%;

		}

		.tablelistheader{

			background-color: red;
			color: white;
			font-size: 20px;

		}

		.tablelist{

			width: 60%;

		}

	</style>
</head>
<body>	
	<center>
		<table class="tableHeader">
			<tr>
				<td>
					<img src="image/DARKV3.png" class="img1">
				</td>
				<td>
					<nav>
						<table align="center">
							<tr>
								<td><a href="index.php">List</a></td>
								<td><a href="form.php">Inpections</a></td>
							</tr>
						</table>
					</nav>
				</td>
			</tr>
		</table>

		<br><br><br><br><br>

		<table border="1" style="text-align: center; border-radius: 10px; border-collapse: collapse;" class="tablelist">
		<tr>
			<td class="tablelistheader">Customer Name</td>
			<td class="tablelistheader">Phone Model</td>
			<td class="tablelistheader">Contact Number</td>
			<td class="tablelistheader">Date</td>
			<td class="tablelistheader">Time</td>
			<td class="tablelistheader" >Detail</td>
			<td class="tablelistheader" height="50px">Action</td>
		</tr>

		<?php 

			$query = mysqli_query($connect, "SELECT * FROM faceit");

			$check = mysqli_num_rows($query);

			if ($check > 0) {

				while ($show = mysqli_fetch_array($query)) {

				echo"<tr>";
				echo"<td height=\"40\">" .$show['Name']. "</td>";
				echo"<td>" .$show['Model']. "</td>";
				echo"<td>" .$show['Notel']. "</td>";
				echo "<td>" .$show['Date']. "</td>";
				echo "<td>" .$show['Time']. "</td>";
				echo "<td><a href=\"viewdetail.php?No=$show[No]\">View</a>";
				echo "<td><button><a href=\"update.php?No=$show[No]\"><img src=\"image/update.png\" width=\"20\"></a></button>  &nbsp; &nbsp; <button><a href=\"delete.php?No=$show[No]\"><img src=\"image/delete.png\" width = \"20\"></a>";
				echo"</tr>";

				}

			}
			else{

				echo "<table><tr><p>Database Empty</p></tr></table>";
				echo "<br><br><br><tr><a href=\"form.php\">Add Checklist Inspections</a></tr>";

			}

		 ?>

	</table>

		</center>
</body>
</html>