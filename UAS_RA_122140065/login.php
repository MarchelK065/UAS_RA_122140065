<?php
// Memulai sesi
session_start();
require 'core.php'; // Menghubungkan file yang berisi koneksi ke database dan fungsi penting lainnya

$error = ''; // Variabel untuk menyimpan pesan error

// Mengecek jika cookie 'login' sudah diset dan valid
if (isset($_COOKIE['login']) && $_COOKIE['login'] === 'true') {
    $_SESSION['login'] = true; // Set sesi login menjadi true
    header("Location: home.php"); // Redirect ke halaman utama
    exit();
}

// Proses login jika form dikirimkan
if (isset($_POST["login"])) {
    // Menghindari SQL Injection dengan mysqli_real_escape_string
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    // Mencari username dalam tabel login
    $result = mysqli_query($conn, "SELECT * FROM login WHERE username = '$username'");

    // Jika username ditemukan
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        // Verifikasi password yang diinput dengan yang ada di database
        if (password_verify($password, $row["password"])) {
            $_SESSION["login"] = true; // Set sesi login menjadi true

            // Jika opsi "Remember Me" dicentang, set cookie
            if (isset($_POST['remember'])) {
                setcookie('username', $username, time() + (86400 * 30), "/"); // Cookie username
                setcookie('login', 'true', time() + (86400 * 30), "/"); // Cookie login status
            }

            header("Location: home.php"); // Redirect ke halaman utama
            exit();
        } else {
            $error = 'Password yang anda masukkan salah!'; // Pesan error jika password salah
        }
    } else {
        $error = 'Username tidak ditemukan!'; // Pesan error jika username tidak ditemukan
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style1.css"> <!-- Menghubungkan ke file CSS -->
</head>
<body>
<div class="container">
    <h1>Login</h1>
    <!-- Form login -->
    <form id="loginForm" action="login.php" method="POST" enctype="multipart/form-data">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required placeholder="Masukkan Username Anda">

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required placeholder="Masukkan Password Anda">

        <button type="submit" name="login">LOGIN</button>

        <!-- Link untuk pendaftaran jika belum memiliki akun -->
        <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
    </form>

    <!-- Menampilkan pesan error jika ada -->
    <?php if ($error !== ''): ?>
        <p style="color: red;"><?= htmlspecialchars($error); ?></p>
    <?php endif; ?>
</div>
</body>
</html>
