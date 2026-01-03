<?php 
session_start();
require "config.php";

// 1. Authentication Check (Access Control)
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if (isset($_POST['UpdateReminder'])) {

    // 2. CSRF Token Validation (Requirement: Section 3.1)
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Security Validation Failed: CSRF Token Mismatch.");
    }

    // 3. Collect and Sanitize Data
    $No          = $_POST['No'];
    $Name        = trim($_POST['Name']);
    $Model       = trim($_POST['Model']);
    $Notel       = trim($_POST['Notel']);
    $ItemRepair  = $_POST['ItemRepair'];
    $ItemRepairO = trim($_POST['ItemRepairO']);
    $DateR       = $_POST['DateR'];
    $DateF       = $_POST['DateF'];

    // 4. PREPARED STATEMENT (Requirement: Injection-free implementation)
    // "sssssssi" = 7 strings followed by 1 integer for 'No'
    $stmt = $connect->prepare("UPDATE remind SET 
        Name = ?, 
        Model = ?, 
        Notel = ?, 
        ItemRepair = ?, 
        ItemRepairO = ?, 
        DateR = ?, 
        DateF = ? 
        WHERE No = ?");

    $stmt->bind_param("sssssssi", 
        $Name, 
        $Model, 
        $Notel, 
        $ItemRepair, 
        $ItemRepairO, 
        $DateR, 
        $DateF, 
        $No
    );

    if ($stmt->execute()) {
        // 5. Success Handling
        header("location: reminder.php?status=updated");
        exit();
    } else {
        // 6. Secure Error Handling
        error_log("Update failed: " . $stmt->error);
        die("An internal error occurred. Please try again later.");
    }

    $stmt->close();
}
?>