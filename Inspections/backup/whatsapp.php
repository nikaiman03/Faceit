<?php 

require "config.php";

if (isset($_GET['No']) && is_numeric($_GET['No'])) {
    $No = $_GET['No'];

    // Fetch the contact from the database
    $sql = "SELECT * FROM faceit WHERE No = $No";
    $result = $connect->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['Name'];
        $phone = $row['Notel'];

        // Remove any non-numeric characters from the phone number

        // Generate the WhatsApp link
        header("Location: tel:$phone");


        echo "<a href='$whatsapp_link'>Contact $name on WhatsApp</a>";

    } else {
        echo "Contact not found";
    }
} else {
    echo "Invalid contact ID";
}