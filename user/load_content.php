<?php
// Simulating dynamic content generation
$postsPerPage = 100 ;
$page = isset($_POST['page']) ? $_POST['page'] : 1;

for ($i = 1; $i <= $postsPerPage; $i++) {
    $postNumber = ($page - 1) * $postsPerPage + $i;
    echo "<div class='post'>Post $postNumber - This is some content for post $postNumber.</div>";
}
?>
