<?php
include 'connect.php';
// Check connection
if($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Check if the form is submitted
if(isset($_POST['register'])) {
    // Retrieve data from the form
    $phone_no = $_POST['phone_no'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $rescuer_type = $_POST['rescuer_type'];
    $name = $_POST['name'];
    $registration_number = $_POST['registration_number'];
    $website = $_POST['website'];
    $contact_person_name = $_POST['contact_person_name'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $town_village = $_POST['town_village'];
    $road = $_POST['road'];
    $landmark = $_POST['landmark'];
    $pin = $_POST['pin'];
    $registration_date = $_POST['registration_date'];
    $description = $_POST['description'];
    $profile_picture = $_POST['profile_picture'];
    $is_verified = isset($_POST['is_verified']) ? 1 : 0;

    // Insert data into the table
    $sql = "INSERT INTO ngo_rescuer (phone_no, email, pwd, rescuer_type, name, registration_number, website, contact_person_name, country, state, town_village, road, landmark, pin, registration_date, description, profile_picture, is_verified) 
            VALUES ('$phone_no', '$email', '$pwd', '$rescuer_type', '$name', '$registration_number', '$website', '$contact_person_name', '$country', '$state', '$town_village', '$road', '$landmark', '$pin', '$registration_date', '$description', '$profile_picture', '$is_verified')";

    if ($con->query($sql) === TRUE) {
        // Registration successful, store necessary information in session
        session_start();
        $_SESSION['phone_no'] = $phone_no;
        $_SESSION['rescuer_id'] = $con->insert_id; // Assuming rescuer_id is an auto-incremented primary key

        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

// Close the database connection
$con->close();
?>
