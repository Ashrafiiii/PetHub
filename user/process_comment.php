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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $post_id = $_POST['po_id'];
    $comment = $_POST['comment'];

    // Insert the comment into the database
    $commentQuery = "INSERT INTO comments (po_id,u_id, comment, timestamp) VALUES ('$post_id', '$user_id','$comment', NOW())";

    if (mysqli_query($con, $commentQuery)) {
        header("location: back_to_profile.php");
    }       
        
     else 
     {
        echo "Error adding comment: " . mysqli_error($con);
    }
}
?>
