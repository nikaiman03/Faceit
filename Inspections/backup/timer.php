<?php 

// Start the session
//session_start();

// Set the inactivity timeout period (in seconds)
$inactiveTimeout = 300; // 5 minutes

// Check if the user has an active session
if (isset($_SESSION['last_activity']) && time() - $_SESSION['last_activity'] > $inactiveTimeout) {
    // If inactive for too long, destroy the session and log the user out
    session_unset();
    session_destroy();
    header("Location: index.php"); // Redirect to your login page
    exit();
}

// Update the last activity time in the session
$_SESSION['last_activity'] = time();

 ?>

