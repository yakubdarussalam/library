<?php
include "../../../config/connection.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $id = $_POST["staff_id"];
    $name = $_POST["staff_name"];
    $username = $_POST["staff_username"];
    $password = $_POST["staff_password"];
    $level = $_POST["level"];
    $gender = $_POST["staff_gender"];
    $photo = $_POST["staff_photo"];

    // Validasi data
    $errors = [];

    // Validasi Code (contoh: tidak boleh kosong dan harus alfanumerik)
    
    // Jika tidak ada error, simpan data ke database
    if (empty($errors)) {
        $sql = "INSERT INTO staff (staff_id, staff_name, staff_username, staff_password, level, staff_gender, staff_photo) VALUES ('$id', '$name', '$username', '$password','$level', '$gender','$photo')";
        session_start();
        if (mysqli_query($conn, $sql)) {
            // Data berhasil disimpan
            $_SESSION['success_message'] = "Input Data Success";
            header("Location: ../../dashboard.php?module=staff");
            
        } else {
            // Terjadi kesalahan
            $errors[] = "Error: " . mysqli_error($conn);
            $_SESSION['error_message'] = $errors;
            header("Location: ../../dashboard.php?module=staff");
        }
        
    }
}

// Jika akses langsung ke action file tanpa submit form
else {
    header("Location: ../../dashboard.php?module=staff");
    exit();
}

mysqli_close($conn); // Tutup koneksi database


?>