<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <form action="register_process.php" method="post">
            <input type="email" name="email" placeholder="email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" class="yellow-btn">Register</button>
            <a href="index.php" class="link">Already have an account? Login Here!</a>
        </form>
    </div>
</body>
</html>
