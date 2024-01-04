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

    // Validasi Code (contoh: tidak boleh kosong dan harus alfanumerik
    // Validasi Code (contoh: tidak boleh kosong dan harus alfanumerik)
    if (empty($id)) {
        $errors[] = "ID tidak boleh kosong.";
    } 

    // Validasi Title (contoh: tidak boleh kosong)
    if (empty($name)) {
        $errors[] = "Name tidak boleh kosong.";
    }

    // Validasi Author (contoh: tidak boleh kosong)
    if (empty($username)) {
        $errors[] = "Username tidak boleh kosong.";
    }

    // Validasi Publisher (contoh: tidak boleh kosong)
    if (empty($password)) {
        $errors[] = "Password tidak boleh kosong.";
    }
     // Validasi Publisher (contoh: tidak boleh kosong)
    if (empty($gender)) {
        $errors[] = "Gender tidak boleh kosong.";
    }
    if (empty($photo)) {
        $errors[] = "Photo tidak boleh kosong.";
    }





    // Jika tidak ada error, simpan data ke database
    if (empty($errors)) {
        $sql = $updateQuery = "UPDATE member SET member_id = '$id', member_name = '$name', member_username = '$username', member_password = '$password', member_gender = '$gender',member_photo = '$photo' WHERE member_id= '$id'";
        session_start();
        if (mysqli_query($conn, $sql)) {
            // Data berhasil disimpan
            $_SESSION['success_message'] = "Edit Data Success";
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