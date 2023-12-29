<?php
include("connect.php");

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    // Fetch and display user posts in descending order
    $postQuery = "SELECT * FROM post WHERE u_id = '$user_id' ORDER BY date_posted DESC";
    $postResult = mysqli_query($con, $postQuery);if (!$postResult) {
        die('error in the SQL query:'. mysqli_error($con));
    }

    while ($post = mysqli_fetch_assoc($postResult)) {
        echo "<div class='col-md-4 mb-3'>";
        echo "<div class='card'>";
        echo "<img src='{$post['photo_video']}' alt='Post' class='card-img-top'>";
        echo "<div class='card-body'>";
        // If you want to show the date, uncomment the next line
        // echo "<p class='card-text'>{$post['date_posted']}</p>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
}
?>
