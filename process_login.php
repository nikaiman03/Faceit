<?php 
session_start();
include("config.php");
include("functions.php");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
        $_SESSION['alert_message'] = 'Security Token Invalid.';
        header("Location: index.php");
        exit;
    }

    $user_name = trim($_POST['user_name']);
    $password = $_POST['password'];

    if (!empty($user_name) && !empty($password)) {

        // Search for the specific user entered in the box
        $stmt = $connect->prepare("SELECT user_name, password FROM users WHERE user_name = ? LIMIT 1");
        $stmt->bind_param("s", $user_name);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $user_data = $result->fetch_assoc();

            // Check the typed password against the stored Hash
            if (password_verify($password, $user_data['password'])) {
                
                session_regenerate_id(true); 
                
                $_SESSION['user_name'] = $user_data['user_name'];
                $_SESSION['user_id'] = $user_data['user_name']; 

                header("Location: home.php");
                exit;
            }
        }
        
        $_SESSION['alert_message'] = 'Invalid Username or Password!';
        header("Location: index.php");
        exit;

    }
}
?>