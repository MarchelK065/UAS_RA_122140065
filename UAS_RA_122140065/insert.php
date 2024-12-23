<?php
// Memulai sesi untuk melacak status pengguna
session_start();

// Mengecek apakah sesi tambah sudah diatur
if (isset($_SESSION["tambah"])) {
    header("Location: insert.php"); // Jika iya, alihkan ke halaman insert
    exit;
}

// Memasukkan file core.php yang berisi koneksi database dan fungsi pendukung
require 'core.php';

// Memproses form ketika tombol submit ditekan
if (isset($_POST["submit"])) {
    // Memeriksa apakah data berhasil ditambahkan
    if (tambah($_POST) > 0) {
        echo "
            <script>
                alert('Berhasil Menambahkan');
                document.location.href = 'table.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Gagal Menambahkan');
                document.location.href = 'table.php';
            </script>
        ";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Page</title>

    <link rel="stylesheet" href="style1.css"> <!-- File CSS untuk styling -->
</head>

<body>
    <div class="container">
        <!-- Form untuk menambahkan data webtoon -->
        <form id="insertForm" action="insert.php" method="POST" enctype="multipart/form-data">
            <label for="kode">Kode Webtoon</label>
            <input type="text" id="kode" name="kode" required placeholder="Masukkan Kode Webtoon">

            <label for="judul">Judul</label>
            <input type="text" id="nama" name="nama" required placeholder="Masukkan Judul">

            <label for="author">Author</label>
            <input type="text" id="author" name="author" required placeholder="Masukkan Nama Author">

            <label for="episode">Episode</label>
            <input type="text" id="episode" name="episode" required placeholder="Masukkan Total Episode">

            <button type="submit" name="submit">SUBMIT</button>

            <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
        </form>
    </div>
</body>

</html>
