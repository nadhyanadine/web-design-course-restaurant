<?php
require 'config.php';
require 'vendor/autoload.php'; // Sesuaikan dengan path Composer autoload jika diperlukan

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Cek apakah email ada di database
    $check_email = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $check_email);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $user_id = $row['id'];

        // Generate token
        $token = bin2hex(random_bytes(32));

        // Update token di database
        $update_token = "UPDATE users SET reset_token_hash = '$token' WHERE id = '$user_id'";
        mysqli_query($conn, $update_token);

        // Kirim email dengan token menggunakan PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Pengaturan server
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com'; // Ganti dengan server SMTP Anda
            $mail->SMTPAuth   = true;
            $mail->Username   = 'guuudetam4@gmail.com'; // Ganti dengan alamat email SMTP Anda
            $mail->Password   = 'bcpk ecms dkpx oczo'; // Ganti dengan password email SMTP Anda
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            // Penerima
            $mail->setFrom('guuudetam4.learn@gmail.com', 'DevHive');
            $mail->addAddress($email, $row['name']);

            // Konten
            $mail->isHTML(true);
            $mail->Subject = 'Reset Password';
            $mail->Body    = 'Klik tautan berikut untuk mereset kata sandi Anda: <a href="http://localhost/proyek/DevHive/reset_password.php?token=' . $token . '">Reset Password</a>';

            $mail->send();

            $_SESSION['success'] = 'Berhasil! Silakan periksa email Anda';
            header('location:index.php'); // Redirect ke halaman index
            exit();
        } catch (Exception $e) {
            $_SESSION['error'] = 'Pesan tidak dapat dikirim. Kesalahan Mailer: ' . $mail->ErrorInfo;
        }
    } else {
        $_SESSION['error'] = 'Email tidak ditemukan.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <h1>Forgot Password</h1>

    <form method="post" action="send-password-reset.php">

        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Email" required>

        <button type="submit" name="submit">Send</button>
    </form>

    <?php
    if (isset($_SESSION['error'])) {
        echo '<div class="error">' . $_SESSION['error'] . '</div>';
        unset($_SESSION['error']);
    }
    if (isset($_SESSION['success'])) {
        echo '<div class="success">' . $_SESSION['success'] . '</div>';
        unset($_SESSION['success']);
    }
    ?>

</div>

</body>
</html>

<style>
body {
    background-image: url("images/loginbg.avif");
    background-size: cover;
    color: #333;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
}

.container {
    background-color: white;
    width: 400px;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
}

input[type="email"],
input[type="password"],
button {
    margin-top: 10px;
    width: 100%;
    padding: 10px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
}

button {
    background-color: #ffcc00;
    color: black;
    border: none;
    cursor: pointer;
    font-size: 16px;
    border-radius: 5px;
}

button:hover {
    background-color: #e6b800;
}

.error {
    margin-top: 20px;
    color: red;
    font-size: 14px;
}

.success {
    margin-top: 20px;
    color: green;
    font-size: 14px;
}

h1 {
    margin-bottom: 20px;
    color: #555;
}
</style>
