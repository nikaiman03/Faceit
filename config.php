<?php
// Use a try-catch block to prevent stack traces (OWASP ASVS V7)
try {
    // In a real project, use getenv() to pull these from a .env file
    $host = 'localhost';
    $dbname = 'faceitsolutions';
    $user = 'root';
    $pass = '';

    // Using mysqli with error reporting disabled for production
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $connect = new mysqli($host, $user, $pass, $dbname);
    
    // Set charset to avoid encoding-based injection
    $connect->set_charset("utf8mb4");

} catch (Exception $e) {
    // Log the error internally (Logging & Monitoring requirement)
    error_log($e->getMessage());
    // Show a generic message to the user (Error Handling requirement)
    die("Connection failed. Please try again later."); 
}
?>