<?php
include "../../../config/connection.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir
    $code = $_POST["code"];
    $title = $_POST["title"];
    $author = $_POST["author"];
    $publisher = $_POST["publisher"];
    $stock = $_POST["stock"];

    // Validasi data
    $errors = [];

    // Validasi Code (contoh: tidak boleh kosong dan harus alfanumerik)
    if (empty($code)) {
        $errors[] = "Code tidak boleh kosong.";
    } 

    // Validasi Title (contoh: tidak boleh kosong)
    if (empty($title)) {
        $errors[] = "Title tidak boleh kosong.";
    }

    // Validasi Author (contoh: tidak boleh kosong)
    if (empty($author)) {
        $errors[] = "Author tidak boleh kosong.";
    }

    // Validasi Publisher (contoh: tidak boleh kosong)
    if (empty($publisher)) {
        $errors[] = "Publisher tidak boleh kosong.";
    }

    // Validasi Stock (contoh: tidak boleh kosong dan harus angka)
    if (empty($stock)) {
        $errors[] = "Stock tidak boleh kosong.";
    } elseif (!is_numeric($stock)) {
        $errors[] = "Stock harus berupa angka.";
    }

    
    // Jika tidak ada error, simpan data ke database
    if (empty($errors)) {
        $sql = "INSERT INTO book (Code, Title, Author, Publisher, Stock) VALUES ('$code', '$title', '$author', '$publisher', '$stock')";
        session_start();
        if (mysqli_query($conn, $sql)) {
            // Data berhasil disimpan
            $_SESSION['success_message'] = "Input Data Success";
            header("Location: ../../dashboard.php?module=book");
            
        } else {
            // Terjadi kesalahan
            $errors[] = "Error: " . mysqli_error($conn);
            $_SESSION['error_message'] = $errors;
            header("Location: ../../dashboard.php?module=book");
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