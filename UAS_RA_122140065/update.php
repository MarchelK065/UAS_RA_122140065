<?php

// Memasukkan file core.php untuk menjalankan fungsi-fungsi yang diperlukan
require 'core.php';

// Mendapatkan ID webtoon yang akan diubah melalui URL
$id = $_GET["id"];

// Mengambil data webtoon berdasarkan ID yang diberikan
$webtoon = query("SELECT * FROM webtoon WHERE id = $id")[0];

// Mengecek jika form submit sudah dikirim
if (isset($_POST["submit"])) {

    // Mengecek apakah data berhasil diubah
    if (ubah($_POST) > 0) {
        echo "
            <script>
                alert('Berhasil Mengubah Data');
                document.location.href = 'table.php'; // Mengarahkan kembali ke halaman tabel
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Gagal Mengubah Data');
                document.location.href = 'table.php'; // Mengarahkan kembali ke halaman tabel
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
    <title>Update Page</title>
    <link rel="stylesheet" href="style1.css"> <!-- Menyertakan file CSS untuk styling -->
</head>

<body>
    <div class="container">
        <!-- Formulir untuk mengupdate data webtoon -->
        <form id="insertForm" action="update.php?id=<?= $id; ?>" method="POST" enctype="multipart/form-data">
            <label for="kode">Kode Webtoon</label>
            <input type="text" id="kode" name="kode" required value="<?= $webtoon['kode']; ?>" placeholder="Masukkan Kode Webtoon">

            <label for="nama">Judul</label>
            <input type="text" id="nama" name="nama" required value="<?= $webtoon['nama']; ?>" placeholder="Masukkan Judul">

            <label for="author">Author</label>
            <input type="text" id="author" name="author" required value="<?= $webtoon['author']; ?>" placeholder="Masukkan Nama Author">

            <label for="episode">Episode</label>
            <input type="number" id="episode" name="episode" required value="<?= $webtoon['episode']; ?>" placeholder="Masukkan Total Episode">

            <button type="submit" name="submit">SUBMIT</button> <!-- Tombol untuk mengirimkan form -->
            <p>Sudah punya akun? <a href="login.php">Login di sini</a></p> <!-- Link untuk login jika belum login -->
        </form>
    </div>
</body>

</html>
