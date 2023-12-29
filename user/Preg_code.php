<?php 
error_reporting(0);
include "connect.php";

session_start();

if (isset($_POST['register'])) {
    // Check if the user is logged in
    if (!isset($_SESSION['u_id'])) {
        echo "User not logged in";
        exit;
    }

    $u_id = $_SESSION['u_id'];
    $name = $_POST['name'];
    $species = $_POST['species'];
    $breed = $_POST['breed'];
    $gender = $_POST['gender'];    
    $profile_picture = $_FILES['profile_picture']['name'];
    $med_history = $_POST['medical_history'];
    $weight = $_POST['weight'];
    $age = $_POST['age'];
    $adopted_status = $_POST['adopted_status'];
    $vaccine_status = $_POST['vaccine_status'];

    $extension = pathinfo($_FILES['profile_picture']['name'], PATHINFO_EXTENSION);
    $unique_name = uniqid() . '.' . $extension;
    $folder = "images/".$unique_name;

    // Create the "images/" directory if it doesn't exist
    if (!file_exists("images/")) {
        mkdir("images/");
    }

    move_uploaded_file($_FILES['profile_picture']['tmp_name'], $folder);

    $q1 = "INSERT INTO pets(u_id, name, gender, species, breed, adopted_status, weight, medical_history, age, vaccination_status, profile_picture) 
           VALUES ('$u_id', '$name', '$gender', '$species', '$breed', '$adopted_status', '$weight', '$med_history', '$age', '$vaccine_status', '$unique_name')";

    if(mysqli_query($con, $q1)){
        // Get the last inserted pet ID
        $p_id = mysqli_insert_id($con);

        // Store the pet ID in the session
        $_SESSION['p_id'] = $p_id;

        // Redirect to the profile page
        header("location: ProfilePet.php");
        
        // Stop further execution
        exit;
    } else {
        $_SESSION['error_message']  ="Insertion failed";
    }
}
?>
