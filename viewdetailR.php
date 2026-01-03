<?php 
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

include("config.php");
require("Counter/10minCount.html");
require 'timer.php';

// XSS Protection Helper
function escape($data) {
    return htmlspecialchars($data ?? '', ENT_QUOTES, 'UTF-8');
}

// Data Retrieval using Prepared Statements for security
if (isset($_GET['No']) && is_numeric($_GET['No'])) {
    $No = $_GET['No'];
    $stmt = $connect->prepare("SELECT * FROM remind WHERE No = ? LIMIT 1");
    $stmt->bind_param("i", $No);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $safe_Name        = escape($row['Name']);
        $safe_Model       = escape($row['Model']);
        $safe_Notel       = escape($row['Notel']);
        $safe_ItemRepair  = escape($row['ItemRepair']);
        $safe_ItemRepairO = escape($row['ItemRepairO']);
        $safe_DateR       = escape($row['DateR']);
        $safe_DateF       = escape($row['DateF']);
    } else {
        die("Record not found.");
    }
    $stmt->close();
} else {
    header("Location: reminder.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="image/logo.png">
    <title>View Details - <?php echo $safe_Name; ?></title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap');

        body {
            background-color: #f4f7f6; /* Light grey background for contrast */
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 40px 20px;
            display: flex;
            justify-content: center;
        }

        .main-card {
            background: #ffffff;
            width: 100%;
            max-width: 1000px;
            border-radius: 20px;
            padding: 50px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05); /* Soft shadow */
        }

        /* Header Style */
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
        }

        .logo-img { width: 220px; }
        .page-header-title { font-size: 36px; font-weight: 800; color: #222; margin: 0; }

        /* Modern Red Section Header */
        .section-header {
            background-color: #ff1a1a;
            color: white;
            text-align: center;
            padding: 15px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 20px;
            margin-bottom: 30px;
        }

        /* Content Layout */
        .details-grid {
            background-color: #fafafa;
            border-radius: 15px;
            padding: 30px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 25px 50px;
            margin-bottom: 40px;
        }

        .field-box {
            display: flex;
            flex-direction: column;
        }

        .field-box label {
            font-size: 14px;
            font-weight: 600;
            color: #777;
            margin-bottom: 8px;
        }

        .data-display {
            background: white;
            border: 1px solid #e0e0e0;
            padding: 14px 18px;
            border-radius: 10px;
            font-size: 16px;
            color: #333;
            min-height: 24px;
        }

        .full-span { grid-column: span 2; }

        /* Action Section */
        .footer-actions {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .btn-return {
            background-color: #ff1a1a;
            color: white;
            padding: 15px 60px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 700;
            font-size: 16px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(255, 26, 26, 0.3);
        }

        .btn-return:hover {
            background-color: #d60000;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .details-grid { grid-template-columns: 1fr; }
            .full-span { grid-column: span 1; }
            .header-container { flex-direction: column; text-align: center; gap: 20px; }
        }
    </style>
</head>
<body>

<div class="main-card">
    <div class="header-container">
        <img src="image/DARKV3.png" class="logo-img" alt="Faceit Logo">
        <h1 class="page-header-title">Follow Up Customer</h1>
    </div>

    <div class="section-header">Information Customer</div>
    <div class="details-grid">
        <div class="field-box">
            <label>Customer Name</label>
            <div class="data-display"><?php echo $safe_Name; ?></div>
        </div>
        <div class="field-box">
            <label>Item Repair</label>
            <div class="data-display"><?php echo $safe_ItemRepair; ?></div>
        </div>
        <div class="field-box">
            <label>Contact Number</label>
            <div class="data-display"><?php echo $safe_Notel; ?></div>
        </div>
        <div class="field-box">
            <label>Device Model</label>
            <div class="data-display"><?php echo $safe_Model; ?></div>
        </div>
        <div class="field-box full-span">
            <label>Repair Notes</label>
            <div class="data-display" style="min-height: 80px;">
                <?php echo !empty($safe_ItemRepairO) ? nl2br($safe_ItemRepairO) : "No additional notes provided."; ?>
            </div>
        </div>
    </div>

    <div class="section-header">Scheduling</div>
    <div class="details-grid">
        <div class="field-box">
            <label>Date of Repair (R)</label>
            <div class="data-display"><?php echo date('d M Y', strtotime($safe_DateR)); ?></div>
        </div>
        <div class="field-box">
            <label>Follow Up Date (F)</label>
            <div class="data-display" style="color: #ff1a1a; font-weight: 700;">
                <?php echo date('d M Y', strtotime($safe_DateF)); ?>
            </div>
        </div>
    </div>

    <div class="footer-actions">
        <a href="reminder.php" class="btn-return">BACK TO LIST</a>
    </div>
</div>

</body>
</html>