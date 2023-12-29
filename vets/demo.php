<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cool Vet Registration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #2F4F4F;
            color: white;
            padding-top: 50px;
        }

        .form-group {
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.2s;
        }

        .form-group:hover {
            transform: scale(1.02);
        }

        .profile-pic {
            max-width: 100px;
            transition: transform 0.2s;
        }

        .profile-pic:hover {
            transform: scale(1.2);
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="post" action="reg_code.php" class="form-group" enctype="multipart/form-data">
                <h2 class="text-center">🐾 Vet Registration 🐾</h2>
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
                    <label for="Country">Enter Your Country *</label>
                    <input type="text" id="Country" name="Country" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="State">Enter Your State/Province *</label>
                    <input type="text" id="State" name="State" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="district">Enter Your district*</label>
                    <input type="text" id="district" name="district" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="VillageCityTown">Enter Your Village/City/Town*</label>
                    <input type="text" id="VillageCityTown" name="VillageCityTown" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="pin">Enter Your PIN</label>
                    <input type="text" id="pin" name="pin" class="form-control">
                </div>
                <div class="form-group">
                    <label for="road">Enter Your Road</label>
                    <input type="text" id="road" name="road" class="form-control">
                </div>
                <div class="form-group">
                    <label for="landmark">Enter Your Landmark</label>
                    <input type="text" id="landmark" name="landmark" class="form-control">
                </div>
                <div class="form-group">
                    <label for="clinic_name">Enter Your Clinic *</label>
                    <input type="text" id="clinic_name" name="clinic_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="pwd">Enter Your Password *</label>
                    <input type="password" id="pwd" name="pwd" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="profile_picture">Choose a Profile Picture</label>
                    <label for="profile_picture" class="d-block text-center" style="cursor: pointer;">
                        <img id="preview" class="profile-picture mx-auto d-block" src="" alt="Profile Picture">
                        Click to Upload
                    </label>
                    <input id="profile_picture" type="file" name="profile_picture" style="display: none;" onchange="previewImage(event)">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary" name="register">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>

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
s