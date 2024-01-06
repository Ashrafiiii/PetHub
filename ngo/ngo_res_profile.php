<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

include "connect.php";

if (isset($_SESSION['phone_no'])) {
    $phone_no = $_SESSION['phone_no'];

    $q = "SELECT * FROM ngo_rescuer WHERE phone_no='$phone_no'";
    $result = mysqli_query($con, $q);

    if (!$result) {
        echo "Error: " . mysqli_error($con);
        exit();
    }

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $rescuer_id = $row["rescuer_id"];
        $name = $row['name'];
        $rescuer_type = $row['rescuer_type'];
        $country = $row['country'];
        $profile_picture = $row['profile_picture'];
        $pwd = $row['pwd'];
        $website = $row['website'];
        $contact_person_name = $row['contact_person_name'];
        $State = $row['state'];
        $town_village = $row['town_village'];
        $pin = $row['pin'];
        $road = $row['road'];
        $landmark = $row['landmark'];
        $country = $row['country'];
        $description = $row['description'];
        $email = $row['email'];
    } else {
        echo "No records found for the user.";
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rescuer & NGO</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-center">
                        <img src="<?php echo $profile_picture; ?>" alt="Profile Picture" class="rounded-circle img-fluid">
                        <h1 class="mt-3"><?php echo $name; ?></h1>
                        <p><?php echo $rescuer_type; ?></p>
                        <p><?php echo $country; ?></p>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item active"><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                        <li class="list-group-item"><a href="put_adopt.php"><i class="fa fa-calendar"></i> Put Up For Adoption<span class="badge badge-warning float-right"></span></a></li>
                        <li class="list-group-item"><a href="#"><i class="fa fa-edit"></i> Edit profile</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card mb-4">
                    <div class="card-body">
                        <form method="post" action="process_post_ngo.php" class="form-group" enctype="multipart/form-data">
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
                            <!-- Add a hidden input field for rescuer_id -->
                            <input type="hidden" name="rescuer_id" value="<?php echo $rescuer_id; ?>">
                            <div class="text-center">
                                <button type="submit" class="btn btn-warning float-right" name="upload">Post</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body bio-graph-info">
                        <h1>Bio</h1>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="bio-row">
                                    <p><span>Name </span>: <?php echo $name; ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Ngo/Individual </span>: <?php echo $rescuer_type; ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Country </span>: <?php echo $country; ?></p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="bio-row">
                                    <p><span>Contact Person Name </span>: <?Php echo $contact_person_name; ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Email </span>: <?php echo $email; ?></p>
                                </div>
                                <div class="bio-row">
                                    <p><span>Mobile </span>: <?php echo $phone_no; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php
                    // Fetch and display rescuer posts in descending order
                    $postQuery = "SELECT * FROM res_ngo_post WHERE rescuer_id = '$rescuer_id' ORDER BY date_posted DESC";
                    $postResult = mysqli_query($con, $postQuery);

                    if ($postResult) {
                        while ($post = mysqli_fetch_assoc($postResult)) {
                            // Display post content, like count, comment count, edit link, and comment form
                            echo "<div class='col-md-4 mb-3'>";
                            echo "<div class='card'>";
                            echo "<img src='{$post['photo_video']}' alt='Post' class='card-img-top'>";
                            echo "<div class='card-body'>";
                            echo "<p class='card-text'>{$post['caption']}</p>";

                            // Add Edit Link
                            echo "<a href='edit_post_res.php?res_id={$post['res_id']}' class='btn btn-primary'>Edit</a>";

                            // Add Comment section
                          /*  echo "<form method='post' action='res_process_comment.php'>";
                            echo "<input type='hidden' name='res_id' value='{$post['res_id']}'>";
                            echo "<textarea class='form-control' name='comment' rows='2' placeholder='Add a comment...'></textarea>";
                            echo "<button type='submit' class='btn btn-success'>Comment</button>";
                            echo "</form>";

                            // Display comments after each post
                            $commentQuery = "SELECT comments.*, ngo_rescuer.f_name
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
                    ?>*/
                }
            }
                ?>
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
