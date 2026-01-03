<?php 
session_start();
include("config.php");
include("functions.php");
require("Counter/10minCount.html");
require 'timer.php';

// 1. Authentication Check
$user_data = check_login($connect);

// 2. CSRF Token Generation (Mandatory for Secure Forms)
if (empty($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

// 3. Secure Data Retrieval using Prepared Statements
if (isset($_GET['No']) && is_numeric($_GET['No'])) {
    $No = $_GET['No'];
    
    // Using Prepared Statement to prevent SQL Injection
    $stmt = $connect->prepare("SELECT * FROM remind WHERE No = ? LIMIT 1");
    $stmt->bind_param("i", $No);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows > 0) {
        $GET = $result->fetch_assoc();
        
        // Helper function for XSS protection (Output Encoding)
        function clean($data) {
            return htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
        }

        // Sanitize data for the form
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
    <title>Update Data Customer</title>
    <style type="text/css">
        /* Keep your existing CSS styles here */
        .tableMain{ width: 92%; }
        .td2{ width: 80%; background-color: red; color: white; text-align: center; border: 2px solid black; border-radius: 10px; }
        .img1{ width: 100%; }
        .h1-1{ font-size: 53px; text-align: center; }
        .div1{ margin-top: 1%; width: 70%; padding-bottom: 2%; }
        .td3, .td4, .td5, .td6 { font-size: 25px; width: 50%; height: 35px; border-radius: 10px; border: 2px solid black; text-align: center; background-color: red; color: white; }
        .div6 { width: 85%; border-radius: 10px; border: 2px solid black; margin-top: -1.5%; border-top-color: transparent; }
        .div8 { width: 98.5%; border-radius: 10px; border: 2px solid black; padding-bottom: 4%; text-align: center; }
        input { height: 25px; font-size: 18px; border-radius: 3px; }
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

            <form action="ProsUpdateReminder.php" method="POST">
                <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
                <input type="hidden" name="No" value="<?php echo $No; ?>">

                <table class="table2">
                    <tr class="tr1"><td class="td2"><h2>Information Customer</h2></td></tr>
                </table> 

                <div class="div6">
                    <table class="table3">
                        <tr>
                            <td>
                                <table>
                                    <tr><td class="td3">Name</td><td><input type="text" name="Name" size="18" value="<?php echo $Name; ?>" required></td></tr>
                                    <tr><td class="td4">Number</td><td><input type="text" name="Notel" size="18" value="<?php echo $Notel; ?>" required></td></tr>
                                    <tr><td class="td5">Model</td><td><input type="text" name="Model" size="18" value="<?php echo $Model; ?>" required></td></tr>
                                </table>
                            </td>
                            <td>
                                <table class="table4" style="margin-left: 0;">
                                    <tr><td class="td6">Item Repair</td></tr>
                                    <tr>
                                        <td>
                                            <div class="div7" style="border: none;">
                                                <select name="ItemRepair" id="mySelect" style="width: 65%; text-align: center; height: 25px;">
                                                    <option selected value="<?php echo $ItemRepair; ?>"><?php echo $ItemRepair; ?></option>
                                                    <option value="Motherboard">Motherboard</option>
                                                    <option value="Battery Android">Battery Android</option>
                                                    <option value="Battery Iphone">Battery Iphone</option>
                                                    <option value="LCD Android">LCD Android</option>
                                                    <option value="LCD Iphone">LCD Iphone</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                                <br><br>
                                                <textarea id="otherInput" name="ItemRepairO" style="font-size: 15px;" cols="17" rows="5"><?php echo $ItemRepairO; ?></textarea>
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
                                                    Date (R): <input type="date" name="DateR" value="<?php echo $DateR; ?>" readonly><br><br>
                                                    Date (F): <input type="date" name="DateF" value="<?php echo $DateF; ?>" required>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </center>
                            </td>
                        </tr>
                    </table>
                </div>

                <div style="margin-top: 20px;">
                    <input type="submit" name="UpdateReminder" value="SAVE" class="inputBtn">
                    <a href="reminder.php" style="text-decoration:none;"><button type="button" class="inputBtn">BACK</button></a>
                </div>
            </form>
        </div>
    </center>
    <div class="signature">-- Secure Version --</div>

    <script>
        var selectElement = document.getElementById('mySelect');
        var otherInputElement = document.getElementById('otherInput');
        
        function toggleOther() {
            if (selectElement.value === 'Other') {
                otherInputElement.style.display = 'block';
            } else {
                otherInputElement.style.display = 'none';
            }
        }
        
        selectElement.addEventListener('change', toggleOther);
        toggleOther(); // Initial call
    </script>
</body>
</html>