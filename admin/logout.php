<?php
// Mulai session
session_start();

// Hapus semua data session
session_unset();

// Hancurkan session
session_destroy();

// Redirect ke halaman login setelah logout dengan pesan sukses
header("location: login.php?logout=success");
exit();
?>
