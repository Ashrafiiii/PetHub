<?php
session_start();
include("connect.php");

if (!isset($_SESSION['phone_no'])) {
    header("Location: login.php");
    exit();
}

$phone_no = $_SESSION['phone_no'];

// Fetch user ID
$userQuery = "SELECT rescuer_id FROM ngo_rescuer WHERE phone_no = '$phone_no'";
$userResult = mysqli_query($con, $userQuery);

if ($userResult && mysqli_num_rows($userResult) > 0) {
    $userData = mysqli_fetch_assoc($userResult);
    $rescuer_id = $userData['rescuer_id'];
} else {
    echo "User not found!";
    exit();
}

$caption = mysqli_real_escape_string($con, $_POST['caption']); // Sanitize input

// File Upload
$allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'mp4', 'avi', 'mkv']; // Add allowed file types
$extension = pathinfo($_FILES['photo_video']['name'], PATHINFO_EXTENSION);
$unique_name = uniqid() . '.' . $extension;
$folder = "uploads/" . $unique_name;

if (!file_exists('uploads')) {
    mkdir('uploads', 0755, true);
}

if (in_array($extension, $allowedTypes) && move_uploaded_file($_FILES['photo_video']['tmp_name'], $folder)) {
    // Insert post with user ID
    $q = "INSERT INTO res_ngo_post (rescuer_id, photo_video, caption) VALUES ('$rescuer_id', '$folder', '$caption')";

    if (mysqli_query($con, $q)) {
        echo "Successful";
        exit();
    } else {
        echo "Error: " . $q . "<br>" . mysqli_error($con);
    }
} else {
    echo "Error uploading file or invalid file type.";
}
?>
