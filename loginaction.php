<?php
session_start();
include 'db.php';

if (isset($_SESSION['login_message'])) {
    echo '<p>' . $_SESSION['login_message'] . '</p>';
    unset($_SESSION['login_message']);
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {//
        $user = $result->fetch_assoc();
        

        $password_match = password_verify($password, $user['password']);
        

        if ($password_match) {
            $_SESSION['username'] = $username;
            header("Location: welcome.php");
            exit();
        } else {
            echo "<script>alert('Invalid username or password');</script>";
        }
    } else {
        echo "<script>alert('Invalid username or password');</script>";
    }
}
?>