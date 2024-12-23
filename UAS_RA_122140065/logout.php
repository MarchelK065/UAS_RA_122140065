<?php
// Memulai sesi untuk melacak status pengguna
session_start();

// Memasukkan file core.php untuk akses fungsi logout
require 'core.php';

// Memanggil fungsi logout untuk menghapus sesi dan cookie
logout();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <!-- Mengatur refresh otomatis ke halaman login setelah 5 detik -->
    <meta http-equiv="refresh" content="5;url=login.php">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style4.css"> <!-- File CSS untuk styling -->
    <title>Logout Page</title>
</head>

<body>
    <!-- Pesan logout -->
    <h1>LOGOUT</h1>
</body>

</html>
