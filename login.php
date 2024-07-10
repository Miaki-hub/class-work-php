
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="styles.css" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Submit">
        </form>
        <div class="register-link">
            <p>Don't have an account? <a href="signup.php">Register here</a></p>
        </div>
    </div>
</body>
</html>
