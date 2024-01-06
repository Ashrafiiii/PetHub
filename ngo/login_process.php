<?php
// login_process.php

// Start the session
session_start();

// Include the connection file
include 'connect.php';

// Check if the form is submitted
if (isset($_POST['login'])) {
    // Retrieve data from the form
    $phone_no = $_POST['phone_no'];
    $pwd = $_POST['pwd'];

    // Validate login credentials
    $sql = "SELECT * FROM ngo_rescuer WHERE phone_no = '$phone_no' AND pwd = '$pwd'";
    $result = $con->query($sql);

    if (!$result) {
        // Print the error message
        echo "Error: " . $con->error;
    } elseif ($result->num_rows > 0) {
        // Valid login credentials
        $_SESSION['phone_no'] = $phone_no; // Set the session variable
        header("location: ngo_res_profile.php"); // Redirect to the profile page
        exit();
    } else {
        echo "Invalid login credentials.";
    }
}

// Close the database connection
$con->close();
?>
