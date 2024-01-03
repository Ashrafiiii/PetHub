<?php
include 'connect.php';

session_start();
$userId = isset($_SESSION['u_id']) ? $_SESSION['u_id'] : '';

// Ensure form data is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve user input from the form
    $appointmentDate = $_POST['appointment_date'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $townVillage = $_POST['town_village'];
    $pin = $_POST['pin'];
    $vetId = $_POST['vet_selection'];

    // Retrieve pre-filled pet information
    $q = "SELECT * FROM pets WHERE u_id = '$userId'";
    $result = mysqli_query($con, $q);
    $pet = mysqli_fetch_assoc($result);

    if ($pet !== null) {
        // Retrieve pet information for insertion
        $petName = $pet['name'];
        $age = $pet['age'];
        $gender = $pet['gender'];
        $species = $pet['species'];
        $breed = $pet['breed'];
        $weight = $pet['weight'];
        $medicalHistory = $pet['medical_history'];
        $vaccinationStatus = $pet['vaccination_status'];

        // Insert appointment information into the appointments table
        $insertQuery = "INSERT INTO virtual_appointments (u_id, p_id, appointment_date, country, state, town_village, pin, pet_name, age, gender, species, breed, weight, medical_history, vaccination_status, v_id) 
                        VALUES ('$userId', '{$pet['p_id']}', '$appointmentDate', '$country', '$state', '$townVillage', '$pin', '$petName', '$age', '$gender', '$species', '$breed', '$weight', '$medicalHistory', '$vaccinationStatus', '$vetId')";

        $insertResult = mysqli_query($con, $insertQuery);

        if ($insertResult) {
            echo 'Appointment booked successfully!';
        } else {
            echo 'Error booking appointment: ' . mysqli_error($con);
        }
    } else {
        echo 'No pet data available.';
    }
} else {
    // Redirect or handle as needed for non-POST requests
    echo 'Invalid request method.';
}
?>
