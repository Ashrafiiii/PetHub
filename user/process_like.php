// process_like.php
<?php
include("connect.php");

if (isset($_POST['po_id'])) {
    $po_id = $_POST['po_id'];
    $user_id = $userData['u_id'];

    // Check if the user already liked this post
    $checkQuery = "SELECT * FROM likes WHERE po_id = '$po_id' AND u_id = '$user_id'";
    $checkResult = mysqli_query($con, $checkQuery);

    if (mysqli_num_rows($checkResult) == 0) {
        // User hasn't liked this post, so insert a like
        $insertQuery = "INSERT INTO likes (u_id, po_id) VALUES ('$user_id', '$po_id')";
        mysqli_query($con, $insertQuery);
    } else {
        // User already liked this post, you might want to handle unliking
    }
} else {
    echo "Invalid request!";
}
?>
