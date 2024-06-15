<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang dikirimkan dari form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash kata sandi sebelum menyimpannya ke database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Query untuk memperbarui kata sandi pengguna
    $sql = "UPDATE users SET password='$hashed_password' WHERE email='$email'";
    if ($conn->query($sql) === TRUE) {
        // Set session
        $_SESSION['email'] = $email;
        // Anda bisa mengambil user_id jika diperlukan
        $sql_get_user = "SELECT id FROM users WHERE email='$email'";
        $result = $conn->query($sql_get_user);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['user_id'] = $row["id"];
        }
        // Redirect ke halaman utama atau halaman lain yang Anda inginkan
        header("Location: index.php");
        exit;
    } else {
        echo "Terjadi kesalahan saat mengupdate kata sandi: " . $conn->error;
    }
    $conn->close();
}
?>
