<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

include "connect.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if rescuer_id is set in the session
    if (isset($_SESSION['rescuer_id'])) {
        // Collect form data
        $rescuer_id = $_SESSION['rescuer_id'];
        $name = mysqli_real_escape_string($con, $_POST['name']);
        $age = mysqli_real_escape_string($con, $_POST['age']);
        $species = mysqli_real_escape_string($con, $_POST['species']);
        $breed = mysqli_real_escape_string($con, $_POST['breed']);
        $vaccination_status = mysqli_real_escape_string($con, $_POST['vaccination_status']);
        $description = mysqli_real_escape_string($con, $_POST['description']);
        $special_needs = mysqli_real_escape_string($con, $_POST['special_needs']);
        $special_description = mysqli_real_escape_string($con, $_POST['special_description']);

        // Process and move uploaded photo to a folder
        $target_dir = "uploads/"; // Create a folder named 'uploads' in the same directory as this PHP file
        $target_file = $target_dir . basename($_FILES["photo"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["photo"]["tmp_name"]);
        if ($check !== false) {
            // Image is valid, proceed with upload
            if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars(basename($_FILES["photo"]["name"])) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // If everything is ok, insert data into the database
        if ($uploadOk == 1) {
            // Use the uploaded file path for the 'photo' field in your database
            $photo_path = $target_file;

            // Add an SQL query to insert data into your adoption table
            $insertQuery = "INSERT INTO adoption (rescuer_id, name, age, species, breed, vaccination_status, description, special_needs, special_description, photo, timestamp) 
                            VALUES ('$rescuer_id', '$name', '$age', '$species', '$breed', '$vaccination_status', '$description', '$special_needs', '$special_description', '$photo_path', NOW())";

            $insertResult = mysqli_query($con, $insertQuery);

            if ($insertResult) {
                echo "Adoption information has been added successfully.";
            } else {
                echo "Error inserting data into the database: " . mysqli_error($con);
            }
        }
    } else {
        echo "Rescuer ID not found in the session.";
    }
} else {
    echo "Invalid request.";
}
?>
