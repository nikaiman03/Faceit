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
	<link rel="icon" type="image/png" href="image/logo.png">
	<title>Checklist Inspections</title>

	<script>
        setTimeout(function() {
            location.reload();
        }, 320000); // Refresh after 5 seconds
    </script>

	<style type="text/css">
		

		/* Apply a default style to the container */
		.container {
		    transition: transform 0.5s ease-in-out;
		}

		/* Apply the zoom effect on the container */
		.container.zoomed {
		    transform: scale(1.2); /* Zoom to 120% */
		}


		.img1{
			width: 450px;
		}

		.tableHeader{

			width: 75%;
			margin-top: 2%;

		}

		.tablelistheader{

			background-color: red;
			color: white;
			font-size: 20px;

		}

		.tablelist{

			width: 60%;

		}

		.link{
			text-decoration: none;
			color: black;
		}

		.link2{
			text-decoration: none;
			color: white;
			font-size: 16px;
		}

		a.link:hover {

			color: red;

		}

		.srhInput{
			text-align: center;
		}

		.button{

			background-color: red;
			width: 180px;
			height: 60px;
			border-radius: 35px;	
			color: white;

		}

		.button2{

			background-color: red;
			width: 120px;
			height: 50px;
			font-size: 15px;
			border-radius: 35px;	
			color: white;

	}


	</style>
</head>
<body>

<script type="text/javascript">
		// Check if the user is logged in
		if ($user_data) { // Replace with your actual condition
		    // Wait for the page to load
		    window.addEventListener("load", function () {
		        // Add the "zoomed" class after a brief delay
		        setTimeout(function () {
		            document.getElementById("zoomElement").classList.add("zoomed");
		        }, 1000); // Adjust the delay (in milliseconds) as needed
		    });
		}

	</script>

<div class="container" id="zoomElement">
	<center>
		<table class="tableHeader">
			<tr>
				<td>
					<img src="image/DARKV3.png" class="img1">
				</td>
				<td>
					<nav>
						<table align="center" style="text-align: center;">
							<tr>
								<!--<td style=" width: 50%;"><a href="home.php" class="link" style="font-size: 20px;">LIST</a></td>-->
								<td style=" width: 50%;"><a href="form.php" class="link" style="font-size: 20px;">ADD</a></td>
								<td><a href="logout.php"><button class="button2">LOGOUT</button></a></td>
							</tr>
						</table>
					</nav>
				</td>
			</tr>
		</table>

		<br><br>
<input type="text" id="searchInput" placeholder="Search.." class="srhInput"><br><br><br>
		<table border="1" style="text-align: center; border-radius: 10px; border-collapse: collapse;" class="tablelist" id="dataTable">

			

			<script>
		        	const dataTable = document.getElementById('dataTable');
		        	const searchInput = document.getElementById('searchInput');

		        searchInput.addEventListener('keyup', function() {
		            const searchQuery = searchInput.value.toLowerCase();
		            const rows = dataTable.getElementsByTagName('tr');

		            for (let i = 1; i < rows.length; i++) { // Start from 1 to skip the header row
		                const rowData = rows[i].textContent.toLowerCase();

		                if (rowData.includes(searchQuery)) {
		                    rows[i].style.display = '';
		                } else {
		                    rows[i].style.display = 'none';
		                }
		            }
		        });
    </script>

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

			$query = mysqli_query($connect, "SELECT * FROM faceit order by No desc");


				while ($show = mysqli_fetch_array($query)) {

				echo"<tr>";
				echo"<td height=\"80\">" .$show['Name']. "</td>";
				echo"<td>" .$show['Model']. "</td>";
				echo"<td>" .$show['Notel']. "</td>";
				echo "<td>" .$show['Date']. "</td>";
				echo "<td>" .$show['Time']. "</td>";

				echo "<td><button><a href=\"viewdetail.php?No=$show[No]\" class=\"link\"><img src=\"image/view.png\" height = \"30\"><br>View</a></button>";

				echo "<td><button style=\"align\"><a href=\"update.php?No=$show[No]\" class=\"link\"><img src=\"image/update.png\" width=\"30\"><br>Edit</a></button>  &nbsp; &nbsp; 

				
				<button><a href=\"call.php?No=$show[No]\" class=\"link\"><img src=\"image/call.png\" width = \"30\" title=\"Contact\"><br>Contact</a>";

				echo"</tr>";

				}

		 ?>



	</table>

	<br><br><br><button class="button"><a href="form.php" class="link2">Add Inspections</a></button>

		</center>
		</div>
</body>
</html>