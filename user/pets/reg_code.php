<?php 
include "connect.php";

if (isset($_POST['register'])) {
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

    $q1 = "INSERT INTO pets(name, gender, species, breed, adopted_status, weight, medical_history, age, vaccination_status, profile_picture) 
           VALUES ('$name', '$gender', '$species', '$breed', '$adopted_status', '$weight', '$med_history', '$age', '$vaccine_status', '$unique_name')";

    if(mysqli_query($con, $q1)){
        header("location: user/UserProfile.php");
        exit; // Stop further execution
    } else {
        echo "Insertion failed";
    }
}
?>
