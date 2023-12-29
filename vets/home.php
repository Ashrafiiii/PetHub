<?php
session_start(); // Start the session

// Check if the session variable is set
if(isset($_SESSION['phone_no'])){
    $phone_no = $_SESSION['phone_no'];
    echo "Welcome, $phone_no!";
} else {
    header("Location: index.php"); // Redirect to login page if session variable is not set
    exit();
}
?>
