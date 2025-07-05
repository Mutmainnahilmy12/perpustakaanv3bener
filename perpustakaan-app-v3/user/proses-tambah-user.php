<?php
session_start();
if (!isset($_SESSION['login']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit;
}

include 'koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];
$role     = $_POST['role'];

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Cek apakah username sudah digunakan
$cek = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
if (mysqli_num_rows($cek) > 0) {
    echo "<script>alert('Username sudah digunakan!'); window.history.back();</script>";
    exit;
}

$query = "INSERT INTO user (username, password, role) VALUES ('$username', '$hashedPassword', '$role')";

if (mysqli_query($conn, $query)) {
    echo "<script>alert('User berhasil ditambahkan!'); window.location.href='dashboard.php';</script>";
} else {
    echo "Gagal menambahkan user: " . mysqli_error($conn);
}
