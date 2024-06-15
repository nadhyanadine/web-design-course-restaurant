<?php
$servername = "localhost";
$username = "root"; // Ganti dengan username Anda
$password = ""; // Ganti dengan password Anda
$dbname = "11"; // Ganti dengan nama database Anda

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>