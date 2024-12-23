<?php
// Memulai sesi untuk pengecekan status login
session_start();

// Mengecek apakah pengguna sudah login atau belum
if (!isset($_SESSION["login"])) {
    header("Location: login.php"); // Jika belum login, redirect ke halaman login
    exit;
}

require 'core.php'; // Mengimpor file yang berisi fungsi dan query

// Mengambil data webtoon dari database
$webtoon = query("SELECT * FROM webtoon");

// Menangani pencarian webtoon jika form cari disubmit
if (isset($_POST["cari"])) {
    $webtoon = cari($_POST["keyword"]); // Fungsi untuk mencari webtoon berdasarkan keyword
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0&icon_names=delete" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style3.css"> <!-- Menghubungkan file CSS khusus untuk tampilan -->

    <title>Table Page</title>
</head>

<body style="background-color: darkgray"> <!-- Background abu-abu untuk halaman -->
    <!-- Tombol untuk menambah data baru -->
    <div class="col text-end mt-3">
        <a href="insert.php">
            <button type="button" class="btn btn-outline-success">Tambah</button>
        </a>
    </div>

    <!-- Tabel untuk menampilkan data webtoon -->
    <table class="table table-striped table-hover mt-3">
        <tr>
            <th>No</th>
            <th>Kode Webtoon</th>
            <th>Judul</th>
            <th>Author</th>
            <th>Episode</th>
            <th>Aksi</th>
        </tr>

        <?php $i = 1; ?> <!-- Variabel untuk nomor urut -->
        <?php foreach ($webtoon as $row) : ?> <!-- Looping untuk setiap baris data webtoon -->
            <tr>
                <td><?= $i; ?></td> <!-- Menampilkan nomor urut -->
                <td><?= $row["kode"]; ?></td> <!-- Menampilkan kode webtoon -->
                <td><?= $row["nama"]; ?></td> <!-- Menampilkan nama webtoon -->
                <td><?= $row["author"]; ?></td> <!-- Menampilkan nama author -->
                <td><?= $row["episode"]; ?></td> <!-- Menampilkan jumlah episode -->
                <td>
                    <!-- Tombol untuk mengupdate data -->
                    <a class="text-decoration-none" href="update.php?id=<?= $row["id"]; ?>">
                        <button type="button" class="btn btn-outline-warning">
                            UPDATE
                        </button>
                    </a>
                    <!-- Tombol untuk menghapus data, dengan konfirmasi -->
                    <a class="text-decoration-none" href="delete.php?id=<?= $row["id"]; ?>" onclick="return confirm('Anda yakin menghapus data ini?');">
                        <button type="button" class="btn btn-outline-danger">
                            <span class="material-symbols-outlined">delete</span>
                        </button>
                    </a>
                </td>
            </tr>
            <?php $i++; ?> <!-- Menambah nomor urut -->
        <?php endforeach; ?>
    </table>

    <!-- Footer dengan link logout -->
    <footer class="footer">
        <a class="footer-link" href="logout.php">LOGOUT</a>
    </footer>
</body>

</html>
