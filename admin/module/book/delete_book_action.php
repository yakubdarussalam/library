<?php

#include "../../../config/connection.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $bookCode = $_GET["book"];
    $errors = [];

    // Validasi book code, misalnya, Anda dapat memeriksa apakah itu adalah kode buku yang valid
    if (empty($bookCode)) {
        $errors[] = "Book code cannot be empty.";
    }

    if (empty($errors)) {
        // Lakukan proses penghapusan buku dari database
        $deleteQuery = "DELETE FROM book WHERE Code = '$bookCode'";
        
        if (mysqli_query($conn, $deleteQuery)) {
            // Penghapusan berhasil
            $_SESSION['success_message'] = "Delete Data Success";
            echo '<script>setTimeout(function() { window.location.href = "dashboard.php?module=book"; }, 1000);</script>';
        } else {
            // Penghapusan gagal
            $errors[] = "Error: " . mysqli_error($conn);
            $_SESSION['error_message'] = $errors;
            header("Location: ../../dashboard.php?module=book");
        }
        
        // Tutup koneksi database
        mysqli_close($conn);
    }
    // Jika akses langsung ke action file tanpa submit form
    else {
        header("Location: ../../dashboard.php?module=book");
        exit();
    }
}
?>
