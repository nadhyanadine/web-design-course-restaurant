<?php
session_start();
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang dikirimkan dari form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Query untuk mendapatkan data pengguna dari database
    $sql = "SELECT id, email, password FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Ambil baris data
        $row = $result->fetch_assoc();
        // Verifikasi password
        if (password_verify($password, $row["password"])) {
            // Set session
            $_SESSION['email'] = $email;
            $_SESSION['user_id'] = $row["id"];
            // Redirect ke halaman utama atau halaman lain yang Anda inginkan
            header("Location: role.php");
            exit;
        } else {
            echo "Email atau password salah";
        }
    } else {
        echo "Email atau password salah";
    }
    $conn->close();
}
?>
