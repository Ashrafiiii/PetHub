<?php
session_start(); // Start the session


if(isset($_SESSION['phone_no'])){
    include"connect.php";
    $phone_no = $_SESSION['phone_no'];

    $q="SELECT * FROM vets WHERE phone_no='$phone_no'";
    $data=mysqli_query($con,$q);
    if(mysqli_num_rows($data)>0)
    {
        $row=mysqli_fetch_assoc($data);
    $f_name = $row['f_name'];
    $l_name = $row['l_name'];
    $phone_no = $row['phone_no'];
    $email = $row['email'];    
    $profile_picture = $row['profile_picture'];
    $pwd=$row['pwd'];
    $clinic=$row['clinic_name'];
    $Country=$row['country'];
    $State=$row['state'];
    $district=$row['district'];
    $pin=$row['PIN'];
    $road=$row['road'];
    $landmark=$row['landmark'];
    $treatment_type=$row['treatment_type'];

    }


?>



<!DOCTYPE html>
<html>
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
                    <h1 class="mt-3"><?php echo "$f_name"; ?></h1>
                    <p><?php echo "$email"; ?></p>
                    <p><?php echo "$clinic"; ?></p>
                    <p><?php echo "$treatment_type"; ?></p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item active"><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                    <li class="list-group-item"><a href="#"><i class="fa fa-calendar"></i> View Appointments<span class="badge badge-warning float-right"></span></a></li>
                    <li class="list-group-item"><a href="#"><i class="fa fa-edit"></i> Edit profile</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card mb-4">
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="formFileLg" class="form-label">SELECT YOUR IMAGE</label>
<input class="form-control form-control-lg" id="formFileLg" type="file" />
                            <textarea class="form-control"name="des" rows="2" placeholder="What's in your mind today?" style="margin-top: 10px;"></textarea>
                        </div>
                        <button type="submit" class="btn btn-warning float-right">Post</button>
                        <!-- <ul class="nav nav-pills">
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-map-marker"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-camera"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-film"></i></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#"><i class="fa fa-microphone"></i></a>
                            </li>
                        </ul> -->
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
                            <div class="bio-row">
                                <p><span>First Name </span>: Camila</p>
                            </div>
                            <div class="bio-row">
                                <p><span>Last Name </span>: Smith</p>
                            </div>
                            <div class="bio-row">
                                <p><span>Country </span>: Australia</p>
                            </div>
                            <div class="bio-row">
                                <p><span>Birthday</span>: 13 July 1983</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="bio-row">
                                <p><span>Occupation </span>: UI Designer</p>
                            </div>
                            <div class="bio-row">
                                <p><span>Email </span>: jsmith@flatlab.com</p>
                            </div>
                            <div class="bio-row">
                                <p><span>Mobile </span>: (12) 03 4567890</p>
                            </div>
                            <div class="bio-row">
                                <p><span>Phone </span>: 88 (02) 123456</p>
                            </div>
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
</script>
</body>
</html>


<?php
}
else {
    header("Location: index.php"); // Redirect to login page if session variable is not set
    exit();
}
?>




