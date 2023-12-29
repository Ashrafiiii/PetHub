<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Registration</title>
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

        
         
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form method="post" action="log_code.php" class="form-group" enctype="multipart/form-data">
                <h2 class="text-center">Owner Login</h2>
                <div class="form-group">
                    
                <div class="form-group">
                    <label for="phone_no">Enter Your Phone Number *</label>
                    <input type="text" id="phone_no" name="phone_no" class="form-control" required>
                </div>
                <div>
                    <label for="password">Enter Your Password *</label>
                    <input type="password" id="password" name="pwd" class="form-control" required>
                </div>
                
                
                 <div class="text-center">
                    <button type="submit" class="btn btn-primary" name="login">Login</button>
                </div>

                <!-- Registration link -->
                <p class="text-center mt-3">Not yet registered? <a href="RegisterUser.php">Register here</a></p>
                
            </form>
        </div>
    </div>
</div>

<!-- Add Bootstrap JS and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>




</body>
</html>
