<?php 
session_start();
include("config.php");
include("functions.php");
require 'timer.php';

// Force login
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// Helper function for XSS protection
function escape($data) {
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}

require("Counter/10minCount.html");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="image/logo.png">
    <title>Follow-Up Reminders | Faceit Solutions</title>
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
        .btn-logout { background-color: #FF1616; color: white; padding: 10px 25px; border-radius: 10px; border: none; font-weight: 700; cursor: pointer; transition: 0.3s; }
        .btn-logout:hover { background-color: #d11212; transform: scale(1.05); }

        /* Welcome Section */
        .welcome-section { text-align: center; margin: 40px 0; }
        .welcome-msg { font-size: 28px; font-weight: 500; }
        .user-highlight { color: #FF1616; font-weight: 700; }

        /* Search Bar */
        .search-container { display: flex; justify-content: center; margin-bottom: 30px; }
        .srhInput { width: 400px; padding: 12px 25px; border-radius: 30px; border: 1px solid #ddd; outline: none; transition: 0.3s; }
        .srhInput:focus { border-color: #FF1616; width: 450px; }

        /* Warning Notifications */
        .warning-area { width: 90%; margin: 0 auto 20px auto; }
        .warning-message { 
            background-color: #fff; 
            color: #FF1616; 
            padding: 15px; 
            border-left: 5px solid #FF1616; 
            border-radius: 8px; 
            margin-bottom: 10px; 
            font-weight: 600; 
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            animation: blink 1.5s infinite;
        }

        /* Table Design */
        .table-wrapper { width: 90%; margin: 0 auto; background: white; border-radius: 15px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.08); }
        .tablelist { width: 100%; border-collapse: collapse; }
        .tablelistheader { background-color: #FF1616; color: white; font-weight: 600; text-transform: uppercase; font-size: 12px; letter-spacing: 1px; padding: 18px; text-align: center; }
        .tablelist td { padding: 15px; border-bottom: 1px solid #eee; text-align: center; font-size: 14px; }
        .tablelist tr:hover { background-color: #fff9f9; }

        /* Blinking row for due today */
        @keyframes blink { 0% { opacity: 1; } 50% { opacity: 0.7; } 100% { opacity: 1; } }
        .due-today { background-color: #fff0f0 !important; font-weight: 600; }

        /* Action Buttons */
        .action-btn {
            background: #fff;
            border: 1px solid #ddd;
            padding: 8px 12px;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.2s;
            margin: 0 3px;
            display: inline-flex;
            flex-direction: column;
            align-items: center;
            font-size: 10px;
            font-weight: 700;
            text-decoration: none;
            color: #333;
        }
        .action-btn:hover { border-color: #FF1616; background: #fff5f5; }
        .action-btn img { margin-bottom: 4px; }

        /* Footer Button */
        .footer-btn-area { text-align: center; margin-top: 40px; }
        .btn-add {
            background-color: #FF1616; color: white; padding: 15px 40px; border-radius: 50px; 
            text-decoration: none; font-weight: 700; box-shadow: 0 8px 15px rgba(255, 22, 22, 0.3);
            transition: 0.3s; display: inline-block;
        }
        .btn-add:hover { transform: translateY(-3px); }
    </style>
</head>
<body>

<header>
    <div class="logo-area">
        <img src="image/DARKV3.png" alt="Faceit Logo">
    </div>
    <nav>
        <a href="home.php">INSPECTIONS</a>
        <a href="reminder_form.php">ADD</a>
        <a href="logout.php"><button class="btn-logout">LOGOUT</button></a>
    </nav>
</header>

<div class="welcome-section">
    <h2 class="welcome-msg">Follow-Up <span class="user-highlight">Reminders</span></h2>
    <p style="color: #777; font-size: 14px; margin-top: 5px;">Track customer repairs and maintenance schedules.</p>
</div>

<div class="search-container">
    <input type="text" id="searchInput" placeholder="Search customer, model, or repair item..." class="srhInput">
</div>

<div class="warning-area">
    <?php 
    $currentDateStr = date('Y-m-d');
    $query = mysqli_query($connect, "SELECT * FROM remind ORDER BY DateR DESC");
    
    $rowsHtml = "";
    $warningsHtml = "";

    while ($show = mysqli_fetch_array($query)) {
        $isDueToday = ($show['DateF'] === $currentDateStr);
        $rowClass = $isDueToday ? 'due-today' : '';
        
        if ($isDueToday) {
            $warningsHtml .= '<div class="warning-message">⚠️ FOLLOW-UP DUE: ' . escape($show['Name']) . ' is scheduled for today!</div>';
        }

        // WhatsApp Link Logic
        $rawPhone = preg_replace("/[^0-9]/", "", $show['Notel']);
        if (substr($rawPhone, 0, 1) !== '6') { $rawPhone = '6' . $rawPhone; }
        $waMsg = "Hi " . $show['Name'] . ", Kami dari Faceit Solutions. Follow-up untuk " . $show['ItemRepair'] . " anda.";
        $waLink = "https://wa.me/" . $rawPhone . "/?text=" . urlencode($waMsg);

        $rowsHtml .= "<tr class='$rowClass'>";
        $rowsHtml .= "<td>" . escape($show['Name']) . "</td>";
        $rowsHtml .= "<td>" . escape($show['Model']) . "</td>";
        $rowsHtml .= "<td>" . escape($show['Notel']) . "</td>";
        $rowsHtml .= "<td>" . escape($show['ItemRepair']) . "</td>";
        $rowsHtml .= "<td>" . escape($show['DateR']) . "</td>";
        $rowsHtml .= "<td>" . escape($show['DateF']) . "</td>";
        $rowsHtml .= "<td><a href='viewdetailR.php?No=" . $show['No'] . "' class='action-btn'><img src='image/view.png' height='20'>View</a></td>";
        $rowsHtml .= "<td>
                        <a href='updateR.php?No=" . $show['No'] . "' class='action-btn'><img src='image/update.png' width='20'>Edit</a>
                        <a href='$waLink' class='action-btn' target='_blank'><img src='image/call.png' width='20'>WA</a>
                      </td>";
        $rowsHtml .= "</tr>";
    }
    echo $warningsHtml; 
    ?>
</div>

<div class="table-wrapper">
    <table class="tablelist" id="dataTable">
        <thead>
            <tr>
                <th class="tablelistheader">Customer Name</th>
                <th class="tablelistheader">Phone Model</th>
                <th class="tablelistheader">Contact Number</th>
                <th class="tablelistheader">Item Repair</th>            
                <th class="tablelistheader">Date Repair</th>
                <th class="tablelistheader">Follow Up</th>
                <th class="tablelistheader">Detail</th>
                <th class="tablelistheader">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php echo $rowsHtml; ?>
        </tbody>
    </table>
</div>

<div class="footer-btn-area">
    <a href="reminder_form.php" class="btn-add">Add Follow-Up List</a>
</div>

<script>
    document.getElementById('searchInput').addEventListener('keyup', function() {
        const query = this.value.toLowerCase();
        const rows = document.querySelectorAll('#dataTable tbody tr');
        rows.forEach(row => {
            row.style.display = row.innerText.toLowerCase().includes(query) ? '' : 'none';
        });
    });
</script>

</body>
</html>