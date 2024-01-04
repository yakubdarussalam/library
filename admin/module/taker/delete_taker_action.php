<?php
include "../../../config/connection.php";

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $takerId = $_GET["taker"];
    $errors = [];

    // Validasi book code, misalnya, Anda dapat memeriksa apakah itu adalah kode buku yang valid
    if (empty($takerId)) {
        $errors[] = "TakerId cannot be empty.";
    }

    if (empty($errors)) {
        // Lakukan proses penghapusan buku dari database
        $deleteDetailQuery = "DELETE FROM taker_detail WHERE taker_id = '$takerId'";
        $deleteTakerQuery = "DELETE FROM taker WHERE taker_id = '$takerId'";
        
        // Menggunakan transaksi untuk memastikan konsistensi penghapusan data
        mysqli_autocommit($conn, false);
        $success = true;

        // Menghapus data dari taker_detail terlebih dahulu
        if (!mysqli_query($conn, $deleteDetailQuery)) {
            $success = false;
            $errors[] = "Error deleting data from taker_detail: " . mysqli_error($conn);
        }

        // Jika penghapusan dari taker_detail berhasil, lanjutkan dengan penghapusan dari taker
        if ($success && !mysqli_query($conn, $deleteTakerQuery)) {
            $success = false;
            $errors[] = "Error deleting data from taker: " . mysqli_error($conn);
        }

        if ($success) {
            // Jika penghapusan berhasil, commit transaksi
            mysqli_commit($conn);
            $_SESSION['success_message'] = "Delete Data Success";
            echo '<script>setTimeout(function() { window.location.href = "dashboard.php?module=taker"; }, 1 0);</script>';
        } else {
            // Jika terjadi kesalahan, rollback transaksi dan set pesan kesalahan
            mysqli_rollback($conn);
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