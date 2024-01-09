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
        $errors[] = "Return ID tidak boleh kosong.";
    } 

    // Validasi Title (contoh: tidak boleh kosong)
    if (empty($book_id)) {
        $errors[] = "Book ID tidak boleh kosong.";
    }
    
    // Jika tidak ada error, cek terlebih dahulu keberadaan data dalam database
    if (empty($errors)) {
        $checkQuery = "SELECT * FROM return_book_detail WHERE return_id = '$return_id' AND book_id = '$book_id'";
        $result = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($result) > 0) {
            // Jika data sudah ada, tambahkan pesan error
            session_start();
            $_SESSION['error_message'] = "Data already exist.";
            header("Location: ../../dashboard.php?module=return_detail&&return=".$ret_id);
            exit();
        } else {
            // Simpan data ke database jika tidak ada data yang sama
            $sql = "INSERT INTO return_book_detail (return_id, book_id, return_date, penalty, description) VALUES ('$return_id', '$book_id','$return_date','$penalty','$description')";
            session_start();
            if (mysqli_query($conn, $sql)) {
                // Data berhasil disimpan
                $_SESSION['success_message'] = "Input Data Success";
                header("Location: ../../dashboard.php?module=return_detail&&return=".$ret_id);
                exit();
            } else {
                // Terjadi kesalahan
                $errors[] = "Error: " . mysqli_error($conn);
                $_SESSION['error_message'] = $errors;
                header("Location: ../../dashboard.php?module=return_detail&&return=".$ret_id);
                exit();
            }
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