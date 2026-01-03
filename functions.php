<?php

/**
 * Requirement: Access Control & Injection-free Implementation (Section 3.1)
 */
function check_login($connect)
{
    // 1. Check if session exists
    if(isset($_SESSION['user_id']))
    {
        // In your system, we stored 'user_name' into the 'user_id' session variable
        $id = $_SESSION['user_id'];

        // 2. PREPARED STATEMENT 
        // FIX: Changed 'user_id' to 'user_name' to match your database columns
        $stmt = $connect->prepare("SELECT * FROM users WHERE user_name = ? LIMIT 1");
        $stmt->bind_param("s", $id); 
        $stmt->execute();
        $result = $stmt->get_result();

        if($result && $result->num_rows > 0)
        {
            return $result->fetch_assoc();
        }
    }

    // 3. Secure Redirection (If not logged in or ID is invalid)
    header("Location: index.php?error=unauthorized");
    exit(); 
}

/**
 * Requirement: Secure Identifier Generation
 */
function random_num($length)
{
    $text = "";
    if($length < 5) {
        $length = 5;
    }

    // Use random_int for cryptographically secure integers
    try {
        $len = random_int(5, $length);

        for ($i=0; $i < $len; $i++) { 
            $text .= random_int(0, 9);
        }
    } catch (Exception $e) {
        // Fallback if random_int fails
        $text = rand(10000, 99999);
    }

    return $text;
}