<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>NGO/Rescuer Registration</title>
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

        .profile-picture {
            max-width: 100px;
            transition: transform 0.2s;
        }

        .profile-picture:hover {
            transform: scale(1.2);
        }
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 offset-md-6">
            <form method="post" action="ngo_code.php" class="form-group">
                <h2 class="text-center">🐾 NGO/Rescuer Registration 🐾</h2>
                <div class="form-group">
                    <label for="phone_no">Phone Number *</label>
                    <input type="text" id="phone_no" name="phone_no" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="email">Email *</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="pwd">Password *</label>
                    <input type="password" id="pwd" name="pwd" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="rescuer_type">Select Type *</label>
                    <select id="rescuer_type" name="rescuer_type" class="form-control" required>
                        <option value="NGO">NGO</option>
                        <option value="Individual">Individual</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Name *</label>
                    <input type="text" id="name" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="registration_number">Registration Number</label>
                    <input type="text" id="registration_number" name="registration_number" class="form-control">
                </div>
                <div class="form-group">
                    <label for="website">Website</label>
                    <input type="text" id="website" name="website" class="form-control">
                </div>
                <div class="form-group">
                    <label for="contact_person_name">Contact Person Name</label>
                    <input type="text" id="contact_person_name" name="contact_person_name" class="form-control">
                </div>
                <div class="form-group">
                    <label for="country">Country *</label>
                    <input type="text" id="country" name="country" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="state">State *</label>
                    <input type="text" id="state" name="state" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="town_village">Town/Village *</label>
                    <input type="text" id="town_village" name="town_village" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="road">Road</label>
                    <input type="text" id="road" name="road" class="form-control">
                </div>
                <div class="form-group">
                    <label for="landmark">Landmark</label>
                    <input type="text" id="landmark" name="landmark" class="form-control">
                </div>
                <div class="form-group">
                    <label for="pin">PIN *</label>
                    <input type="text" id="pin" name="pin" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="registration_date">Registration Date</label>
                    <input type="date" id="registration_date" name="registration_date" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea id="description" name="description" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="profile_picture">Choose a Profile Picture</label>
                    <label for="profile_picture" class="d-block text-center" style="cursor: pointer;">
                        <img id="preview" class="profile-picture mx-auto d-block" src="" alt="Profile Picture">
                        Click to Upload
                    </label>
                    <input id="profile_picture" type="file" name="profile_picture" style="display: none;" onchange="previewImage(event)">
                </div>
                <div class="form-group">
                    <label for="is_verified">Is Verified?</label>
                    <input type="checkbox" id="is_verified" name="is_verified" value="1">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary" name="register">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>
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

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
