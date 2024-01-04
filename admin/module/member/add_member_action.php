<?php
include "../../../config/connection.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $id = $_POST["member_id"];
    $name = $_POST["member_name"];
    $username = $_POST["member_username"];
    $password = $_POST["member_password"];
    $gender = $_POST["member_gender"];
    $photo = $_POST["member_photo"];

    // Validasi data
    $errors = [];

    // Validasi Code (contoh: tidak boleh kosong dan harus alfanumerik)
    
    // Jika tidak ada error, simpan data ke database
    if (empty($errors)) {
        $sql = "INSERT INTO member (member_id, member_name, member_username, member_password, member_gender, member_photo) VALUES ('$id', '$name', '$username', '$password', '$gender','$photo')";
        session_start();
        if (mysqli_query($conn, $sql)) {
            // Data berhasil disimpan
            $_SESSION['success_message'] = "Input Data Success";
            header("Location: ../../dashboard.php?module=member");
            
        } else {
            // Terjadi kesalahan
            $errors[] = "Error: " . mysqli_error($conn);
            $_SESSION['error_message'] = $errors;
            header("Location: ../../dashboard.php?module=member");
        }
        
    }
}

// Jika akses langsung ke action file tanpa submit form
else {
    header("Location: ../../dashboard.php?module=member");
    exit();
}

mysqli_close($conn); // Tutup koneksi database


?>