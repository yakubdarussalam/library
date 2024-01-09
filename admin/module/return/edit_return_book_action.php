<?php
include "../../../config/connection.php";

$ret_id = $_POST['return_id'];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $return_id = $_POST["return_id"];
    $book_id = $_POST["book_id"];
    $return_date = $_POST["return_date"];
    $penalty = $_POST["penalty"];
    $description = $_POST["description"];

    // Validasi data
    $errors = [];

    // Validasi Code (contoh: tidak boleh kosong dan harus alfanumerik)
    if (empty($return_id)) {
        $errors[] = "Return ID Can't Empty.";
    } 

    // Validasi Title (contoh: tidak boleh kosong)
    if (empty($book_id)) {
        $errors[] = "Book ID Can't Empty.";
    }

    
    // Jika tidak ada error, simpan data ke database
    if (empty($errors)) {
        $sql = "UPDATE return_book_detail SET 
                book_id = '$book_id', 
                return_date = '$return_date', 
                penalty = '$penalty', 
                description = '$description' 
                WHERE return_id = '$return_id' AND ";
        session_start();
        if (mysqli_query($conn, $sql)) {
            // Data berhasil disimpan
            $_SESSION['success_message'] = "Edit Data Success";
            header("Location: ../../dashboard.php?module=return_detail&&return=".$ret_id);
            
        } else {
            // Terjadi kesalahan
            $errors[] = "Error: " . mysqli_error($conn);
            $_SESSION['error_message'] = $errors;
            header("Location: ../../dashboard.php?module=return_detail&&return=".$ret_id);
        }
        
    }
}

// Jika akses langsung ke action file tanpa submit form
else {
    header("Location: ../../dashboard.php?module=dashboard");
    exit();
}

mysqli_close($conn); // Tutup koneksi database


?>