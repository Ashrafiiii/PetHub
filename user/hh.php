
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

    // Extract relevant information
    $userName = $userData['username'];
    $userEmail = $userData['email'];
    $userProfilePicture = $userData['profile_picture'];
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
                    <img src="<?php echo $profile_picture; ?>" alt="Profile Picture" class="rounded-circle img-fluid">
                    <h1 class="mt-3"><?php echo $f_name; ?></h1>
                    <p><?php echo "$email"; ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item active"><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                    <li class="list-group-item"><a href="#"><i class="fa fa-calendar"></i> Pet Profile <span class="badge badge-warning float-right">9</span></a></li>
                    <li class="list-group-item"><a href="#"><i class="fa fa-edit"></i> Edit profile</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card mb-4">
                <div class="card-body">
                    <form method="post" action="process_post.php" class="form-group" enctype="multipart/form-data">
                        <h2 class="text-center">Upload Photo/Video</h2>

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
                    <p>Aliquam ac magna metus. Nam sed arcu non tellus fringilla fringilla ut vel ispum. Aliquam ac magna metus.</p>
                </div>
                <div class="card-body bio-graph-info">
                    <h1>Bio Graph</h1>
                    <div class="row">
                        <div class="col-md-6">
                            <!-- ... (your existing code) ... -->
                        </div>
                        <div class="col-md-6">
                            <!-- ... (your existing code) ... -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <canvas class="knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" data-fgcolor="#e06b7d" data-bgcolor="#e8e8e8"></canvas>
                        </div>
                        <div class="card-body">
                            <h4 class="text-danger">Envato Website</h4>
                            <p>Started : 15 July</p>
                            <p>Deadline : 15 August</p>
                        </div>
                    </div>
                </div>
                <!-- Add similar col-md-6 cards for other projects -->
            </div>
        </div>
    </div>
</div>

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