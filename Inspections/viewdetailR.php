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

	<!--<link href="css.css" rel="stylesheet">-->
	<title>Update Data Customer</title>
	<!--<script src="scriptdate.js"></script>-->

	<style type="text/css">
		.tableMain{

			width: 92%;

		}

		.tableSec{



		}

		.tr1{
			height: 10%;
			
		}

		.td1{

			width: 50%;

		}

		.td2{

			width: 80%;
			background-color: red;
			color: white;
			text-align: center;
			border: 2px solid black;
			border-radius: 10px;

		}

		.table2{

			width: 85.5%;

		}

		.table3{

			width: 90%;
			padding-top: 4%;
			padding-bottom: 4%;
			text-align: center;

		}

		.img1{

			width: 100%;

		}
		
		.img2{

			width: 100%;
			size: 100%;

		}

		.h1-1{

			font-size: 53px;
			font-weight: 0.3;
			text-align: center;

		}

		.div1{

			margin-top: 1%;
			width: 70%;
			padding-bottom: 2%;

		}

		.div2{

			border: 2px solid black;
			width: 99.8%;
			margin-top: -3%;
			margin-left: -0.1%;
			border-top-color: transparent;

		}
		.div3{
			
			border-radius: 10px;
			border: 2px solid red;
			width: 30%;
			margin-top: 7%;
			margin-left: 2%;

		}

		.div4{
			
			border-radius: 10px;
			border: 2px solid red;
			width: 30%;
			margin-top: -15.4%;
			margin-left: 40%;

		}

		.td3{

			font-size: 25px;
			width: 50%;
			height: 35px;
			border-radius: 10px;
			border: 2px solid black;
			text-align: center;
			background-color: red;
			color: white;
		}

		.td4{

			font-size: 25px;
			width: 50%;
			height: 35px;
			border-radius: 10px;
			border: 2px solid black;
			text-align: center;
			background-color: red;
			color: white;

		}

		.td5{

			font-size: 25px;
			width: 50%;
			height: 35px;
			border-radius: 10px;
			border: 2px solid black;
			text-align: center;
			background-color: red;
			color: white;
		}

		.div5{

			
			background-color: red;
			border: 2px solid black;
			width: 100%;		
			text-align: center;
			border-radius: 10px;
				
		}

		input{

			height: 25px;
			font-size: 18px;
			border-radius: 3px;

		}

		.th1{

			background-color: red;		
			border-radius: 10px;
			border: 2px solid black;

		}
		.div6{
			width: 85%;
			border-radius: 10px;	
			border: 2px solid black;
			margin-top: -1.5%;
			border-top-color: transparent;
			border-top-right-radius: 0px;
			border-top-left-radius: 0px; 
		}

		.div7{

			width: 99%;
			border-radius: 10px;	
			border: 2px solid black;
			margin-top: -9%;

			padding-top: 10%;
			border-top-color: transparent;
			border-top-right-radius: 0px;
			border-top-left-radius: 0px; 
			padding-bottom: 4%;
			text-align: center;
			align-content: center;

		}

		.div8{

			width: 98.5%;
			border-radius: 10px;	
			border: 2px solid black;
			margin-top: -6%;
			margin-left: 0.3%;
			padding-top: 10%;
			border-top-color: transparent;
			border-top-right-radius: 0px;
			border-top-left-radius: 0px; 
			padding-bottom: 4%;
			text-align: center;

		}

		.table4{
			width: 100%;
			align-content: center;
			margin-left: -39%;
		}

		.table5	{
			margin-left: -18%;
		}

		.table6 {
			width: 100%;
			margin-top: 2%;
			margin-bottom: 5%;
		}

		.table7{
			width: 45%;
		}

		.td6{

			font-size: 25px;
			width: 10%;
			height: 35px;
			border-radius: 10px;
			border: 2px solid black;
			text-align: center;
			background-color: red;
			color: white;
			align-content: center;

		}

		.div9{

			border: 2px solid black;
			width: 79.45%;
			margin-top: -2%;
			border-radius: 10px;
			padding-top: 3%;

		}


		option{
			text-align: center;
		}

		.table9{

			width: 85%;
			padding-top: 5%;
			padding-bottom: 5%;


		}

		.tableDate{
			width: 100%;
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

		}

		.inputReset{

			background-color: red;
			width: 120px;
			height: 50px;
			border-radius: 35px;	
			color: white;

			margin-top: 3%;

		}

		.inputDate{

			width: 70%;
			text-align: center;

		}

		.inputTime{

			width: 70.5%;
			text-align: center;

		}

		
		.signature {
    	    
            position: absolute;
            bottom: 10px; /* Adjust the bottom value to your preference */
            left: 10px;   /* Adjust the left value to your preference */
            font-size: 15px; /* Adjust the font size as needed */
            color: #333; /* Adjust the color as needed */
}


	</style>

</head>

<body>

	<center>
		<div class="div1">
		<table class="tableMain">
			<td>
				<table class="tableSec">
					<td class="td1">
						<img src="image/DARKV3.png" class="img1">
						
					</td>
					<td>
						<h1 class="h1-1">Follow Up Customer</h1>
					</td>
				</table>
			</td>
		</table>

			<br>


		<form action="" method="POST">



<?php 

$No = $_GET['No'];
$query = mysqli_query($connect, "SELECT * FROM remind where No = '$No' ");

while ($GET = mysqli_fetch_array($query)) {
	
	$Name = $GET['Name'];
	$Model = $GET['Model'];
	$Notel = $GET['Notel'];
	$ItemRepair = $GET['ItemRepair'];
	$ItemRepairO = $GET['ItemRepairO'];
	$DateR = $GET['DateR'];
	$DateF = $GET['DateF'];

}

 ?>




			<table class="table2">
				<tr class="tr1">
					<td class="td2">
						
						<h2>Information Customer</h2>

					</td>
				</tr>
			</table> 

			<div class="div6">
				
				<table class="table_no" align="left"><tr><td><input type="text"  name="No" size="3" style="font-size: 11px; background-color: #EEEDED; border-color: transparent; display: none;" value="<?php echo($No); ?>" readonly></table>


				<table class="table3">

					<tr>
						<td>
							<center>
							<table class="table5">


									<tr>
										<td class="td3">Name</td><td><input type="text" name="Name" size="18" value="<?php echo $Name; ?>" readonly></td>
									</tr>
									
									<tr><TD></TD></tr><tr><TD></TD></tr>
									
									<tr>
										<td class="td4">Number</td><td><input type="text" name="Notel" size="18" value="<?php echo $Notel; ?>" readonly></td>
									</tr>

									<tr><TD></TD></tr><tr><TD></TD></tr>

									<tr>
										<td class="td5">Model</td><td><input type="text" name="Model" size="18" value="<?php echo $Model; ?>" readonly></td>
									</tr>
							</table>
							</center>
						</td>

						<td>
							<center>
							<table class="table4">
								<tr><td class="td6">Item Repair</td></tr>

								<tr>
									<td><div class="div7">

										<div><select name="ItemRepair" id="mySelect" style="width: 65%; text-align: center; margin-top: 4%; margin-bottom: 4%; height: 25px;" disabled>
											<option disabled selected hidden><?php echo $ItemRepair; ?></option>
											<option value="Motherboard">Motherboard</option>
											<option value="Battery Android">Battery Android</option>
											<option value="Battery Iphone">Battery Iphone</option>
											<option value="LCD Android">LCD Android</option>
											<option value="LCD Iphone">LCD Iphone</option>
											<option value="Other">Other</option>
											</select>

											<center><textarea type="text" id="otherInput" name="ItemRepairO" style="font-size: 15px;" cols="17" rows="5" placeholder="None" readonly><?php echo $ItemRepairO; ?></textarea></center>

<script>
  // Get references to the select element and the text input element
  var selectElement = document.getElementById('mySelect');
  var otherInputElement = document.getElementById('otherInput');

  // Add an event listener to the select element
  selectElement.addEventListener('change', function () {
    // Check if the selected option is "other"
    if (selectElement.value === 'Other') {
      // Show the text input
      otherInputElement.style.display = 'block';
    } else {
      // Hide the text input
      otherInputElement.style.display = 'none';
    }
  });
</script>



										</div>

										</div></td>
								</tr>
							</table>
							</center>
						</td>
					</tr>
				</table>

				<table class="table6">
					
					<tr>
						<td><center>
							<table class="table7">
								<tr><td>
									
									<table>
										<tr><td class="td6">Date Follow Up</td></tr>
									</table>

								</td></tr>

								<tr>
									<td><div class="div8"><center><table class="tableDate"><tr><td><center>Date (R) : &nbsp;<input type="date" name="DateR" id="dateInput" class="inputDate" value="<?php echo($DateR) ?>" readonly ></center></td></tr>									

									<tr><td><center>Date (F) :  &nbsp;&nbsp;<input type="date" name="DateF" id="selectedDate" size="8" class="inputTime" value="<?php echo($DateF) ?>" readonly></center></td></tr></table></center></div></td>



    <!--<script>
        // Function to set the date based on the selected option
        function setDateBasedOnOption() {
            const selectElement = document.getElementById('mySelect');
            const selectedOption = selectElement.value;
            const currentDate = new Date();

            if (selectedOption === 'Motherboard') {
                // Calculate the date for next week
                currentDate.setMonth(currentDate.getMonth() + 1);
            } 

            else if (selectedOption === 'Battery Iphone') {
                // Calculate the date for next month
                currentDate.setDate(currentDate.getDate() + 14);
            }

            else if (selectedOption === 'disabled') {
            	document.getElementById('selectedDate').value = "";
                return;
            }

            else if (selectedOption === 'Battery Android') {
                // Calculate the date for next month
                currentDate.setDate(currentDate.getDate() + 14);
            }

            else if (selectedOption === 'LCD Iphone') {
                // Calculate the date for next month
                currentDate.setMonth(currentDate.getMonth() + 1);
            }

            else if (selectedOption === 'LCD Android') {
                // Calculate the date for next month
                currentDate.setDate(currentDate.getDate() + 14);
            }

            else if (selectedOption === 'Other') {
                // Calculate the date for next month
                document.getElementById('selectedDate').value = "";
                
            }

            

            // Format the date as "yyyy-MM-dd" for input type="date"
            const selectedDate = currentDate.toISOString().slice(0, 10);

            // Set the input field value to the selected date
            document.getElementById('selectedDate').value = selectedDate;
        }

        // Add an event listener to the dropdown to trigger the date update
        document.getElementById('mySelect').addEventListener('change', setDateBasedOnOption);

        // Initialize the date based on the default selected option
        setDateBasedOnOption();
    </script>-->


								</tr>
							</table>
							</center>
						</td>
					</tr>

				</table>

					<div>
						<p align="center" style="margin-top: -4.5%; margin-bottom: 5%; font-size: 13px; display: none;">*Need to manual set the <b>Date Follow Up (Date (F))</b> if select <b>Item Repair</b> to <b>Other</b>
					</div>

			</div>

 <button class="inputBtn"><a href="reminder.php" style="text-decoration:none; color: white;">BACK</a></button>


		</form>
		</div>
	</center>
	<div class="signature">-- Lite Versions --</div>

</body>
</html>