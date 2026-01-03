<?php
session_start();
include("config.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
    // 1. CSRF Token Validation
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        die("Security Token Invalid.");
    }

    // Capture dynamic inputs from your form
    $user_name = trim($_POST['user_name']);
    $password = $_POST['password'];

    if (!empty($user_name) && !empty($password)) {
        
        // 2. Hash the password (This works for ANY password entered)
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // 3. Save to database
        $stmt = $connect->prepare("INSERT INTO users (user_name, password) VALUES (?, ?)");
        $stmt->bind_param("ss", $user_name, $hashed_password);

        if ($stmt->execute()) {
            echo "<script>alert('Account created successfully for " . htmlspecialchars($user_name) . "'); window.location='index.php';</script>";
        } else {
            echo "Error: " . $stmt->error;
        }
    }
}
?>