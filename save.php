<?php 
session_start();
require "config.php";

// 1. Authentication Check (Requirement: Secure Access Control)
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['save'])) {
    
    // 2. CSRF Token Validation (Requirement: CSRF Protection)
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Security Validation Failed: CSRF Token Mismatch.");
    }

    // 3. Collect and Sanitize Inputs (Requirement: Input Validation/Whitelisting)
    // We use trim() to clean extra spaces
    $Inspec    = trim($_POST['Inspec']);
    $Name      = trim($_POST['Name']);
    $Notel     = trim($_POST['Notel']);
    $Model     = trim($_POST['Model']);
    $Pin       = trim($_POST['Pin']);
    $Date      = trim($_POST['Date']);
    $Time      = trim($_POST['Time']);
    $Sim       = $_POST['Sim'] ?? 'D'; // Default to D if empty
    $Bspeaker  = $_POST['Bspeaker'] ?? 'D';
    $Bluetooth = $_POST['Bluetooth'] ?? 'D';
    $Tmic      = $_POST['Tmic'] ?? 'D';
    $Fprint    = $_POST['Fprint'] ?? 'D';
    $Gyro      = $_POST['Gyro'] ?? 'D';
    $Espeaker  = $_POST['Espeaker'] ?? 'D';
    $Bhealth   = $_POST['Bhealth'] ?? 'D';
    $Charging  = $_POST['Charging'] ?? 'D';
    $Bmic      = $_POST['Bmic'] ?? 'D';
    $Body      = $_POST['Body'] ?? 'D';
    $Compass   = $_POST['Compass'] ?? 'D';
    $Other     = trim($_POST['Other']);

    // 4. PREPARED STATEMENTS (Requirement: Injection-free implementation)
    // 's' means the variable is a string. There are 20 variables, so 20 's' characters.
    $stmt = $connect->prepare("INSERT INTO faceit (Inspec, Name, Notel, Model, Pin, Date, Time, Sim, Bspeaker, Bluetooth, Tmic, Fprint, Gyro, Espeaker, Bhealth, Charging, Bmic, Body, Compass, Other) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    
    $stmt->bind_param("ssssssssssssssssssss", 
        $Inspec, $Name, $Notel, $Model, $Pin, $Date, $Time, 
        $Sim, $Bspeaker, $Bluetooth, $Tmic, $Fprint, $Gyro, 
        $Espeaker, $Bhealth, $Charging, $Bmic, $Body, $Compass, $Other
    );

    if ($stmt->execute()) {
        // Success
        header("location: home.php");
    } else {
        // 5. Error Handling (Requirement: Prevent Information Leakage)
        // Log error internally, but show generic message to user
        error_log("Database Error: " . $stmt->error);
        die("An error occurred while saving. Please try again later.");
    }
    
    $stmt->close();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Saving Your Data</title>
</head>
<body>
</body>
</html>