<?php

#include "../../../config/connection.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $returnId = $_GET["return"];
    $returnDetail = $_GET["return_detail"];
    $errors = [];

    // Validasi book code, misalnya, Anda dapat memeriksa apakah itu adalah kode buku yang valid
    if (empty($returnId)) {
        $errors[] = "ReturnId cannot be empty.";
    } elseif (empty($returnDetail)) {
        $errors[] = "BookId cannot be empty.";
    }

    if (empty($errors)) {
        // Lakukan proses penghapusan buku dari database
        $deleteQuery = "DELETE FROM return_book_detail WHERE return_id = '$returnId' AND return_detail_id = '$returnDetail' ";
        
        if (mysqli_query($conn, $deleteQuery)) {
            // Penghapusan berhasil
            $_SESSION['success_message'] = "Delete Data Success";
            echo "<script>setTimeout(function() { window.location.href = 'dashboard.php?module=return_detail&&return=$returnId'; }, 10);</script>";

        } else {
            // Penghapusan gagal
            $errors[] = "Error: " . mysqli_error($conn);
            $_SESSION['error_message'] = $errors;
            header("Location: ../../dashboard.php?module=dashboard");
        }
        
        // Tutup koneksi database
        mysqli_close($conn);
    }
    // Jika akses langsung ke action file tanpa submit form
    else {
        header("Location: ../../dashboard.php?module=dashboard");
        exit();
    }
}
?>
