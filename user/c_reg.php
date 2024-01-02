<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);


include 'connect.php';

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data with proper checks
    $petName = isset($_POST['pet_name']) ? $_POST['pet_name'] : '';
    $age = isset($_POST['age']) ? $_POST['age'] : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $species = isset($_POST['species']) ? $_POST['species'] : '';
    $breed = isset($_POST['breed']) ? $_POST['breed'] : '';
    $weight = isset($_POST['weight']) ? $_POST['weight'] : '';
    $medicalHistory = isset($_POST['medical_history']) ? $_POST['medical_history'] : '';
    $vaccinationStatus = isset($_POST['vaccination_status']) ? $_POST['vaccination_status'] : '';
    
    $vetId = isset($_POST['vet_selection']) ? $_POST['vet_selection'] : '';
    $appointmentDate = isset($_POST['appointment_date']) ? $_POST['appointment_date'] : '';
    $country = isset($_POST['country']) ? $_POST['country'] : '';
    $state = isset($_POST['state']) ? $_POST['state'] : '';
    $townVillage = isset($_POST['town_village']) ? $_POST['town_village'] : '';
    $pin = isset($_POST['pin']) ? $_POST['pin'] : '';

    // Retrieve user ID from the session
    session_start();
    $userId = isset($_SESSION['u_id']) ? $_SESSION['u_id'] : '';

    // Retrieve pet data from the database
    $q = "SELECT * FROM pets WHERE u_id = '$userId'";
    $result = mysqli_query($con, $q);

    // Check if pet data is available
    if ($result && mysqli_num_rows($result) > 0) {
        $pet = mysqli_fetch_assoc($result);

        // Start a transaction
        mysqli_begin_transaction($con);

        // Insert data into the appointments table
        $insertQuery = "INSERT INTO appointments (u_id, p_id, appointment_date, country, state, town_village, pin, pet_name, age, gender, species, breed, weight, medical_history, vaccination_status, v_id) 
                        VALUES ('$userId', '{$pet['p_id']}', '$appointmentDate', '$country', '$state', '$townVillage', '$pin', '$petName', '$age', '$gender', '$species', '$breed', '$weight', '$medicalHistory', '$vaccinationStatus', '$vetId')";

        // Execute the query
        if (mysqli_query($con, $insertQuery)) {
            // Commit the transaction if the query is successful
            mysqli_commit($con);
            echo "Appointment booked successfully";
        } else {
            // Roll back the transaction if the query fails
            mysqli_rollback($con);
            echo "Error in appointment query: " . mysqli_error($con);
        }
    } else {
        // Pet data not found
        echo "Pet data not available";
    }
} else {
    // Roll back the transaction if the request method is not POST
    mysqli_rollback($con);
    echo "Invalid request method";
}
?>
