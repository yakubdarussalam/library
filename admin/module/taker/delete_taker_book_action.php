<?php

#include "../../../config/connection.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $takerId = $_GET["taker"];
    $bookId = $_GET["bookId"];
    $errors = [];

    // Validasi book code, misalnya, Anda dapat memeriksa apakah itu adalah kode buku yang valid
    if (empty($takerId)) {
        $errors[] = "TakerId cannot be empty.";
    } elseif (empty($bookId)) {
        $errors[] = "BookId cannot be empty.";
    }

    if (empty($errors)) {
        // Lakukan proses penghapusan buku dari database
        $deleteQuery = "DELETE FROM taker_detail WHERE taker_id = '$takerId' AND book_id = '$bookId' ";
        
        if (mysqli_query($conn, $deleteQuery)) {
            // Penghapusan berhasil
            $_SESSION['success_message'] = "Delete Data Success";
            echo "<script>setTimeout(function() { window.location.href = 'dashboard.php?module=taker_detail&&taker=$takerId'; }, 10);</script>";

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
