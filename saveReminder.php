<?php 
// 1. Secure Session & Access Control
session_start();
require "config.php";

// Ensure only logged-in technicians can save data
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['saveReminder'])) {
    
    // 2. CSRF Token Validation (Requirement: Section 3.1 Secure Session)
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Security Validation Failed: CSRF Token Mismatch.");
    }

    // 3. Collect and Trim Data
    $Name        = trim($_POST['Name']);
    $Model       = trim($_POST['Model']);
    $Notel       = trim($_POST['Notel']);
    $ItemRepair  = $_POST['ItemRepair'];
    $ItemRepairO = trim($_POST['ItemRepairO']);
    $DateR       = $_POST['DateR'];
    $DateF       = $_POST['DateF'];

    // 4. PREPARED STATEMENT (Requirement: Injection-free implementation)
    // We use "sssssss" because all 7 fields are being treated as strings
    $stmt = $connect->prepare("INSERT INTO remind (Name, Model, Notel, ItemRepair, ItemRepairO, DateR, DateF) VALUES (?, ?, ?, ?, ?, ?, ?)");
    
    $stmt->bind_param("sssssss", 
        $Name, 
        $Model, 
        $Notel, 
        $ItemRepair, 
        $ItemRepairO, 
        $DateR, 
        $DateF
    );

    if ($stmt->execute()) {
        // 5. Secure Redirection
        header("Location: reminder.php?status=success");
        exit();
    } else {
        // 6. Secure Error Logging (No Information Leakage)
        error_log("Database Error: " . $stmt->error);
        die("An error occurred while saving the record. Please try again.");
    }

    $stmt->close();
}
?>