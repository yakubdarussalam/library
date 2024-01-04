<?php
include "../../../config/connection.php";

$tak_id = $_POST['taker_id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $taker_id = $_POST["taker_id"];
    $book_id = $_POST["book_id"];

    // Validasi data
    $errors = [];

    // Validasi Code (contoh: tidak boleh kosong dan harus alfanumerik)
    if (empty($taker_id)) {
        $errors[] = "Taker ID tidak boleh kosong.";
    } 

    // Validasi Title (contoh: tidak boleh kosong)
    if (empty($book_id)) {
        $errors[] = "Book ID tidak boleh kosong.";
    }
    
    // Jika tidak ada error, simpan data ke database
    if (empty($errors)) {
        $sql = "UPDATE taker_detail SET (taker_id, book_id) VALUES ('$taker_id', '$book_id')";
        session_start();
        if (mysqli_query($conn, $sql)) {
            // Data berhasil disimpan
            $_SESSION['success_message'] = "Input Data Success";
            header("Location: ../../dashboard.php?module=add_taker_book&&taker=".$tak_id);
            
        } else {
            // Terjadi kesalahan
            $errors[] = "Error: " . mysqli_error($conn);
            $_SESSION['error_message'] = $errors;
            header("Location: ../../dashboard.php?module=add_taker_book&&taker=".$tak_id);
        }
        
    }
}

// Jika akses langsung ke action file tanpa submit form
else {
    header("Location: ../../dashboard.php?module=book");
    exit();
}

mysqli_close($conn); // Tutup koneksi database


?>