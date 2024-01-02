<?php
session_start();
include("connect.php");
if (!isset($_SESSION['email'])) {
    header("Location: index.php"); // Redirect to the login page
    exit();
}
$email = $_SESSION['email'];
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($con, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    // Fetch user details
    $userData = mysqli_fetch_assoc($result);
    $user_id=$userData['u_id'];

    // Extract relevant information
    $f_name = $userData['f_name'];
    $l_name = $userData['l_name'];
    $userEmail = $userData['email'];
    $userProfilePicture = $userData['profile_picture'];
    $country = $userData['country'];
    $date_joined = $userData['date_joined'];
    

    // Add more fields as needed
} else {
    // Handle case when user data is not found
    echo "User not found!";
    exit();
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Profile Page</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
<div class="container mt-5">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                <lable> 
                    <ul class="list-group list-group-flush">

                    <li class="list-group-item"><a href="UserDashboard.php"><i class="fa fa-calendar"></i> Go to User Dashboard </a></li> 
                    </ul>  
                    </lable>
                    <img src="<?php echo $userProfilePicture; ?>" alt="Profile Picture" class="rounded-circle img-fluid">
                    <h1 class="mt-3"><?php echo $f_name; ?></h1>
                    
                </div>
                <!-- Inside the list group in the left sidebar -->
<ul class="list-group list-group-flush">
    <li class="list-group-item active"><a href="#"><i class="fa fa-user"></i> Profile</a></li>
    <li class="list-group-item"><a href="RegisterPets.php"><i class="fa fa-calendar"></i> Add Pet Data <span class="badge badge-warning float-right">9</span></a></li>
    <li class="list-group-item"><a href="ProfilePet.php"><i class="fa fa-edit"></i> Pet Profile </a></li>
</ul>

            </div>
        </div>
        <div class="col-md-9">
            <div class="card mb-4">
                <div class="card-body">
                    <form method="post" action="process_post.php" class="form-group" enctype="multipart/form-data">
                        <h2 class="text-center">Upload Something</h2>

                        <div class="form-group">
                            <label for="photo_video">Choose Photo/Video</label>
                            <label for="photo_video" class="d-block text-center" style="cursor: pointer;">
                                <img id="preview" class="profile_picture mx-auto d-block" src="" alt="Preview">
                                Click to Upload
                            </label>
                            <input id="photo_video" type="file" name="photo_video" style="display: none;" onchange="previewImage(event)">
                        </div>

                        <div class="form-group">
                            <label for="caption">Caption</label>
                            <textarea class="form-control" name="caption" rows="2" placeholder="What's in your mind today?" style="margin-top: 10px;"></textarea>
                        </div>

                        <!-- Add a hidden input field for u_id -->
                        <input type="hidden" name="u_id" value="<?php echo $u_id; ?>">

                        <div class="text-center">
                            <button type="submit" class="btn btn-warning float-right" name="upload">Post</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body text-center bg-dark text-white">
                    <h3> User Info </h3>

                                    </div>
                <div class="card-body bio-graph-info">
                  
                    <div class="row">
                        <div class="col-md-6">
                            <p> <?Php echo $f_name;?>&nbsp<?php echo $l_name ?> </p>
                            <p> <?Php echo $country;?> </p>
                            <p> <?php echo  $date_joined ?> </p>


                            <!-- ... (your existing code) ... -->
                        </div>
                       
                    </div>
                </div>
            </div>
<!-- ... (your existing code) ... -->

<div class="row">
    <?php
    // Fetch and display user posts in descending order
    $postQuery = "SELECT * FROM post WHERE u_id = '$user_id' ORDER BY date_posted DESC";
    


$postResult = mysqli_query($con, $postQuery);

if ($postResult) {
    while ($post = mysqli_fetch_assoc($postResult)) {
        // Display post content, like count, comment count, edit link, and comment form
        echo "<div class='col-md-4 mb-3'>";
        echo "<div class='card'>";
        echo "<img src='{$post['photo_video']}' alt='Post' class='card-img-top'>";
        echo "<div class='card-body'>";
        echo "<p class='card-text'>{$post['caption']}</p>";

        // Add Like and Comment Count
        //echo "<p>Likes: {$post['like_count']} | Comments: {$post['comment_count']}</p>";

        // Add Edit Link
        echo "<a href='edit_post.php?po_id={$post['po_id']}' class='btn btn-primary'>Edit</a>";

        // Add Comment section
        echo "<form method='post' action='process_comment.php'>";
        echo "<input type='hidden' name='po_id' value='{$post['po_id']}'>";
        echo "<textarea class='form-control' name='comment' rows='2' placeholder='Add a comment...'></textarea>";
        echo "<button type='submit' class='btn btn-success'>Comment</button>";
        echo "</form>";

        // Display comments after each post
        $commentQuery = "SELECT comments.*, users.f_name
        FROM comments
        JOIN users ON comments.u_id = users.u_id
        WHERE po_id = '{$post['po_id']}'";

$commentResult = mysqli_query($con, $commentQuery);

while ($comment = mysqli_fetch_assoc($commentResult)) {
echo "<p>{$comment['f_name']}: {$comment['comment']}</p>";
}

        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "Error fetching posts: " . mysqli_error($con);
}
?>


<!-- ... (your existing code) ... -->



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jQuery-Knob/1.2.13/jquery.knob.min.js"></script>

<script>
    $(function() {
        $(".knob").knob();
    });

    function previewImage(event) {
        const input = event.target;
        const reader = new FileReader();
        const preview = document.getElementById('preview');

        reader.onload = function(){
            const dataURL = reader.result;
            preview.src = dataURL;
        }

        reader.readAsDataURL(input.files[0]);
    }
</script>
</body>
</html> 