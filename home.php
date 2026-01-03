<?php 
session_start();
include("config.php");
include("functions.php");

// 1. Secure Access Control
$user_data = check_login($connect); 

// Generate CSRF Token if it doesn't exist (Required for delete.php)
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

require("Counter/10minCount.html");
require 'timer.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="image/logo.png">
    <title>Checklist Inspections | Dashboard</title>

    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');

        * { 
            margin: 0; 
            padding: 0; 
            box-sizing: border-box; 
            font-family: 'Poppins', sans-serif; 
        }

        body { 
            background-color: #f8f9fa; 
            color: #333;
            padding-bottom: 50px;
        }

        /* Top Navigation Bar */
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

        nav a {
            text-decoration: none;
            color: #333;
            font-weight: 600;
            margin: 0 20px;
            font-size: 15px;
            transition: 0.3s;
        }

        nav a:hover { color: #FF1616; }

        .btn-logout {
            background-color: #FF1616;
            color: white;
            padding: 10px 25px;
            border-radius: 10px;
            border: none;
            font-weight: 700;
            cursor: pointer;
            transition: 0.3s;
        }

        .btn-logout:hover { background-color: #d11212; transform: scale(1.05); }

        /* Welcome Section */
        .welcome-section {
            text-align: center;
            margin: 40px 0;
        }

        .welcome-msg { font-size: 28px; font-weight: 500; }
        .user-highlight { color: #FF1616; font-weight: 700; }

        /* Search Bar Area */
        .search-container {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
        }

        .srhInput { 
            width: 400px;
            padding: 12px 25px;
            border-radius: 30px;
            border: 1px solid #ddd;
            outline: none;
            font-size: 14px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.02);
            transition: 0.3s;
        }

        .srhInput:focus { border-color: #FF1616; width: 450px; }

        /* Modern Table Styling */
        .table-wrapper {
            width: 92%;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }

        .tablelist { width: 100%; border-collapse: collapse; }

        .tablelistheader { 
            background-color: #FF1616; 
            color: white; 
            font-weight: 600;
            text-transform: uppercase;
            font-size: 13px;
            letter-spacing: 1px;
            padding: 18px;
        }

        .tablelist td { padding: 15px; border-bottom: 1px solid #eee; text-align: center; font-size: 14px; }
        .tablelist tr:last-child td { border-bottom: none; }
        .tablelist tr:hover { background-color: #fff9f9; }

        /* Action Buttons Styling */
        .action-btn {
            background: #fff;
            border: 1px solid #ddd;
            padding: 6px 10px;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.2s;
            margin: 0 3px;
            display: inline-flex;
            flex-direction: column;
            align-items: center;
            font-size: 10px;
            font-weight: 600;
            min-width: 50px;
            text-decoration: none;
            color: #333;
        }

        .action-btn:hover { border-color: #FF1616; background: #fff5f5; }
        .action-btn img { margin-bottom: 4px; }
        
        /* Delete Button Hover State */
        .btn-del:hover { border-color: #FF1616; background-color: #ffebeb; color: #FF1616; }

        /* Footer Button */
        .footer-btn-area { text-align: center; margin-top: 40px; }
        .btn-add {
            background-color: #FF1616;
            color: white;
            padding: 15px 40px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 700;
            font-size: 16px;
            box-shadow: 0 8px 15px rgba(255, 22, 22, 0.3);
            transition: 0.3s;
            display: inline-block;
        }

        .btn-add:hover { transform: translateY(-3px); box-shadow: 0 12px 20px rgba(255, 22, 22, 0.4); }

    </style>
</head>
<body>

<header>
    <div class="logo-area">
        <img src="image/DARKV3.png" alt="Faceit Logo">
    </div>
    <nav>
        <a href="form.php">ADD</a>
        <a href="reminder.php">REMINDER</a>
        <a href="logout.php"><button class="btn-logout">LOGOUT</button></a>
    </nav>
</header>

<div class="welcome-section">
    <h2 class="welcome-msg">Welcome back, <span class="user-highlight"><?php echo htmlspecialchars($user_data['user_name']); ?></span></h2>
    <p style="color: #777; font-size: 14px; margin-top: 5px;">Manage your inspections and repairs here.</p>
</div>

<div class="search-container">
    <input type="text" id="searchInput" placeholder="Search customer or phone model..." class="srhInput">
</div>

<div class="table-wrapper">
    <table class="tablelist" id="dataTable">
        <thead>
            <tr>
                <th class="tablelistheader">Customer Name</th>
                <th class="tablelistheader">Phone Model</th>
                <th class="tablelistheader">Contact Number</th>
                <th class="tablelistheader">Date</th>
                <th class="tablelistheader">Time</th>
                <th class="tablelistheader">Detail</th>
                <th class="tablelistheader">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $query = mysqli_query($connect, "SELECT * FROM faceit order by No desc");
            while ($show = mysqli_fetch_array($query)) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($show['Name']) . "</td>";
                echo "<td>" . htmlspecialchars($show['Model']) . "</td>";
                echo "<td>" . htmlspecialchars($show['Notel']) . "</td>";
                echo "<td>" . $show['Date'] . "</td>";
                echo "<td>" . $show['Time'] . "</td>";
                
                // Detail Link
                echo "<td>
                        <a href='viewdetail.php?No=".$show['No']."' class='action-btn'>
                            <img src='image/view.png' height='20'>View
                        </a>
                      </td>";

                // Actions (Edit, WhatsApp, & Delete)
                echo "<td>
                        <div style='display: flex; justify-content: center;'>
                            <a href='update.php?No=".$show['No']."' class='action-btn'>
                                <img src='image/update.png' width='20'>Edit
                            </a>";

                // WhatsApp Logic
                $phoneNumber = preg_replace("/[^0-9]/", "", $show['Notel']);
                if (substr($phoneNumber, 0, 1) !== '6') { $phoneNumber = '6' . $phoneNumber; }
                $message = "Hi ".$show['Name'].", Kami dari Faceit Solutions.";
                $whatsappLink = "https://wa.me/$phoneNumber/?text=" . urlencode($message);

                echo "      <a href='$whatsappLink' class='action-btn' target='_blank'>
                                <img src='image/call.png' width='20'>WA
                            </a>";

                // DELETE BUTTON (Added here)
                // We pass both 'No' and the 'token' required by your delete.php
                echo "      <a href='delete.php?No=".$show['No']."&token=".$_SESSION['csrf_token']."' 
                               class='action-btn btn-del' 
                               onclick=\"return confirm('Are you sure you want to delete this record? This cannot be undone.');\">
                                <img src='image/delete.png' width='20'>Delete
                            </a>
                        </div>
                      </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<div class="footer-btn-area">
    <a href="form.php" class="btn-add">Add New Inspection</a>
</div>

<script>
    // Modern Search Script
    const dataTable = document.getElementById('dataTable');
    const searchInput = document.getElementById('searchInput');

    searchInput.addEventListener('keyup', function() {
        const searchQuery = searchInput.value.toLowerCase();
        const rows = dataTable.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
        
        for (let i = 0; i < rows.length; i++) {
            const rowData = rows[i].textContent.toLowerCase();
            rows[i].style.display = rowData.includes(searchQuery) ? '' : 'none';
        }
    });
</script>

</body>
</html>