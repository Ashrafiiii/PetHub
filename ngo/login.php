<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
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
    </style>
</head>
<body>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 offset-md-6">
            <form method="post" action="login_process.php" class="form-group">
                <h2 class="text-center">🔒 Login 🔒</h2>
                <div class="form-group">
                    <label for="phone_no">Phone Number</label>
                    <input type="text" id="phone_no" name="phone_no" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="pwd">Password</label>
                    <input type="password" id="pwd" name="pwd" class="form-control" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary" name="login">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
