<?php 
session_start();
require "config.php";

// 1. Authentication Check (Secure Access Control)
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['update'])) {

    // 2. CSRF Token Validation (Requirement: CSRF Protection)
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Security Validation Failed: CSRF Token Mismatch.");
    }

    // 3. Get Data and Basic Sanitization
    $No        = $_POST['No'];
    $Inspec    = trim($_POST['Inspec']);
    $Name      = trim($_POST['Name']);
    $Notel     = trim($_POST['Notel']);
    $Model     = trim($_POST['Model']);
    $Pin       = trim($_POST['Pin']);
    $Date      = trim($_POST['Date']);
    $Time      = trim($_POST['Time']);
    $Sim       = $_POST['Sim'];
    $Bspeaker  = $_POST['Bspeaker'];
    $Bluetooth = $_POST['Bluetooth'];
    $Tmic      = $_POST['Tmic'];
    $Fprint    = $_POST['Fprint'];
    $Gyro      = $_POST['Gyro'];
    $Espeaker  = $_POST['Espeaker'];
    $Bhealth   = $_POST['Bhealth'];
    $Charging  = $_POST['Charging'];
    $Bmic      = $_POST['Bmic'];
    $Body      = $_POST['Body'];
    $Compass   = $_POST['Compass'];
    $Other     = trim($_POST['Other']);

    // 4. PREPARED STATEMENT (Requirement: Injection-free implementation)
    // We use 's' for strings and 'i' for the integer ID at the end.
    $stmt = $connect->prepare("UPDATE faceit SET 
        Inspec = ?, Name = ?, Notel = ?, Model = ?, Pin = ?, 
        Date = ?, Time = ?, Sim = ?, Bspeaker = ?, Bluetooth = ?, 
        Tmic = ?, Fprint = ?, Gyro = ?, Espeaker = ?, Bhealth = ?, 
        Charging = ?, Bmic = ?, Body = ?, Compass = ?, Other = ? 
        WHERE No = ?");

    // 'ssssssssssssssssssssi' = 20 strings followed by 1 integer
    $stmt->bind_param("ssssssssssssssssssssi", 
        $Inspec, $Name, $Notel, $Model, $Pin, 
        $Date, $Time, $Sim, $Bspeaker, $Bluetooth, 
        $Tmic, $Fprint, $Gyro, $Espeaker, $Bhealth, 
        $Charging, $Bmic, $Body, $Compass, $Other, 
        $No
    );

    if ($stmt->execute()) {
        // 5. Success Handling
        echo "<script>
                alert('The Latest Data Has Been Successfully Saved');
                window.location='home.php';
              </script>";
        exit();
    } else {
        // 6. Secure Error Handling (Prevent Information Leakage)
        error_log("Update failed: " . $stmt->error); // Log error for developer
        die("An internal error occurred. Please try again.");
    }

    $stmt->close();
}
?>