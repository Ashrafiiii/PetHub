<?php
session_start();
include("connect.php");

if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}

$email = $_SESSION['email'];

// Fetch user ID
$userQuery = "SELECT u_id FROM users WHERE email = '$email'";
$userResult = mysqli_query($con, $userQuery);

if ($userResult && mysqli_num_rows($userResult) > 0) {
    $userData = mysqli_fetch_assoc($userResult);
    $user_id = $userData['u_id'];
} else {
    echo "User not found!";
    exit();
}

$caption = $_POST['caption'];

// Rest of your existing code for file upload

$extension = pathinfo($_FILES['photo_video']['name'], PATHINFO_EXTENSION);
$unique_name = uniqid() . '.' . $extension;
$folder = "uploads/" . $unique_name;

if (!file_exists('uploads')) {
    mkdir('uploads', 0755, true);
}

if (move_uploaded_file($_FILES['photo_video']['tmp_name'], $folder)) {
    // Insert post with user ID
    $q = "INSERT INTO post (u_id, photo_video, caption) VALUES ('$user_id', '$folder', '$caption')";

    if (mysqli_query($con, $q)) {
        echo "Successful";
        exit();
    } else {
        echo "Error: " . $q . "<br>" . mysqli_error($con);
    }
} else {
    echo "Error moving uploaded file.";
}
?>