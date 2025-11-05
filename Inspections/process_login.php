<!DOCTYPE html>
<html>
<head>
    <title>Login Account</title>
</head>
<body>



</body>
</html

<?php 

session_start();

    include("config.php");
    include("functions.php");


    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        //something was posted
        $user_name = $_POST['user_name'];
        $password = $_POST['password'];

        if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
        {

            //read from database
            $query = "select * from users where user_name = '$user_name' limit 1";
            $result = mysqli_query($connect, $query);

            if($result)
            {
                if($result && mysqli_num_rows($result) > 0)
                {

                    $user_data = mysqli_fetch_assoc($result);
                    
                    if($user_data['password'] === $password)
                    {

                        $_SESSION['user_id'] = $user_data['user_id'];
                        header("Location: home.php");
                        die;
                    } 

                    else {
                        // Incorrect password, set an alert message in session and redirect to index.php
                        $_SESSION['alert_message'] = 'You Entered The Wrong Username Or Password! If You Might Have a Problem With Your Account, Please Contact Your Administrator';
                        header("Location: index.php");
                        die; // Terminate script execution after redirection
                    }

                }

                else{

                    
                        // Incorrect password, set an alert message in session and redirect to index.php
                        $_SESSION['alert_message'] = 'You Entered The Wrong Username Or Password! If You Might Have a Problem With Your Account, Please Contact Your Administrator';
                        header("Location: index.php");
                        die;

                }

            }
         }

             else {
                // Empty or invalid username/password, set an alert message in session and redirect to index.php
                $_SESSION['alert_message'] = 'You Entered The Wrong Username Or Password! If You Might Have a Problem With Your Account, Please Contact Your Administrator';
                header("Location: index.php");
                die; // Terminate script execution after redirection
        }
    }

?>