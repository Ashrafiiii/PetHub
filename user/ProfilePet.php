<?php
session_start();
include("connect.php");

if (!isset($_SESSION['p_id'])) {
    header("Location: index.php"); // Redirect to the login page
    exit();
}

$p_id = $_SESSION['p_id'];
$sql = "SELECT * FROM pets WHERE p_id = '$p_id'";
$result = mysqli_query($con, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    // Fetch pet details
    $petData = mysqli_fetch_assoc($result);

    // Extract relevant information
    $name = $petData['name'];
    $age=$petData['age'];
    $gender = $petData['gender'];
    $species = $petData['species'];
    $breed = $petData['breed'];
    $weight = $petData['weight'];
    $adopted_status = $petData['adopted_status'];
    $medical_history=$petData['medical_history'];
    $vaccination_status = $petData['vaccination_status'];

    $profile_picture = "images/" . $petData['profile_picture']; // Assuming the images are stored in the 'images' directory

    // Add more fields as needed
} else {
    // Handle case when pet data is not found
    echo "Pet not found!";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pet Profile</title>
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

                    <li class="list-group-item"><a href="UserProfile.php"><i class="fa fa-calendar"></i> Go Back to your Profile </a></li> 
                    </ul>  
                    </lable>
                    <img src="<?php echo $profile_picture; ?>" alt="Profile Picture" class="rounded-circle img-fluid">
                    <h1 class="mt-3"><?php echo $name; ?></h1>
                    <p><?php echo $gender; ?><?php echo ",".$age ?> </p>

                </div>
                <!-- Inside the list group in the left sidebar -->


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
                            
                            <p> Species: <?Php echo $species;?> </p>
                            <p> Breed: <?php echo  $breed ?> </p>
                            <p> Medical History: <?php echo  $medical_history ?> </p>
                            <p>Vaccination status: <?php echo  $vaccination_status ?> </p>
                            <p> adopted: <?php echo  $adopted_status ?> </p>
                            <p> Gender: <?php echo  $gender ?> </p>

                            <p> Weight: <?php echo  $weight ?> </p>

                           
                        </div>
                       
                    </div>
                </div>
            </div>




</body>
</html>