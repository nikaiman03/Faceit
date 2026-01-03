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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="image/logo.png">
    <title>Add Follow-Up | Faceit Solutions</title>
    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body { background-color: #f8f9fa; color: #333; padding-bottom: 50px; }

        /* Navigation Bar */
        header {
            background: white;
            padding: 15px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }
        .logo-area img { width: 200px; }
        nav a { text-decoration: none; color: #333; font-weight: 600; margin: 0 20px; font-size: 15px; transition: 0.3s; }
        nav a:hover { color: #FF1616; }
        .btn-logout { background-color: #FF1616; color: white; padding: 10px 25px; border-radius: 10px; border: none; font-weight: 700; cursor: pointer; }

        /* Main Form Container */
        .form-container { width: 800px; margin: 0 auto; background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.1); border: 1px solid #eee; }
        
        .form-header { background: #FF1616; color: white; padding: 20px; text-align: center; }
        .form-header h1 { font-size: 24px; font-weight: 600; }

        .form-body { padding: 40px; }

        /* Section Titles */
        .section-title { 
            background: #FF1616; color: white; padding: 8px 20px; border-radius: 8px; 
            display: inline-block; font-size: 14px; font-weight: 600; margin-bottom: 20px;
        }

        .input-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 30px; margin-bottom: 30px; }

        /* Input Styling */
        .form-group { margin-bottom: 20px; display: flex; align-items: center; }
        .label-tag { 
            background: #FF1616; color: white; padding: 10px; border-radius: 8px 0 0 8px; 
            width: 100px; text-align: center; font-weight: 600; border: 1px solid #000;
        }
        input[type="text"], input[type="date"], select, textarea { 
            flex: 1; padding: 10px; border: 1px solid #000; border-radius: 0 8px 8px 0; outline: none; font-size: 15px; 
        }

        /* Date Section */
        .date-box { 
            border: 1px solid #000; padding: 20px; border-radius: 10px; text-align: center; 
            background: #fff; margin-top: 10px;
        }
        .date-box input { margin: 5px; border-radius: 5px; border: 1px solid #ccc; padding: 5px; }

        /* Buttons */
        .btn-area { text-align: center; margin-top: 30px; display: flex; justify-content: center; gap: 20px; }
        .btn-save { background: #FF1616; color: white; padding: 12px 50px; border-radius: 30px; border: none; font-weight: 700; cursor: pointer; transition: 0.3s; font-size: 16px; }
        .btn-reset { background: #FF1616; color: white; padding: 12px 50px; border-radius: 30px; border: none; font-weight: 700; cursor: pointer; transition: 0.3s; font-size: 16px; }
        .btn-save:hover, .btn-reset:hover { transform: scale(1.05); box-shadow: 0 5px 15px rgba(255, 22, 22, 0.3); }

        .helper-text { font-size: 12px; color: #666; margin-top: 10px; font-style: italic; }
    </style>
</head>
<body>

<header>
    <div class="logo-area">
        <img src="image/DARKV3.png" alt="Faceit Logo">
    </div>
    <nav>
        <a href="home.php">INSPECTIONS</a>
        <a href="reminder.php">REMINDERS</a>
        <a href="logout.php"><button class="btn-logout">LOGOUT</button></a>
    </nav>
</header>

<div class="form-container">
    <div class="form-header">
        <h1>Follow Up Customer</h1>
    </div>

    <form action="saveReminder.php" method="POST" class="form-body">
        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

        <div class="section-title">Information Customer</div>

        <div class="input-grid">
            <div>
                <div class="form-group">
                    <div class="label-tag">Name</div>
                    <input type="text" name="Name" placeholder=": Ali" required>
                </div>
                <div class="form-group">
                    <div class="label-tag">Number</div>
                    <input type="text" name="Notel" placeholder=": 012 345 6789" required>
                </div>
                <div class="form-group">
                    <div class="label-tag">Model</div>
                    <input type="text" name="Model" placeholder=": Samsung A30" required>
                </div>
            </div>

            <div>
                <div class="section-title">Item Repair</div>
                <select name="ItemRepair" id="mySelect" required>
                    <option value="" disabled selected hidden>-- Select Item --</option>
                    <option value="Motherboard">Motherboard</option>
                    <option value="Battery Android">Battery Android</option>
                    <option value="Battery Iphone">Battery Iphone</option>
                    <option value="LCD Android">LCD Android</option>
                    <option value="LCD Iphone">LCD Iphone</option>
                    <option value="Other">Other</option>
                </select>
                <textarea id="otherInput" name="ItemRepairO" style="display: none; width: 100%; margin-top: 10px; border-radius: 8px; padding: 10px;" rows="4" placeholder="Example: Camera Replacement"></textarea>
            </div>
        </div>

        <div style="text-align: center;">
            <div class="section-title">Date Follow Up</div>
            <div class="date-box">
                <strong>Date (Repair):</strong> 
                <input type="date" name="DateR" id="dateInput" readonly required>
                <br><br>
                <strong>Date (Follow-up):</strong> 
                <input type="date" name="DateF" id="selectedDate" required>
                <p class="helper-text">*Manual set Follow-up Date if "Other" is selected</p>
            </div>
        </div>

        <div class="btn-area">
            <button type="submit" name="saveReminder" class="btn-save">SAVE</button>
            <button type="reset" name="reset" class="btn-reset">RESET</button>
        </div>
    </form>
</div>

<script>
    var selectElement = document.getElementById('mySelect');
    var otherInputElement = document.getElementById('otherInput');
    var dateInput = document.getElementById('dateInput');
    var selectedDateInput = document.getElementById('selectedDate');

    // Set today's date automatically
    var today = new Date().toISOString().split('T')[0];
    dateInput.value = today;

    selectElement.addEventListener('change', function () {
        var val = selectElement.value;
        var calcDate = new Date();

        if (val === 'Other') {
            otherInputElement.style.display = 'block';
            selectedDateInput.value = "";
            return;
        } else {
            otherInputElement.style.display = 'none';
        }

        // Calculation logic
        if (val === 'Motherboard' || val === 'LCD Iphone') {
            calcDate.setMonth(calcDate.getMonth() + 1);
        } else {
            calcDate.setDate(calcDate.getDate() + 14);
        }
        selectedDateInput.value = calcDate.toISOString().split('T')[0];
    });
</script>

</body>
</html>