<?php 
// Ensure session is started if not already
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

/**
 * SESSION SECURITY & TIMEOUT MANAGEMENT
 * Requirement: Secure Session Management (UniKL Project Section 3.1)
 */

// 1. Session Fixation Protection
// Regenerate session ID every 5 minutes to keep it "rolling"
if (!isset($_SESSION['created'])) {
    $_SESSION['created'] = time();
} else if (time() - $_SESSION['created'] > 300) {
    session_regenerate_id(true); // Generates a new ID and deletes the old one
    $_SESSION['created'] = time();
}

// 2. Simple Fingerprinting (Session Hijacking Protection)
// Store the user's browser agent. If it changes mid-session, log them out.
if (!isset($_SESSION['user_agent'])) {
    $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
} else {
    if ($_SESSION['user_agent'] !== $_SERVER['HTTP_USER_AGENT']) {
        session_unset();
        session_destroy();
        header("Location: index.php?error=session_invalid");
        exit();
    }
}

// 3. Inactivity Timeout (Default: 10 Minutes)
$inactiveTimeout = 600; 

if (isset($_SESSION['last_activity'])) {
    $sessionDuration = time() - $_SESSION['last_activity'];
    
    if ($sessionDuration > $inactiveTimeout) {
        // Destroy session if inactive for too long
        session_unset();
        session_destroy();
        
        // Redirect with a message
        header("Location: index.php?timeout=1");
        exit();
    }
}

// Update the last activity time
$_SESSION['last_activity'] = time();
?>