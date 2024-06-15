<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="login_process.php" method="post">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <br><br>
            <a href="send-password-reset.php">Forgot Password</a>
            <button type="submit" class="yellow-btn">Login</button>
            <a href="register.php" class="link">Don't have an account? Register Here!</a>
        </form>
    </div>
</body>
</html>
