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
	<title>Mobile Inspections</title>
	<!--<script src="scriptdate.js"></script>-->
	<script src="scripttime.js"></script>

	<style type="text/css">
		.tableMain{

			width: 85%;

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

			width: 80%;

		}

		.table3{

			width: 100%;
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

			font-size: 42px;

		}

		.div1{

			margin-top: 2%;
			width: 70%;
			padding-bottom: 3%;

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
			width: 79.4%;
			border-radius: 10px;	
			border: 2px solid black;
			margin-top: -1.5%;
			border-top-color: transparent;
			border-top-right-radius: 0px;
			border-top-left-radius: 0px; 
		}

		.div7{

			width: 96.2%;
			border-radius: 10px;	
			border: 2px solid black;
			margin-top: -9%;
			margin-left: 1%;
			padding-top: 10%;
			border-top-color: transparent;
			border-top-right-radius: 0px;
			border-top-left-radius: 0px; 
			padding-bottom: 4%;
			text-align: center;

		}

		.div8{

			width: 96.7%;
			border-radius: 10px;	
			border: 2px solid black;
			margin-top: -9%;
			margin-left: 1%;
			padding-top: 10%;
			border-top-color: transparent;
			border-top-right-radius: 0px;
			border-top-left-radius: 0px; 
			padding-bottom: 4%;
			text-align: center;

		}

		.table4{
			width: 70%;
		}

		.table6	{
			width: 70%;
		}


		.td6{

			font-size: 25px;
			width: 50%;
			height: 35px;
			border-radius: 10px;
			border: 2px solid black;
			text-align: center;
			background-color: red;
			color: white;

		}

		.div9{

			border: 2px solid black;
			width: 79.45%;
			margin-top: -2%;
			border-radius: 10px;
			padding-top: 3%;

		}

		.table8{

			text-align: left;

		}

		option{
			text-align: center;
		}

		.table9{

			width: 85%;
			padding-top: 5%;
			padding-bottom: 5%;


		}

		.inputBtn{

			background-color: red;
			width: 120px;
			height: 50px;
			border-radius: 35px;	
			color: white;

			margin-top: 3%;

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

			width: 65%;

		}

		.inputTime{

			width: 65.5%;

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
						<h1 class="h1-1">Mobile Inspections Checklist</h1>
					</td>
				</table>
			</td>
		</table>

			<br>


		<form action="save.php" method="POST">


			<table class="table2">
				<tr class="tr1">
					<td class="td2">
						
						<h2>Basic Information</h2>

					</td>
				</tr>
			</table> 

			<div class="div6">

				<table class="table_no" align="left" style="margin-left: 3.5%; margin-top: 4%; margin-bottom: -2%;"><tr><td>Inspection : <select name="Inspec" required>
											<option value="" disabled selected hidden>Select</option>
											<option>Before Repair</option>
											<option>After Repair</option>
										</select></table>
				
				
				<table class="table3">

					<tr>
						<td>
							<center>
							<table>


									<tr>
										<td class="td3">Name</td><td><input type="text" name="Name" size="13" placeholder=": Ali" required></td>
									</tr>
									
									<tr><TD></TD></tr><tr><TD></TD></tr>
									
									<tr>
										<td class="td4">Number</td><td><input type="text" name="Notel" size="13" placeholder=": 012 345 6789" required></td>
									</tr>

									<tr><TD></TD></tr><tr><TD></TD></tr>

									<tr>
										<td class="td5">Model</td><td><input type="text" name="Model" size="13" placeholder=": Samsung A30" required></td>
									</tr>
							</table>
							</center>
						</td>
						


						<td>
							<center>
							<table class="table4">
								<tr><td>
									
									<table class="table5">
										<tr><td class="td6">Password</td></tr>
									</table>

								</td></tr>

								<tr>
									<td><div class="div7">PIN :  &nbsp;&nbsp;<input type="name" name="Pin" size="8" placeholder="123456" required></div></td>
								</tr>
							</table>
							</center>
						</td>

						

						<td><center>
							<table class="table6">
								<tr><td>
									
									<table>
										<tr><td class="td6">Date & Time</td></tr>
									</table>

								</td></tr>

								<tr>
									<td><div class="div8"><center><table class="table7"><tr><td>Date  :  &nbsp;&nbsp;&nbsp;<input type="date" name="Date" id="dateInput" size="8" class="inputDate"  required ></td></tr>									
										<script type="text/javascript">
										
										// Get the current date in YYYY-MM-DD format
										function getCurrentDate() {
										  const now = new Date();
										  const year = now.getFullYear();
										  const month = String(now.getMonth() + 1).padStart(2, '0');
										  const day = String(now.getDate()).padStart(2, '0');
										  return `${year}-${month}-${day}`;
										}

										// Set the value of the date input field to the current date
										document.addEventListener('DOMContentLoaded', function() {
										  const dateInput = document.getElementById('dateInput');
										  dateInput.value = getCurrentDate();
										});


									</script>	


									<tr><td>Time  :  &nbsp;&nbsp;<input type="time" name="Time" id="timeInput" size="8" class="inputTime" required></td></tr></table></center></div></td>

								</tr>
							</table>
							</center>
						</td>


					</tr>
				</table>

			</div>

<br><br>

				<table class="table2">
				<tr class="tr1">
					<td class="td2">
						
						<h2>QC / Status Inspections</h2>

					</td>
				</tr>
				</table> 


				<div class="div9" style="border-top-color: transparent; border-top-left-radius: 0%; border-top-right-radius: 0%;">

					<div>
						<b><h4 align="left" style="margin-left: 5%; margin-top: 1%;">QC Inspections</h4></b>
						<p align="left" style="margin-left: 5%; margin-top: -1%;">A: Good Condition  &nbsp;&nbsp;&nbsp; B: Minor  &nbsp;&nbsp;&nbsp; C: Need Repair/Replace  &nbsp;&nbsp;&nbsp; D: None</p>
					</div>


					<div>
						<img src="image/pic2.png" class="img2">
					</div>


					<div>
						<p align="left" style="margin-left: 5%; margin-top: -4%; font-size: 11px;">*Pwr Btn : Power Button &nbsp;&nbsp;&nbsp; *SW : Switch &nbsp;&nbsp;&nbsp; *Vol Btn : Volume Button &nbsp;&nbsp;&nbsp; *PLSTC : Plastic
					</div>


					<table class="table9">
						<tr>
							<td>
								<table>
									<tr>
										<td><b>Network Signal (SIM) :</b></td> 
										<td><select name="Sim">
											<option value="" disabled selected hidden>Selection..</option>
											<option>A</option>
											<option>B</option>
											<option>C</option>
											<option>D</option>
											</select>
										</td>
									</tr>

<tr><td><br></td></tr>


									<tr>
										<td><b>Bottom Speaker :</b></td> 
										<td><select name=" Bspeaker">
											<option value="" disabled selected hidden>Selection..</option>
											<option>A</option>
											<option>B</option>
											<option>C</option>
											<option>D</option>
											</select>
										</td>
									</tr>

<tr><td><br></td></tr>
									<tr>
										<td><b>Bluetooth :</b></td> 
										<td><select name="Bluetooth">
											<option value="" disabled selected hidden>Selection..</option>
											<option>A</option>
											<option>B</option>
											<option>C</option>
											<option>D</option>
											</select>
										</td>
									</tr>
<tr><td><br></td></tr>

									<tr>
										<td><b>Top Microphone :</b></td> 
										<td><select name="Tmic">
											<option value="" disabled selected hidden>Selection..</option>
											<option>A</option>
											<option>B</option>
											<option>C</option>
											<option>D</option>
											</select>
										</td>
									</tr>
<tr><td><br></td></tr>
									<tr>
									<td><b>Face ID / Finggerprint :</b></td> 
									<td><select name="Fprint">
											<option value="" disabled selected hidden>Selection..</option>
											<option>A</option>
											<option>B</option>
											<option>C</option>
											<option>D</option>
										</select>
									</td>
									</tr>

<tr><td><br></td></tr>
									<tr>
									<td><b>Gyroscope :</b></td> 
									<td><select name="Gyro">
											<option value="" disabled selected hidden>Selection..</option>
											<option>A</option>
											<option>B</option>
											<option>C</option>
											<option>D</option>
										</select>
									</td>
									</tr>

								</table>
							</td>



							<td>
								
								<table>
									<tr>
										<td><b>Earpiece Speaker :</b></td> 
										<td><select name="Espeaker">
											<option value="" disabled selected hidden>Selection..</option>
											<option>A</option>
											<option>B</option>
											<option>C</option>
											<option>D</option>
											</select>
										</td>
									</tr>

<tr><td><br></td></tr>
									<tr>
										<td><b>Battery Health :</b></td> 
										<td><select name="Bhealth">
											<option value="" disabled selected hidden>Selection..</option>
											<option>A</option>
											<option>B</option>
											<option>C</option>
											<option>D</option>
											</select>
										</td>
									</tr>

<tr><td><br></td></tr>
									<tr>
										<td><b>Charging :</b></td> 
										<td><select name="Charging">
											<option value="" disabled selected hidden>Selection..</option>
											<option>A</option>
											<option>B</option>
											<option>C</option>
											<option>D</option>
											</select>
										</td>
									</tr>

<tr><td><br></td></tr>
									<tr>
										<td><b>Bottom Microphone :</b></td> 
										<td><select name="Bmic">
											<option value="" disabled selected hidden>Selection..</option>
											<option>A</option>
											<option>B</option>
											<option>C</option>
											<option>D</option>
											</select>
										</td>
									</tr>
<tr><td><br></td></tr>

									<tr>
										<td><b>Body :</b></td> 
										<td><select name="Body">
											<option value="" disabled selected hidden>Selection..</option>
											<option>A</option>
											<option>B</option>
											<option>C</option>
											<option>D</option>
											</select>
										</td>
									</tr>

<tr><td><br></td></tr>
									<tr>
									<td><b>Compass (Magneto) :</b></td> 
									<td><select name="Compass">
											<option value="" disabled selected hidden>Selection..</option>
											<option>A</option>
											<option>B</option>
											<option>C</option>
											<option>D</option>
										</select>
									</td>
									</tr>

								</table>

							</td>
						
							<td>
								<div>
									<p>Other : <br><textarea rows="10" cols="30" name="Other" placeholder="Cth: *Mic bawah tidak berfungsi"></textarea></p>
									
								</div>
							</td>
						</tr>
					</table>
					
					


				</div>

<input type="submit" name="save" value="SAVE" class="inputBtn"> &nbsp;  &nbsp;  &nbsp; <input type="reset" name="reset" value="RESET" class="inputReset">

		</form>
		</div>
	</center>

</body>
</html>