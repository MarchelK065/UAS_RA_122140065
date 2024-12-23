<?php
// Memulai sesi untuk melacak login pengguna
session_start();

// Mengecek apakah pengguna sudah login
if (!isset($_SESSION["login"])) {
    header("Location: login.php"); // Jika belum login, alihkan ke halaman login
    exit;
}

// Memasukkan file core.php yang berisi koneksi database dan fungsi pendukung
require 'core.php';

// Mengambil semua data dari tabel webtoon
$webtoon = query("SELECT * FROM webtoon");

// Memeriksa apakah tombol cari ditekan
if (isset($_POST["cari"])) {
    $webtoon = cari($_POST["keyword"]); // Mencari data berdasarkan keyword
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css"> <!-- File CSS untuk styling -->
    <title>Home Page</title>
</head>

<body style="background-color: darkgrey">
    <!-- Header Halaman -->
    <header class="container">
        <h1>WEBTOON</h1>
    </header>

    <!-- Konten Utama Halaman -->
    <div style="margin-top: 80px;">
        <p class="text-home" itemprop="description">
            Selamat datang di website Webtoon List, tempat berkumpulnya para pembaca komik Webtoon.
        </p>
        <p class="text-home" itemprop="description">
            Di sini, kalian dapat menambahkan list webtoon yang kalian suka dengan mengklik tombol di bawah ini.
        </p>
        <a class="main-link" href="table.php">TOMBOL</a> <!-- Tombol untuk menuju halaman tabel -->
    </div>

    <!-- Footer Halaman -->
    <footer class="container footer">
        <a href="logout.php">LOGOUT</a> <!-- Tombol logout -->
    </footer>
</body>

</html>
