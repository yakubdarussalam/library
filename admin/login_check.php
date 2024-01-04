<?php
// Lakukan koneksi ke database di sini
include "../config/connection.php";
// Cek apakah form telah di-submit
// Cek apakah form telah di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Lakukan kueri ke database untuk mencari staff dengan username yang cocok
    $sql = "SELECT staff_id, staff_name, staff_password, level FROM staff WHERE staff_username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stored_password = $row['staff_password'];

        // Verifikasi password
        if ($password === $stored_password) {
            // Mulai session jika login berhasil
            session_start();

            // Set session variables
            $_SESSION['staff_id'] = $row['staff_id'];
            $_SESSION['staff_name'] = $row['staff_name'];
            $_SESSION['level'] = $row['level'];

            // Redirect ke halaman setelah login
            header("location: dashboard.php?module=dashboard");
            exit();
        } else {
            // Redirect ke halaman login
            header("location: login.php?error=invalid_cred");
        }
    } else {
        header("location: login.php?error=invalid_cred");
    }
    $conn->close();
}