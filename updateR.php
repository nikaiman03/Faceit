<?php 
session_start();
include("config.php");
include("functions.php");
require("Counter/10minCount.html");
require 'timer.php';

// 1. Authentication Check
$user_data = check_login($connect);

// 2. CSRF Token Generation
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// 3. Secure Data Retrieval
if (isset($_GET['No']) && is_numeric($_GET['No'])) {
    $No = $_GET['No'];
    $stmt = $connect->prepare("SELECT * FROM remind WHERE No = ? LIMIT 1");
    $stmt->bind_param("i", $No);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $GET = $result->fetch_assoc();
        
        function clean($data) {
            return htmlspecialchars($data ?? '', ENT_QUOTES, 'UTF-8');
        }

        $Name        = clean($GET['Name']);
        $Model       = clean($GET['Model']);
        $Notel       = clean($GET['Notel']);
        $ItemRepair  = clean($GET['ItemRepair']);
        $ItemRepairO = clean($GET['ItemRepairO']);
        $DateR       = clean($GET['DateR']);
        $DateF       = clean($GET['DateF']);
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
    <link rel="icon" type="image/png" href="image/logo.png">
    <title>Update Follow Up | Faceit Solutions</title>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        body { background-color: #f4f4f4; font-family: 'Poppins', sans-serif; margin: 0; padding: 20px; color: #333; }

        .container { 
            background: white; 
            max-width: 900px; 
            margin: 30px auto; 
            padding: 50px; 
            border-radius: 15px; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.1); 
        }

        /* Header Style */
        .header-table { width: 100%; margin-bottom: 30px; }
        .logo-img { width: 220px; }
        .page-title { font-size: 32px; font-weight: 700; text-align: right; color: #131313; }

        /* Section Headings */
        .section-header { 
            background-color: #FF1616; 
            color: white; 
            text-align: center; 
            border-radius: 50px; 
            padding: 12px; 
            margin: 25px 0; 
            font-size: 18px;
            font-weight: 600;
        }

        /* Content Blocks */
        .content-box { 
            background: #fafafa; 
            border: 1px solid #eee; 
            border-radius: 12px; 
            padding: 30px; 
            margin-bottom: 20px;
        }

        /* Form Layout */
        .form-grid { display: flex; gap: 30px; }
        .column { flex: 1; }

        label { font-weight: 600; font-size: 14px; color: #555; display: block; margin-bottom: 8px; }

        input[type="text"], input[type="date"], select, textarea {
            width: 100%; 
            padding: 12px; 
            border: 1px solid #ddd; 
            border-radius: 8px; 
            font-size: 14px; 
            margin-bottom: 20px;
            box-sizing: border-box;
            transition: 0.3s;
        }

        input:focus, select:focus { border-color: #FF1616; outline: none; box-shadow: 0 0 5px rgba(255,22,22,0.1); }
        input[readonly] { background-color: #eee; cursor: not-allowed; }

        /* Buttons */
        .btn-area { text-align: center; margin-top: 30px; display: flex; justify-content: center; gap: 15px; }
        
        .btn { 
            padding: 15px 40px; 
            border-radius: 50px; 
            font-weight: 700; 
            font-size: 16px; 
            cursor: pointer; 
            transition: 0.3s; 
            border: none;
            text-decoration: none;
            display: inline-block;
        }

        .btn-save { background-color: #FF1616; color: white; box-shadow: 0 5px 15px rgba(255, 22, 22, 0.3); }
        .btn-save:hover { background-color: #d11212; transform: translateY(-2px); }

        .btn-back { background-color: #444; color: white; }
        .btn-back:hover { background-color: #222; transform: translateY(-2px); }

        #otherInput { margin-top: -10px; border-color: #FF1616; }
    </style>
</head>

<body>

<div class="container">
    <table class="header-table">
        <tr>
            <td><img src="image/DARKV3.png" class="logo-img" alt="Logo"></td>
            <td class="page-title">Follow Up Customer</td>
        </tr>
    </table>

    <form action="ProsUpdateReminder.php" method="POST">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
        <input type="hidden" name="No" value="<?php echo $No; ?>">

        <div class="section-header">Information Customer</div>
        <div class="content-box">
            <div class="form-grid">
                <div class="column">
                    <label>Customer Name</label>
                    <input type="text" name="Name" value="<?php echo $Name; ?>" required>

                    <label>Contact Number</label>
                    <input type="text" name="Notel" value="<?php echo $Notel; ?>" required>

                    <label>Device Model</label>
                    <input type="text" name="Model" value="<?php echo $Model; ?>" required>
                </div>

                <div class="column">
                    <label>Item Repair</label>
                    <select name="ItemRepair" id="mySelect">
                        <option value="Motherboard" <?php if($ItemRepair == "Motherboard") echo "selected"; ?>>Motherboard</option>
                        <option value="Battery Android" <?php if($ItemRepair == "Battery Android") echo "selected"; ?>>Battery Android</option>
                        <option value="Battery Iphone" <?php if($ItemRepair == "Battery Iphone") echo "selected"; ?>>Battery Iphone</option>
                        <option value="LCD Android" <?php if($ItemRepair == "LCD Android") echo "selected"; ?>>LCD Android</option>
                        <option value="LCD Iphone" <?php if($ItemRepair == "LCD Iphone") echo "selected"; ?>>LCD Iphone</option>
                        <option value="Other" <?php if($ItemRepair == "Other") echo "selected"; ?>>Other</option>
                    </select>

                    <textarea id="otherInput" name="ItemRepairO" rows="4" placeholder="Specify other repair details..."><?php echo $ItemRepairO; ?></textarea>
                </div>
            </div>
        </div>

        <div class="section-header">Scheduling</div>
        <div class="content-box">
            <div class="form-grid">
                <div class="column">
                    <label>Date of Repair (R)</label>
                    <input type="date" name="DateR" value="<?php echo $DateR; ?>" readonly>
                </div>
                <div class="column">
                    <label>Follow Up Date (F)</label>
                    <input type="date" name="DateF" value="<?php echo $DateF; ?>" required>
                </div>
            </div>
        </div>

        <div class="btn-area">
            <button type="submit" name="UpdateReminder" class="btn btn-save">UPDATE FOLLOW UP</button>
            <a href="reminder.php" class="btn btn-back">BACK</a>
        </div>
    </form>
</div>

<script>
    const selectElement = document.getElementById('mySelect');
    const otherInputElement = document.getElementById('otherInput');
    
    function toggleOther() {
        if (selectElement.value === 'Other') {
            otherInputElement.style.display = 'block';
            otherInputElement.required = true;
        } else {
            otherInputElement.style.display = 'none';
            otherInputElement.required = false;
        }
    }
    
    selectElement.addEventListener('change', toggleOther);
    toggleOther(); // Initial call
</script>

</body>
</html>