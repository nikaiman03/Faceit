<?php 
session_start();
require('config.php');

// 1. Access Control
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

require 'timer.php';

// Helper function for XSS protection
function clean($data) {
    return htmlspecialchars($data ?? '', ENT_QUOTES, 'UTF-8');
}

// 2. Data Fetching
if (isset($_GET['No'])) {
    $No_val = $_GET['No'];
    $stmt = $connect->prepare("SELECT * FROM faceit WHERE No = ? LIMIT 1");
    $stmt->bind_param("i", $No_val);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $GET = $result->fetch_assoc();
        
        // FIXED: Added ?? '' to handle missing keys in the database
        $Inspec    = clean($GET['Inspec'] ?? 'N/A'); 
        $No        = clean($GET['No'] ?? '0');
        $Name      = clean($GET['Name'] ?? '');
        $Notel     = clean($GET['Notel'] ?? '');
        $Model     = clean($GET['Model'] ?? '');
        $Pin       = clean($GET['Pin'] ?? '');
        $Date      = clean($GET['Date'] ?? '');
        $Time      = clean($GET['Time'] ?? '');
        $Sim       = clean($GET['Sim'] ?? '');
        $Bspeaker  = clean($GET['Bspeaker'] ?? '');
        $Bluetooth = clean($GET['Bluetooth'] ?? '');
        $Tmic      = clean($GET['Tmic'] ?? '');
        $Fprint    = clean($GET['Fprint'] ?? '');
        $Gyro      = clean($GET['Gyro'] ?? $GET['Gyroscope'] ?? ''); // Check both common names
        $Espeaker  = clean($GET['Espeaker'] ?? '');
        $Bhealth   = clean($GET['Bhealth'] ?? '');
        $Charging  = clean($GET['Charging'] ?? '');
        $Bmic      = clean($GET['Bmic'] ?? '');
        $Body      = clean($GET['Body'] ?? '');
        $Compass   = clean($GET['Compass'] ?? '');
        $Other     = clean($GET['Other'] ?? '');
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
    <title>Inspection Details | Faceit Solutions</title>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body { background-color: #f8f9fa; color: #333; padding-bottom: 50px; }

        header {
            background: white; padding: 15px 5%; display: flex;
            justify-content: space-between; align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05); margin-bottom: 30px;
        }
        .logo-area img { width: 180px; }

        .container { width: 900px; margin: 0 auto; background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1); border: 1px solid #eee; }
        
        .card-header { background: #FF1616; color: white; padding: 25px; text-align: center; }
        .card-body { padding: 40px; }

        /* Section Titles */
        .section-title { 
            background: #FF1616; color: white; padding: 8px 25px; border-radius: 8px; 
            display: inline-block; font-size: 14px; font-weight: 600; margin-bottom: 25px;
            border: 1px solid #000;
        }

        .info-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; margin-bottom: 40px; }
        
        .data-item { margin-bottom: 15px; }
        .label-box { 
            background: #FF1616; color: white; padding: 5px 15px; border-radius: 8px 8px 0 0; 
            font-size: 12px; font-weight: 600; border: 1px solid #000; display: inline-block;
        }
        .value-box { 
            background: #fff; padding: 10px; border: 1px solid #000; border-radius: 0 8px 8px 8px; 
            font-size: 15px; font-weight: 500; min-height: 45px;
        }

        /* QC Grid Layout */
        .qc-grid { 
            display: grid; grid-template-columns: repeat(4, 1fr); gap: 15px; 
            background: #fdfdfd; padding: 20px; border: 1px solid #ddd; border-radius: 10px;
        }
        .qc-item { font-size: 13px; line-height: 1.6; border-bottom: 1px solid #eee; padding-bottom: 5px; }
        .qc-item strong { color: #FF1616; text-transform: uppercase; display: block; font-size: 11px; }

        .notes-box { 
            width: 100%; padding: 15px; border: 1px solid #000; border-radius: 10px; 
            background: #f9f9f9; font-size: 14px; min-height: 100px;
        }

        .btn-back { 
            background: #FF1616; color: white; padding: 12px 40px; border-radius: 30px; 
            text-decoration: none; font-weight: 700; display: inline-block; margin-top: 30px;
            transition: 0.3s; border: none; cursor: pointer;
        }
        .btn-back:hover { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(255, 22, 22, 0.3); }
    </style>
</head>
<body>

<header>
    <div class="logo-area"><img src="image/DARKV3.png"></div>
    <h2 style="font-weight: 700; color: #FF1616;">ID: #<?php echo $No; ?></h2>
</header>

<div class="container">
    <div class="card-header">
        <h1>Inspection Report</h1>
        <p style="text-transform: uppercase; letter-spacing: 1px; font-size: 14px; font-weight: 600; margin-top: 5px;">
            <?php echo $Inspec; ?>
        </p>
    </div>

    <div class="card-body">
        <div class="section-title">Customer Details</div>
        <div class="info-grid">
            <div class="data-item">
                <div class="label-box">Name</div>
                <div class="value-box"><?php echo $Name; ?></div>
            </div>
            <div class="data-item">
                <div class="label-box">Contact</div>
                <div class="value-box"><?php echo $Notel; ?></div>
            </div>
            <div class="data-item">
                <div class="label-box">Model</div>
                <div class="value-box"><?php echo $Model; ?></div>
            </div>
        </div>

        <div style="display: flex; gap: 40px; margin-bottom: 40px;">
            <div style="flex: 1;">
                <div class="section-title">Device Password</div>
                <div class="value-box" style="border-radius: 8px; text-align: center; font-size: 22px; font-weight: 700;">
                    <?php echo $Pin; ?>
                </div>
            </div>
            <div style="flex: 1;">
                <div class="section-title">Record Date</div>
                <div class="value-box" style="border-radius: 8px; text-align: center;">
                    <?php echo $Date; ?> | <?php echo $Time; ?>
                </div>
            </div>
        </div>

        <div class="section-title">QC Status Checklist</div>
        <div class="qc-grid">
            <div class="qc-item"><strong>SIM Signal</strong><?php echo $Sim; ?></div>
            <div class="qc-item"><strong>Bottom Spk</strong><?php echo $Bspeaker; ?></div>
            <div class="qc-item"><strong>Bluetooth</strong><?php echo $Bluetooth; ?></div>
            <div class="qc-item"><strong>Top Mic</strong><?php echo $Tmic; ?></div>
            
            <div class="qc-item"><strong>Earpiece</strong><?php echo $Espeaker; ?></div>
            <div class="qc-item"><strong>Bat. Health</strong><?php echo $Bhealth; ?></div>
            <div class="qc-item"><strong>Charging</strong><?php echo $Charging; ?></div>
            <div class="qc-item"><strong>Bottom Mic</strong><?php echo $Bmic; ?></div>
            
            <div class="qc-item"><strong>Body</strong><?php echo $Body; ?></div>
            <div class="qc-item"><strong>Biometrics</strong><?php echo $Fprint; ?></div>
            <div class="qc-item"><strong>Gyroscope</strong><?php echo $Gyro; ?></div>
            <div class="qc-item)<strong>Compass</strong><?php echo $Compass; ?></div>
        </div>

        <div class="notes-area" style="margin-top: 30px;">
            <div class="section-title">Technician Notes</div>
            <div class="notes-box">
                <?php echo !empty($Other) ? $Other : "No additional notes."; ?>
            </div>
        </div>

        <div style="text-align: center;">
            <a href="home.php" class="btn-back">Return to Dashboard</a>
        </div>
    </div>
</div>

</body>
</html>