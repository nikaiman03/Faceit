<?php 
session_start();

	include("config.php");

	require("Counter/10minCount.html");


require 'timer.php';

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="icon" type="image/png" href="image/logo.png">
	<title>Checklist Inspections</title>


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

		/* Define alternating background colors for odd and even rows */
		.tablelist tr:nth-child(odd){

			 background-color: #f2f2f2;

		}

		.tablelist tr:nth-child(even) {
            background-color: #ffffff; /* Change to the color you prefer for even rows */
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
								<td style=" width: 15%;"><a href="form.php" class="link" style="font-size: 20px;">ADD</a></td>
								<td style=" width: 50%;" ><a href="reminder.php" class="link" style="font-size: 20px;">REMINDER</a></td>
								<td><a href="logout.php"><button class="button2">LOGOUT</button></a></td>
							</tr>
						</table>
					</nav>
				</td>
			</tr>
		</table>

<div>
	<?php 
		    // Check if there's a warning message in the session
			if (isset($_SESSION['warningMessage'])) {
			    $blinkClass = $_SESSION['warningMessage'];
			    // Clear the session variable once it's displayed
			    //unset($_SESSION['warningMessage']);
			}
	 ?>

<script type="text/javascript">
        <?php
        // Check if the $warningMessage variable is set and not empty
        if (isset($warningMessage) && !empty($warningMessage)) {
            // Use JavaScript to display an alert with the warning message
            echo "alert('warningMessage');";
        }
        ?>
    </script>

</div>


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

				echo "<td><button style=\"align\"><a href=\"update.php?No=$show[No]\" class=\"link\"><img src=\"image/update.png\" width=\"30\"><br>Edit</a></button> &nbsp;&nbsp;&nbsp;";  



								$phoneNumber = $show['Notel'];

							// Remove non-numeric characters
							$numeric_phone_number = preg_replace("/[^0-9]/", "", $phoneNumber);

							// Add country code "6"
							if (substr($phoneNumber, 0, 1) !== '6') {
								    // Add "6" as the country code
								    $phoneNumber = '6' . $numeric_phone_number;
								}

							else {
								 $phoneNumber;
							}



				$message = "Hi ".$show['Name'].", Kami dari Faceit Solutions."; // You can customize the message here
    			$whatsappLink = "https://wa.me/$phoneNumber/?text=" . urlencode($message);

    			echo '<a href="' . $whatsappLink . '" class="link" target="_blank"><button><img src="image/call.png" width="30" title="WhatsApp Contact"><br>WhatsApp</button></a></td>';



				echo"</tr>";

				}

		 ?>



	</table>

	<br><br><br><button class="button"><a href="form.php" class="link2">Add Inspections</a></button>

		</center>
		</div>
</body>
</html>