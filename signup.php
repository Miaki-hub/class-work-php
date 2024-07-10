
<?php
include 'db.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    var_dump($password);

    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);

    if ($stmt->execute()) {
        echo "<script>alert('Registered successful!'); window.location.href = 'login.php';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
    body {
    font-family: 'Roboto', sans-serif;
    background-image: url('https://images.unsplash.com/photo-1506748686214-e9df14d4d9d0?fit=crop&w=1350&q=80'); /* Online background image */
    background-size: cover;
    background-position: center;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    color: #333;
}

.register-container {
    background-color: rgba(255, 255, 255, 0.9);
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 4px 15px rgba(76, 175, 80, 0.5);
    width: 100%;
    max-width: 400px;
}

.register-container h2 {
    margin-bottom: 20px;
    text-align: center;
    font-weight: 700;
    color: #4CAF50;
}

.register-container label {
    display: block;
    margin-bottom: 8px;
    font-weight: 700;
    text-align: left; /* Align labels to the left for better readability */
}

.register-container input[type="text"],
.register-container input[type="password"] {
    width: 100%;
    padding: 12px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
    font-size: 16px;
}

.register-container input[type="submit"] {
    width: 100%;
    padding: 12px;
    background-color: #4CAF50;
    border: none;
    border-radius: 5px;
    color: white;
    font-size: 18px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.register-container input[type="submit"]:hover {
    background-color: #45a049;
}

.register-container .register-link {
    text-align: center;
    margin-top: 10px;
}

.register-container .register-link a {
    color: #4CAF50;
    text-decoration: none;
    font-weight: 700;
}

.register-container .register-link a:hover {
    text-decoration: underline;
}

.error-message {
    color: red;
    font-size: 14px;
    margin-top: -10px;
    margin-bottom: 10px;
    text-align: left; /* Align error messages to the left for better readability */
}

    </style>
</head>
<body>
    <div class="register-container">
        <h2> Register Below</h2>
        <form  action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            <label for="password">Confirm Password</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Submit">
        </form>
        
    </div>
</body>
</html>
