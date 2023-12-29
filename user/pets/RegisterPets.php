<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pet Registration</title>
    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Custom CSS for background and text color */
        body {
            background-color: #2F4F4F; /* Muted/nude background color */
        }

        .form-group {
            background-color: rgba(0, 0, 0, 0.7); /* Transparent black background for form */
            color: white; /* White text color */
            padding: 20px;
            border-radius: 10px;
        }

        .profile-pic {
            max-width: 100px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="post" action="reg_code.php" class="form-group" enctype="multipart/form-data">
                <h2 class="text-center">Pet Registration</h2>
                <div class="form-group">
                    <label for="f_name">Enter Your Pet's Name *</label>
                    <input type="text" id="Name" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="l_name">Enter Your Pet's Species*</label>
                    <input type="text" id="Species" name="species" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="phone_no">Enter Your Pet's Breed *</label>
                    <input type="text" id="Breed" name="breed" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="Gender">Enter Your Pet's Gender *</label>
                    <input type="text" id="Gender" name="gender" class="form-control" required>
                </div>
                 <div class="form-group">
                    <label for="weight">Enter Your Pet's Weight *</label>
                    <input type="text" id="weight" name="weight" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="age">Enter Your Pet's Age *</label>
                    <input type="text" id="age" name="age" class="form-control" required>
                </div>
                 <div class="form-group">
                    <label for="medical_history">Enter Your Pet's Medical History (if any)*</label>
                    <input type="text" id="medical_history" name="medical_history" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="Vaccination">Enter Your Pet's Vaccination Status *</label>
                    <input type="text" id="vac_s" name="vaccine_status" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="profile_picture">Choose a Profile Picture</label>
                    <label for="profile_picture" class="d-block text-center" style="cursor: pointer;">
                        <img id="preview" class="profile_picture mx-auto d-block" src="" alt="Profile Picture">
                        Click to Upload
                    </label>
                    <input id="profile_picture" type="file"  name="profile_picture" style="display: none;" onchange="previewImage(event)">
                </div>
                     <div class="form-group">
                    <label for="adopted_status">Is Your Pet Adopted?</label>
                    <input type="checkbox" id="adopted_status" name="adopted_status" value="1">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary" name="register">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Add Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
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
