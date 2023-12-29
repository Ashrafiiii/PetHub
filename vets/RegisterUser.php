<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Vet Registration</title>
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
                <h2 class="text-center">Vet Registration</h2>
                <div class="form-group">
                    <label for="f_name">Enter Your First Name *</label>
                    <input type="text" id="f_name" name="f_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="l_name">Enter Your Last Name *</label>
                    <input type="text" id="l_name" name="l_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="phone_no">Enter Your Phone Number *</label>
                    <input type="text" id="phone_no" name="phone_no" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Enter Your Email *</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Enter Your Password *</label>
                    <input type="password" id="password" name="pwd" class="form-control" required>
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
                    <label for="dob">Enter Your Date of Birth *</label>
                    <input type="date" id="dob" name="DOB" class="form-control" onchange="calculateAge()" required>
                </div>
                <div class="form-group">
                    <label for="age">Age</label>
                    <input type="text" id="age" name="age" class="form-control" readonly>
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

    function calculateAge() {
        const dob = document.getElementById('dob').value;
        const today = new Date();
        const birthDate = new Date(dob);
        const age = today.getFullYear() - birthDate.getFullYear();

        if (today.getMonth() < birthDate.getMonth() || (today.getMonth() === birthDate.getMonth() && today.getDate() < birthDate.getDate())) {
            age--;
        }

        else {
            alert("You must be 18 years or older to register.");
            document.getElementById('dob').value = "";
            document.getElementById('age').value = "";
        }
    }
</script>

</body>
</html>
