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

// Helper function for XSS protection (Requirement: Output Encoding)
function escape($data) {
    return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
}

// 2. Prepared Statement for GET request (Requirement: Injection-free implementation)
if (isset($_GET['No']) && is_numeric($_GET['No'])) {
    $No = $_GET['No'];
    
    // Using 'remind' table as per your original code
    $stmt = $connect->prepare("SELECT * FROM remind WHERE No = ? LIMIT 1");
    $stmt->bind_param("i", $No);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result && $result->num_rows > 0) {
        $GET = $result->fetch_assoc();
        
        // Sanitize all data before displaying
        $safe_No          = escape($GET['No']);
        $safe_Name        = escape($GET['Name']);
        $safe_Model       = escape($GET['Model']);
        $safe_Notel       = escape($GET['Notel']);
        $safe_ItemRepair  = escape($GET['ItemRepair']);
        $safe_ItemRepairO = escape($GET['ItemRepairO']);
        $safe_DateR       = escape($GET['DateR']);
        $safe_DateF       = escape($GET['DateF']);
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
    <title>Update Data Customer</title>
    <style type="text/css">
        /* Keep your existing CSS styles */
        .tableMain{ width: 92%; }
        .td2{ width: 80%; background-color: red; color: white; text-align: center; border: 2px solid black; border-radius: 10px; }
        .img1{ width: 100%; }
        .h1-1{ font-size: 53px; text-align: center; }
        .div1{ margin-top: 1%; width: 70%; padding-bottom: 2%; }
        .td3, .td4, .td5, .td6 { font-size: 25px; width: 50%; height: 35px; border-radius: 10px; border: 2px solid black; text-align: center; background-color: red; color: white; }
        .div6 { width: 85%; border-radius: 10px; border: 2px solid black; margin-top: -1.5%; border-top-color: transparent; }
        .div8 { width: 98.5%; border-radius: 10px; border: 2px solid black; padding-bottom: 4%; text-align: center; }
        input { height: 25px; font-size: 18px; border-radius: 3px; background: #f0f0f0; border: 1px solid #ccc; }
        .inputBtn { background-color: red; width: 120px; height: 50px; border-radius: 35px; color: white; margin-top: 3%; font-size: 18px; border: none; cursor: pointer; }
        .signature { position: fixed; bottom: 10px; left: 10px; font-size: 15px; color: #333; }
    </style>
</head>
<body>
    <center>
        <div class="div1">
            <table class="tableMain">
                <tr>
                    <td class="td1"><img src="image/DARKV3.png" class="img1" alt="Logo"></td>
                    <td><h1 class="h1-1">Follow Up Customer</h1></td>
                </tr>
            </table>
            <br>

            <table class="table2">
                <tr class="tr1"><td class="td2"><h2>Information Customer</h2></td></tr>
            </table> 

            <div class="div6">
                <table class="table3">
                    <tr>
                        <td>
                            <table>
                                <tr><td class="td3">Name</td><td><input type="text" value="<?php echo $safe_Name; ?>" readonly></td></tr>
                                <tr><td class="td4">Number</td><td><input type="text" value="<?php echo $safe_Notel; ?>" readonly></td></tr>
                                <tr><td class="td5">Model</td><td><input type="text" value="<?php echo $safe_Model; ?>" readonly></td></tr>
                            </table>
                        </td>
                        <td>
                            <table class="table4" style="margin-left: 0;">
                                <tr><td class="td6">Item Repair</td></tr>
                                <tr>
                                    <td>
                                        <div class="div7" style="border: none; margin-top: 10px;">
                                            <input type="text" value="<?php echo $safe_ItemRepair; ?>" style="width: 65%; text-align: center;" readonly>
                                            <br><br>
                                            <textarea style="font-size: 15px;" cols="17" rows="5" readonly><?php echo $safe_ItemRepairO; ?></textarea>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>

                <table class="table6">
                    <tr>
                        <td>
                            <center>
                                <table class="table7">
                                    <tr><td class="td6">Date Follow Up</td></tr>
                                    <tr>
                                        <td>
                                            <div class="div8">
                                                <br>
                                                Date (R): <input type="date" value="<?php echo $safe_DateR; ?>" readonly><br><br>
                                                Date (F): <input type="date" value="<?php echo $safe_DateF; ?>" readonly>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </center>
                        </td>
                    </tr>
                </table>
            </div>

            <a href="reminder.php"><button class="inputBtn">BACK</button></a>
        </div>
    </center>
    <div class="signature">-- Secure Version --</div>
</body>
</html>