<?php
// Memasukkan file core.php yang berisi koneksi database dan fungsi pendukung
require 'core.php';

// Mengambil ID dari parameter URL
$id = $_GET["id"];

// Memeriksa apakah data berhasil dihapus
if (hapus($id) > 0) {
    // Jika data berhasil dihapus, tampilkan pesan sukses dan arahkan kembali ke halaman tabel
    echo "
    <script>
        alert('Berhasil Menghapus Data');
        document.location.href = 'table.php';
    </script>
    ";
} else {
    // Jika data gagal dihapus, tampilkan pesan kesalahan dan tetap arahkan ke halaman tabel
    echo "
    <script>
        alert('Gagal Menghapus Data');
        document.location.href = 'table.php';
    </script>
    ";
}
?>
