<?php
include 'connect.php';
error_reporting(E_ALL);
session_start(); // Start the session

// Check if the session variable is set
$result = null;
if (isset($_SESSION['phone_no'])) {
    include "connect.php";
    $phone_no = $_SESSION['phone_no'];

    // Assuming you have a vets table with phone_no and treatment_type columns
    $q = "SELECT treatment_type FROM vets WHERE phone_no='$phone_no'";

    $result = mysqli_query($con, $q);

    if (!$result) {
        die("Error in SQL query: " . mysqli_error($con));
    }

    // Fetch the treatment_type value
    $row = mysqli_fetch_assoc($result);
    $treatmentType = $row['treatment_type'];

    // Redirect based on treatment type
    if ($treatmentType == 'clinical') {
        header("Location: clinical_a.php");
        exit();
    } elseif ($treatmentType == 'virtual') {
        header("Location: virtual_a.php");
        exit();
    } else {
        // Handle other treatment types or provide a default redirect
        header("Location: default_page.php");
        exit();
    }
}

// Close the connection
mysqli_close($con);
?>
