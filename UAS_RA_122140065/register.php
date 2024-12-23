<?php
// Memulai sesi untuk melacak status pengguna
session_start();

// Menghubungkan file core.php untuk akses fungsi register
require 'core.php';

// Variabel untuk menyimpan pesan error
$error = '';<?php
// Memulai sesi untuk melacak status pengguna
session_start();

// Menghubungkan file core.php untuk akses fungsi register
require 'core.php';

// Variabel untuk menyimpan pesan error
$error = '';

// Proses registrasi jika form dikirimkan
if (isset($_POST["register"])) {
    // Mengambil input dari form
    $username = $_POST["username"];
    $password = $_POST["password"];
    $passwordx = $_POST["passwordx"];
    $email = $_POST["email"];
    $akun_ig = $_POST["akun_ig"];

    // Validasi input kosong
    if (empty($username) || empty($password) || empty($passwordx) || empty($email) || empty($akun_ig)) {
        $error = 'Semua field harus diisi!'; // Pesan error jika ada field kosong
    } elseif ($password !== $passwordx) {
        $error = 'Password dan konfirmasi password tidak cocok!'; // Pesan error jika password tidak cocok
    } else {
        // Data yang akan disimpan dalam database
        $data = [
            'username' => $username,
            'email' => $email,
            'akun_ig' => $akun_ig,
            'password' => $password,
            'passwordx' => $passwordx
        ];
        
        // Fungsi untuk mendaftarkan pengguna baru
        if (register($data) > 0) {
            header("Location: login.php"); // Redirect ke halaman login setelah berhasil
            exit();
        } else {
            $error = 'Username sudah terdaftar!'; // Pesan error jika username sudah digunakan
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="style1.css"> <!-- Menghubungkan ke file CSS untuk styling -->
</head>

<body>
    <div class="container">
        <h1>SIGN UP</h1>
        <!-- Form registrasi -->
        <form id="registrationForm" action="register.php" method="POST" enctype="multipart/form-data">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required placeholder="Masukkan Username Anda">

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required placeholder="Masukkan Email Anda">

            <label for="akun_ig">Akun Instagram</label>
            <input type="text" id="akun_ig" name="akun_ig" required placeholder="Masukkan Akun Instagram Anda">

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required placeholder="Masukkan Password Anda">

            <label for="passwordx">Konfirmasi Password</label>
            <input type="password" id="passwordx" name="passwordx" required placeholder="Konfirmasi Ulang Password Anda">

            <button type="submit" name="register">REGISTER</button>

            <!-- Link ke halaman login jika sudah memiliki akun -->
            <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
        </form>

        <!-- Menampilkan pesan error jika ada -->
        <?php if ($error !== ''): ?>
            <p style="color: red;"> <?= htmlspecialchars($error); ?> </p>
        <?php endif; ?>
    </div>
</body>

</html>


// Proses registrasi jika form dikirimkan
if (isset($_POST["register"])) {
    // Mengambil input dari form
    $username = $_POST["username"];
    $password = $_POST["password"];
    $passwordx = $_POST["passwordx"];
    $email = $_POST["email"];
    $akun_ig = $_POST["akun_ig"];

    // Validasi input kosong
    if (empty($username) || empty($password) || empty($passwordx) || empty($email) || empty($akun_ig)) {
        $error = 'Semua field harus diisi!'; // Pesan error jika ada field kosong
    } elseif ($password !== $passwordx) {
        $error = 'Password dan konfirmasi password tidak cocok!'; // Pesan error jika password tidak cocok
    } else {
        // Data yang akan disimpan dalam database
        $data = [
            'username' => $username,
            'email' => $email,
            'akun_ig' => $akun_ig,
            'password' => $password,
        ];
        
        // Fungsi untuk mendaftarkan pengguna baru
        if (register($data) > 0) {
            header("Location: login.php"); // Redirect ke halaman login setelah berhasil
            exit();
        } else {
            $error = 'Username sudah terdaftar!'; // Pesan error jika username sudah digunakan
        }
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="style1.css"> <!-- Menghubungkan ke file CSS untuk styling -->
</head>

<body>
    <div class="container">
        <h1>SIGN UP</h1>
        <!-- Form registrasi -->
        <form id="registrationForm" action="register.php" method="POST" enctype="multipart/form-data">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required placeholder="Masukkan Username Anda">

            <label for="email">Email</label>
            <input type="email" id="email" name="email" required placeholder="Masukkan Email Anda">

            <label for="akun_ig">Akun Instagram</label>
            <input type="text" id="akun_ig" name="akun_ig" required placeholder="Masukkan Akun Instagram Anda">

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required placeholder="Masukkan Password Anda">

            <label for="passwordx">Konfirmasi Password</label>
            <input type="password" id="passwordx" name="passwordx" required placeholder="Konfirmasi Ulang Password Anda">

            <button type="submit" name="register">REGISTER</button>

            <!-- Link ke halaman login jika sudah memiliki akun -->
            <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
        </form>

        <!-- Menampilkan pesan error jika ada -->
        <?php if ($error !== ''): ?>
            <p style="color: red;"> <?= htmlspecialchars($error); ?> </p>
        <?php endif; ?>
    </div>
</body>

</html>
