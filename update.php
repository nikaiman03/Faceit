<?php 
session_start();
require ('config.php');
include("functions.php");
require 'timer.php';

// 1. Access Control
$user_data = check_login($connect);

// 2. Generate CSRF Token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// 3. Secure Data Retrieval
if (isset($_GET['No']) && is_numeric($_GET['No'])) {
    $No = $_GET['No'];
    $stmt = $connect->prepare("SELECT * FROM faceit WHERE No = ? LIMIT 1");
    $stmt->bind_param("i", $No);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $GET = $result->fetch_assoc();
        
        function clean($data) {
            return htmlspecialchars($data ?? '', ENT_QUOTES, 'UTF-8');
        }

        // Map variables from Database
        $Inspec    = clean($GET['Inspec']);
        $No        = clean($GET['No']);
        $Name      = clean($GET['Name']);
        $Notel     = clean($GET['Notel']);
        $Model     = clean($GET['Model']);
        $Pin       = clean($GET['Pin']);
        $Date      = clean($GET['Date']);
        $Time      = clean($GET['Time']);
        
        // Inspection Fields
        $Sim       = clean($GET['Sim']);
        $Bspeaker  = clean($GET['Bspeaker']);
        $Bluetooth = clean($GET['Bluetooth']);
        $Tmic      = clean($GET['Tmic']);
        $Espeaker  = clean($GET['Espeaker']);
        $Bhealth   = clean($GET['Bhealth']);
        $Charging  = clean($GET['Charging']);
        $Bmic      = clean($GET['Bmic']);
        $Body      = clean($GET['Body']);
        $Fprint    = clean($GET['Fprint']);
        $Gyro      = clean($GET['Gyro']);
        $Compass   = clean($GET['Compass']);
        $Other     = clean($GET['Other']);
    } else {
        die("Record not found.");
    }
    $stmt->close();
} else {
    header("Location: home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="image/logo.png">
    <title>Update Inspection | Faceit Solutions</title>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body { background-color: #f4f4f4; font-family: 'Poppins', sans-serif; margin: 0; padding: 20px; }

        /* Main Container */
        .div1 { 
            background: white; 
            max-width: 1150px; 
            margin: 30px auto; 
            padding: 50px; 
            border-radius: 15px; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.1); 
        }

        .tableMain { width: 100%; margin-bottom: 40px; }
        .img1 { width: 220px; }
        .h1-1 { font-size: 32px; font-weight: 700; color: #131313; text-align: right; }

        /* Headers */
        .td2 { 
            background-color: #FF1616; 
            color: white; 
            text-align: center; 
            border-radius: 50px; 
            padding: 12px; 
            margin-bottom: 25px; 
            display: block;
        }

        /* Sections */
        .div6, .div9 { 
            width: 100%; 
            border-radius: 15px; 
            border: 1px solid #eee; 
            background: #fafafa; 
            padding: 35px; 
            box-sizing: border-box; 
            margin-bottom: 35px; 
        }

        /* Input Styling & Spacing */
        input[type="text"], input[type="date"], input[type="time"], select, textarea {
            width: 100%; 
            padding: 12px; 
            border: 1px solid #ddd; 
            border-radius: 8px; 
            font-size: 14px; 
            margin-top: 10px; /* Space from label */
            margin-bottom: 15px; /* Space to next element */
            display: block;
            transition: 0.3s;
        }

        input:focus, select:focus { border-color: #FF1616; outline: none; box-shadow: 0 0 5px rgba(255,22,22,0.2); }

        /* 3-Column Grid Layout */
        .qc-grid { 
            display: grid; 
            grid-template-columns: 1fr 1fr 1fr; 
            gap: 40px; /* Strong horizontal spacing */
            text-align: left; 
        }

        .qc-item { 
            margin-bottom: 25px; /* Vertical spacing between dropdowns */
        }

        .qc-item b { 
            font-size: 14px; 
            color: #444; 
            display: block; 
            margin-bottom: 5px; 
        }

        /* Buttons */
        .inputBtn { 
            background-color: #FF1616; 
            width: 250px; 
            height: 60px; 
            border-radius: 50px; 
            color: white; 
            font-weight: 600; 
            border: none; 
            cursor: pointer; 
            transition: 0.3s; 
            box-shadow: 0 5px 15px rgba(255, 22, 22, 0.4); 
            margin-top: 20px;
        }

        .inputBtn:hover { background-color: #d11212; transform: translateY(-2px); }

        .qc-legend { 
            background: #fff; 
            padding: 15px; 
            border-left: 5px solid #FF1616; 
            margin-bottom: 30px; 
            font-size: 13px; 
            border-radius: 4px;
        }
    </style>
</head>
<body>

<div class="div1">
    <table class="tableMain">
        <tr>
            <td><img src="image/DARKV3.png" class="img1"></td>
            <td><h1 class="h1-1">Update Inspection #<?php echo $No; ?></h1></td>
        </tr>
    </table>

    <form action="updatePros.php" method="POST">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <input type="hidden" name="No" value="<?php echo $No; ?>">

        <div class="td2"><h3>Basic Information</h3></div>
        <div class="div6">
            <div style="display: flex; gap: 20px;">
                <div style="flex: 1;">
                    <b>Inspection Type</b>
                    <select name="Inspec">
                        <option value="Before Repair" <?php if($Inspec == "Before Repair") echo "selected"; ?>>Before Repair</option>
                        <option value="After Repair" <?php if($Inspec == "After Repair") echo "selected"; ?>>After Repair</option>
                    </select>
                </div>
                <div style="flex: 1;">
                    <b>Customer Name</b>
                    <input type="text" name="Name" value="<?php echo $Name; ?>" required>
                </div>
                <div style="flex: 1;">
                    <b>Contact Number</b>
                    <input type="text" name="Notel" value="<?php echo $Notel; ?>" required>
                </div>
            </div>

            <div style="display: flex; gap: 20px;">
                <div style="flex: 1;"><b>Device Model</b><input type="text" name="Model" value="<?php echo $Model; ?>" required></div>
                <div style="flex: 1;"><b>Screen PIN</b><input type="text" name="Pin" value="<?php echo $Pin; ?>" required></div>
                <div style="flex: 1;">
                    <div style="display: flex; gap: 10px;">
                        <div style="flex: 1;"><b>Date</b><input type="date" name="Date" value="<?php echo $Date; ?>"></div>
                        <div style="flex: 1;"><b>Time</b><input type="time" name="Time" value="<?php echo $Time; ?>"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="td2"><h3>QC / Status Inspections</h3></div>
        <div class="div9">
            <div class="qc-legend"><strong>QC Grading:</strong> A: Good | B: Minor | C: Repair | D: None</div>
            
            <div class="qc-grid">
                <div>
                    <?php 
                    $col1 = ['Sim'=>'Network Signal','Bspeaker'=>'Bottom Speaker','Bluetooth'=>'Bluetooth','Tmic'=>'Top Mic','Espeaker'=>'Earpiece','Bhealth'=>'Battery Health'];
                    foreach($col1 as $n => $l): ?>
                        <div class="qc-item">
                            <b><?php echo $l; ?></b>
                            <select name="<?php echo $n; ?>">
                                <?php foreach(['A','B','C','D'] as $opt): ?>
                                    <option value="<?php echo $opt; ?>" <?php if($$n == $opt) echo "selected"; ?>><?php echo $opt; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div>
                    <?php 
                    $col2 = ['Charging'=>'Charging','Bmic'=>'Bottom Mic','Body'=>'Body Condition','Fprint'=>'FaceID/Fingerprint','Gyro'=>'Gyroscope','Compass'=>'Compass'];
                    foreach($col2 as $n => $l): ?>
                        <div class="qc-item">
                            <b><?php echo $l; ?></b>
                            <select name="<?php echo $n; ?>">
                                <?php foreach(['A','B','C','D'] as $opt): ?>
                                    <option value="<?php echo $opt; ?>" <?php if($$n == $opt) echo "selected"; ?>><?php echo $opt; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div>
                    <b style="display: block; margin-bottom: 5px;">Other Observations</b>
                    <textarea name="Other" style="height: 500px; resize: none;" placeholder="Enter additional details..."><?php echo $Other; ?></textarea>
                </div>
            </div>
        </div>

        <center>
            <input type="submit" name="update" value="UPDATE INSPECTION" class="inputBtn">
        </center>
    </form>
</div>

</body>
</html>