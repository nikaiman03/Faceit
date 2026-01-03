<?php
session_start();

// 1. Clear all session variables
$_SESSION = array();

// 2. Kill the session cookie in the user's browser
// This is critical to prevent session reuse
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 3. Completely destroy the session on the server
session_destroy();

// 4. Redirect to login with a logout confirmation
header("Location: index.php?logout=success");
exit();
?>