<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang dikirimkan dari form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash password sebelum disimpan
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Query untuk menyimpan data pengguna ke database
    $sql = "INSERT INTO users (email, password) VALUES ('$email', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registrasi berhasil!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
