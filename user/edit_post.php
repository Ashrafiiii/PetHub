<?php
// Assuming you have a connection to your database established
include("connect.php");

// Check if 'po_id' is set in the URL
if (isset($_GET['po_id'])) {
    // Get the 'po_id' value from the URL
    $po_id = $_GET['po_id'];

    // Use $po_id in your queries or processing
    // For example, retrieve post data from the database
    $postQuery = "SELECT * FROM post WHERE po_id = '$po_id'";
    $postResult = mysqli_query($con, $postQuery);

    if ($postResult) {
        // Fetch and display post data
        $post = mysqli_fetch_assoc($postResult);

        // Now you can use $post['column_name'] to get values
        $caption = $post['caption'];

        // Display the form with pre-filled data for editing
        echo "<form method='post' action='process_edit_post.php'>";
        echo "<input type='hidden' name='po_id' value='$po_id'>";
        echo "<textarea class='form-control' name='caption' rows='2'>$caption</textarea>";
        echo "<button type='submit' class='btn btn-primary'>Save Changes</button>";
        echo "</form>";
    } else {
        echo "Error fetching post data: " . mysqli_error($con);
    }
} else {
    echo "Post ID not provided!";
}
?>
