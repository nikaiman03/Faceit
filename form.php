<?php 
// 1. Secure Session & Access Control
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

include("config.php");
require("Counter/10minCount.html");
require 'timer.php';

// 2. Generate CSRF Token
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="image/logo.png">
    <title>Mobile Inspections | Faceit Solutions</title>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body {
            background-color: #f4f4f4;
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 20px;
        }

        /* Card Container */
        .div1 {
            background: white;
            max-width: 1100px; /* Slightly wider to accommodate 3 columns */
            margin: 20px auto;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .tableMain { width: 100%; margin-bottom: 30px; }
        .img1 { width: 220px; }
        .h1-1 { font-size: 32px; font-weight: 700; color: #131313; text-align: right; }

        /* Section Headers */
        .td2 { 
            background-color: #FF1616; 
            color: white; 
            text-align: center; 
            border-radius: 50px; 
            padding: 10px;
            box-shadow: 0 4px 10px rgba(255, 22, 22, 0.3);
            margin-bottom: 10px;
        }

        /* Modernized Input Boxes */
        .div6, .div9 { 
            width: 100%; 
            border-radius: 15px; 
            border: 1px solid #eee; 
            background: #fafafa;
            padding: 25px;
            box-sizing: border-box;
            margin-bottom: 25px;
        }

        input[type="text"], input[type="date"], input[type="time"], select, textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            margin-top: 5px;
            transition: 0.3s;
        }

        input:focus { border-color: #FF1616; outline: none; box-shadow: 0 0 5px rgba(255,22,22,0.2); }

        /* Status Selection Grid */
        .qc-grid {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 25px;
            text-align: left;
        }

        .qc-item { margin-bottom: 15px; }
        .qc-item b { font-size: 13px; color: #555; }

        /* Buttons */
        .inputBtn, .inputReset { 
            background-color: #FF1616; 
            width: 180px; 
            height: 50px; 
            border-radius: 50px; 
            color: white; 
            font-weight: 600;
            border: none; 
            cursor: pointer; 
            transition: 0.3s;
            box-shadow: 0 5px 15px rgba(255, 22, 22, 0.4);
        }

        .inputBtn:hover { background-color: #d11212; transform: translateY(-2px); }
        .inputReset { background-color: #333; box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2); width: 150px; }
        .inputReset:hover { background-color: #000; transform: translateY(-2px); }

        .qc-legend {
            background: #fff;
            padding: 10px;
            border-left: 4px solid #FF1616;
            margin-bottom: 20px;
            font-size: 13px;
        }
    </style>
</head>
<body>

<div class="div1">
    <table class="tableMain">
        <tr>
            <td><img src="image/DARKV3.png" class="img1" alt="Logo"></td>
            <td><h1 class="h1-1">Inspection Checklist</h1></td>
        </tr>
    </table>

    <form action="save.php" method="POST">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

        <div class="td2"><h3>Basic Information</h3></div>
        <div class="div6">
            <table width="100%" cellpadding="10">
                <tr>
                    <td width="30%">
                        <b>Inspection Type</b><br>
                        <select name="Inspec" required>
                            <option value="Before Repair">Before Repair</option>
                            <option value="After Repair">After Repair</option>
                        </select>
                    </td>
                    <td width="35%">
                        <b>Customer Name</b><br>
                        <input type="text" name="Name" placeholder="e.g. Ali" pattern="[A-Za-z\s]+" required>
                    </td>
                    <td width="35%">
                        <b>Contact Number</b><br>
                        <input type="text" name="Notel" placeholder="0123456789" pattern="[0-9]+" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>Device Model</b><br>
                        <input type="text" name="Model" placeholder="Samsung A30" required>
                    </td>
                    <td>
                        <b>Screen PIN / Password</b><br>
                        <input type="text" name="Pin" placeholder="123456" required>
                    </td>
                    <td>
                        <table width="100%">
                            <tr>
                                <td><b>Date</b><input type="date" name="Date" id="dateInput" required></td>
                                <td><b>Time</b><input type="time" name="Time" id="timeInput" required></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>

        <div class="td2"><h3>QC / Status Inspections</h3></div>
<div class="div9">
    <div class="qc-legend">
        <strong>QC Grading:</strong> A: Good | B: Minor | C: Repair | D: None
    </div>
    
    <center><img src="image/pic2.png" style="width:80%; border-radius:10px; margin-bottom:20px;"></center>

    <div class="qc-grid">
        <div>
            <?php 
            $col1 = [
                'Sim' => 'Network Signal', 
                'Bspeaker' => 'Bottom Speaker', 
                'Bluetooth' => 'Bluetooth', 
                'Tmic' => 'Top Mic',
                'Espeaker' => 'Earpiece',
                'Bhealth' => 'Battery Health'
            ];
            foreach($col1 as $n => $l) {
                echo "<div class='qc-item'><b>$l</b><select name='$n'><option value='A'>A</option><option value='B'>B</option><option value='C'>C</option><option value='D'>D</option></select></div>";
            }
            ?>
        </div>

        <div>
            <?php 
            $col2 = [
                'Charging' => 'Charging', 
                'Bmic' => 'Bottom Mic',
                'Body' => 'Body Condition',
                'Fprint' => 'FaceID/Fingerprint',
                'Gyro' => 'Gyroscope',
                'Compass' => 'Compass'
            ];
            foreach($col2 as $n => $l) {
                echo "<div class='qc-item'><b>$l</b><select name='$n'><option value='A'>A</option><option value='B'>B</option><option value='C'>C</option><option value='D'>D</option></select></div>";
            }
            ?>
        </div>

        <div>
            <b style="font-size: 14px; color: #131313;">Other Observations</b>
            <textarea name="Other" style="height: 415px; margin-top: 10px;" placeholder="Example: Screen has minor scratches..."></textarea>
        </div>
    </div>
</div>

        <center>
            <input type="submit" name="save" value="SAVE INSPECTION" class="inputBtn"> 
            &nbsp; <input type="reset" value="CLEAR FORM" class="inputReset">
        </center>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const now = new Date();
        document.getElementById('dateInput').value = now.toISOString().split('T')[0];
        document.getElementById('timeInput').value = now.getHours().toString().padStart(2, '0') + ":" + now.getMinutes().toString().padStart(2, '0');
    });
</script>
</body>
</html>