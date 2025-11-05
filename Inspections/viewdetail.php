<?php 
require ('config.php');


$query = mysqli_query($connect, "SELECT * FROM faceit");

session_start();

require 'timer.php';

 ?>

<!DOCTYPE html>
<html>
<link rel="icon" type="image/png" href="image/logo.png">
<head>

	<!--<link href="css.css" rel="stylesheet">-->
	<title>Update Form Checklist</title>

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
			padding-top: 1%;
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

			width: 65%;

		}

		.inputTime{

			width: 65.5%;

		}

		.table_no{

			margin-top: 30px;
			text-align: left;
			margin-left: 1.5%; 

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


<?php 

$No = $_GET['No'];
$query = mysqli_query($connect, "SELECT * FROM faceit where No = '$No' ");

while ($GET = mysqli_fetch_array($query)) {
	
		$Inspec = $GET['Inspec'];
		$No = $GET['No'];
		$Name = $GET['Name'];
		$Notel = $GET['Notel'];
		$Model = $GET['Model'];
		$Pin = $GET['Pin'];
		$Date = $GET['Date'];
		$Time = $GET['Time'];
		$Sim = $GET['Sim'];
		$Bspeaker = $GET['Bspeaker'];
		$Bluetooth = $GET['Bluetooth'];
		$Tmic = $GET['Tmic'];
		$Fprint = $GET['Fprint'];
		$Gyro = $GET['Gyro'];
		$Espeaker = $GET['Espeaker'];
		$Bhealth = $GET['Bhealth'];
		$Charging = $GET['Charging'];
		$Bmic = $GET['Bmic'];
		$Body = $GET['Body'];
		$Compass = $GET['Compass'];
		$Other = $GET['Other'];

}

 ?>

			<table class="table2">
				<tr class="tr1">
					<td class="td2">
						
						<h2>Basic Information</h2>

					</td>
				</tr>
			</table> 

			<div class="div6">
				
				<table class="table_no" align="left"><tr><td><input type="text"  name="No" size="3" style="font-size: 11px; background-color: #EEEDED; border-color: transparent; display: none;" value="<?php echo($No); ?>" dis readonly></table>

					<table class="table_no" align="left" style=" margin-top: 3.5%;"><tr><td>Inspection : <select name="Inspec" disabled>
											<option><?php echo ($Inspec); ?></option>
											<option>Before Repair</option>
											<option>After Repair</option>
										</select></table>

				<table class="table3">
					<tr>
						<td>
							<center>
								
							<table>
									<tr>
										<td class="td3">Name</td><td><input type="text" name="Name" size="13" required value="<?php echo($Name) ?>" disabled></td>
									</tr>
									
									<tr><TD></TD></tr><tr><TD></TD></tr>
									
									<tr>
										<td class="td4">No. Tel</td><td><input type="text" name="Notel" value="<?php echo($Notel) ?>" size="13"  required disabled></td>
									</tr>

									<tr><TD></TD></tr><tr><TD></TD></tr>

									<tr>
										<td class="td5">Model</td><td><input type="text" name="Model" value="<?php echo($Model) ?>" size="13" required disabled></td>
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
									<td><div class="div7">PIN :  &nbsp;&nbsp;<input type="name" name="Pin" size="8" placeholder="123456" required value="<?php echo($Pin) ?>"  disabled></div></td>
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
									<td><div class="div8"><center><table class="table7"><tr><td>Date  :  &nbsp;&nbsp;&nbsp;<input type="date" name="Date" size="8" class="inputDate" required  disabled value="<?php echo($Date) ?>"></td></tr>									

									<tr><td>Time  :  &nbsp;&nbsp;<input type="time" name="Time" size="8" class="inputTime" value="<?php echo($Time) ?>" required disabled></td></tr></table></center></div></td>

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
										<td><select name="Sim" disabled>
											<option disabled selected hidden><?php echo ($Sim); ?></option>
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
										<td><select name="Bspeaker" disabled>
											<option disabled selected hidden><?php echo ($Bspeaker); ?></option>
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
										<td><select name="Bluetooth" disabled>
											<option disabled selected hidden><?php echo ($Bluetooth); ?></option>
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
										<td><select name="Tmic" disabled>
											<option disabled selected hidden><?php echo ($Tmic); ?></option>
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
									<td><select name="Fprint" disabled>
											<option disabled selected hidden><?php echo ($Fprint); ?></option>
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
									<td><select name="Gyro" disabled>
											<option disabled selected hidden><?php echo ($Gyro); ?></option>
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
										<td><select name="Espeaker" disabled>
											<option disabled selected hidden><?php echo ($Espeaker); ?></option>
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
										<td><select name="Bhealth" disabled>
											<option disabled selected hidden><?php echo ($Bhealth); ?></option>
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
										<td><select name="Charging" disabled>
											<option disabled selected hidden><?php echo ($Charging); ?></option>
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
										<td><select name="Bmic" disabled>
											<option disabled selected hidden><?php echo ($Bmic); ?></option>
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
										<td><select name="Body" disabled>
											<option disabled selected hidden><?php echo ($Body); ?></option>
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
									<td><select name="Compass" disabled>
											<option disabled selected hidden><?php echo ($Compass); ?></option>
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
									<p>Other : <br><textarea rows="6" name="Other" readonly disabled><?php echo ($Other); ?></textarea></p>
									
								</div>
							</td>
						</tr>
					</table>
					
					


				</div>

<a href="home.php"><button class="inputBtn"> Back </button></a>
		</div>
	</center>

</body>
</html>