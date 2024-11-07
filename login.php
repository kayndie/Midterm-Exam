<?php
session_start();

require_once 'core/dbConfig.php';
require_once 'core/models.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = loginUser($pdo, $username, $password);

    if ($user) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            header("Location: index.php");
            exit();
        } else {
            echo "Invalid credentials, please try again.";
        }
    } else {
        echo "Invalid credentials, please try again.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <center>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
    <title>Login</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        h2 { color: white; }
        label, input { display: block; margin: 10px 0; }
    </style>
    </center>
</head>
<center>
<body>
    <h2>Login</h2>
    <form action="login.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>

        <input type="submit" value="Login">
        <a href="register.php" class="register-btn" style="color:white">Register Here</a>
    </form>
</body>
</center>

</html>
