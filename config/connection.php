<?php
$host = "localhost";  // Ganti dengan host database Anda
$user = "root";       // Ganti dengan username database Anda
$pass = "";   // Ganti dengan password database Anda
$dbname = "library";  // Ganti dengan nama database yang ingin Anda gunakan

// Membuat koneksi ke database
$conn = mysqli_connect($host, $user, $pass, $dbname);

// Memeriksa koneksi
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
} else {
    // Lakukan operasi database di sini
    // Misalnya, menjalankan query SQL, mengambil data, atau melakukan pekerjaan lain dengan database
}

// Tutup koneksi saat Anda selesai
//mysqli_close($conn);
?>