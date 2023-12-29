<?php
include("connect.php");

if (isset($_POST['po_id']) && isset($_POST['caption'])) {
    $po_id = $_POST['po_id'];
    $caption = $_POST['caption'];

    $updateQuery = "UPDATE post SET caption = '$caption' WHERE po_id = '$po_id'";

    if (mysqli_query($con, $updateQuery)) {
        header("Location: profile.php");
        exit();
    } else {
        echo "Error updating post: " . mysqli_error($con);
    }
} else {
    echo "Invalid request!";
}
?>
