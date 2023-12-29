<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<body>
    <h1>Login</h1>

    <form action="log_code.php" method="post">
        <label for="phone_no">Enter Gmail:</label>
        <input type="text" name="email" required>

        <br>

        <label for="pwd">Enter Password:</label>
        <input type="password" name="pwd" required>

        <br>

        <button type="submit">Login</button>
    </form>
</body>
</html>
