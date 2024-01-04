<?php
include "../../../config/connection.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $id = $_POST["taker_id"];
    $member_id = $_POST["member_id"];
    $staff_id = $_POST["staff_id"];
    $date = $_POST["date"];
    $time = $_POST["time"];

    // Validasi data
    $errors = [];

    // Validasi Code (contoh: tidak boleh kosong dan harus alfanumerik
    
    // Jika tidak ada error, simpan data ke database
    if (empty($errors)) {
        $sql = $updateQuery ="UPDATE taker SET taker_id = '$id', member_id = '$member_id', staff_id = '$staff_id', date = '$date', time = '$time' WHERE taker_id= '$id'";
        session_start();
        if (mysqli_query($conn, $sql)) {
            // Data berhasil disimpan
            $_SESSION['success_message'] = "Edit Data Success";
            header("Location: ../../dashboard.php?module=taker");
            
        } else {
            // Terjadi kesalahan
            $errors[] = "Error: " . mysqli_error($conn);
            $_SESSION['error_message'] = $errors;
            header("Location: ../../dashboard.php?module=taker");
        }
        
    }
}

// Jika akses langsung ke action file tanpa submit form
else {
    header("Location: ../../dashboard.php?module=taker");
    exit();
}

mysqli_close($conn); // Tutup koneksi database


?>