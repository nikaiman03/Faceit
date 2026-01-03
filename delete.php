<?php 
session_start();
require "config.php";
require "functions.php";

// 1. Authentication Check (Access Control)
// Requirement: Section 3.1 Secure Session
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

// 2. CSRF & Method Validation
// We check the token to ensure the delete request came from YOUR website
if (isset($_GET['No']) && isset($_GET['token'])) {
    
    if ($_GET['token'] !== $_SESSION['csrf_token']) {
        die("Security Validation Failed: Invalid Token.");
    }

    $No = $_GET['No'];

    // 3. PREPARED STATEMENT (Injection-free implementation)
    // Using 'i' for integer to ensure only numbers are processed
    $stmt = $connect->prepare("DELETE FROM faceit WHERE No = ?");
    $stmt->bind_param("i", $No);

    if ($stmt->execute()) {
        // 4. Success Handling
        echo "<script>
                alert('Data Successfully Deleted');
                window.location='home.php';
              </script>";
        exit();
    } else {
        // 5. Secure Error Logging
        error_log("Delete Error: " . $stmt->error);
        die("An error occurred. Please contact the administrator.");
    }

    $stmt->close();
} else {
    header("Location: home.php");
    exit();
}
?>