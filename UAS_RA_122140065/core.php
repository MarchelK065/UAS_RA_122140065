<?php

// Koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "webtoon");

/**
 * Fungsi untuk menjalankan query SELECT dan mengembalikan data sebagai array asosiatif
 */
function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

/**
 * Fungsi untuk menambahkan data ke dalam tabel webtoon
 */
function tambah($data) {
    global $conn;

    // Mengamankan input pengguna
    $kode = htmlspecialchars($data["kode"]);
    $nama = htmlspecialchars($data["nama"]);
    $author = htmlspecialchars($data["author"]);
    $episode = htmlspecialchars($data["episode"]);

    // Query untuk menambahkan data
    $query = "INSERT INTO webtoon VALUES ('', '$kode', '$nama', '$author', '$episode')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

/**
 * Fungsi untuk menghapus data berdasarkan ID
 */
function hapus($id) {
    global $conn;

    $id = intval($id); // Mengamankan input ID

    // Query untuk menghapus data
    $query = "DELETE FROM webtoon WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

/**
 * Fungsi untuk mengubah data dalam tabel webtoon
 */
function ubah($data) {
    global $conn;

    // Mengamankan input pengguna
    $id = $data["id"];
    $kode = htmlspecialchars($data["kode"]);
    $nama = htmlspecialchars($data["nama"]);
    $author = htmlspecialchars($data["author"]);
    $episode = htmlspecialchars($data["episode"]);

    // Query untuk mengubah data
    $query = "UPDATE webtoon SET
                kode = '$kode',
                nama = '$nama',
                author = '$author',
                episode = '$episode'
            WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

/**
 * Fungsi untuk mencari data berdasarkan keyword tertentu
 */
function cari($keyword) {
    // Query pencarian
    $query = "SELECT * FROM webtoon
                WHERE
            kode LIKE '%$keyword%' OR
            nama LIKE '%$keyword%' OR
            author LIKE '%$keyword%' OR
            episode LIKE '%$keyword%'";
    return query($query);
}

/**
 * Fungsi untuk registrasi pengguna baru
 */
function register($data) {
    global $conn;

    // Mengamankan input pengguna
    $username = htmlspecialchars($data["username"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $email = htmlspecialchars($data["email"]);
    $akun_ig = htmlspecialchars($data["akun_ig"]);
    $passwordx = mysqli_real_escape_string($conn, $data["passwordx"]);

    // Validasi kesesuaian password
    if ($password !== $passwordx) {
        return false;
    }

    // Enkripsi password
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Mengecek apakah username sudah ada
    $result = mysqli_query($conn, "SELECT * FROM login WHERE username = '$username'");
    if (mysqli_num_rows($result) > 0) {
        return false;
    }

    // Query untuk menambahkan pengguna baru
    $query = "INSERT INTO login (username, password, email, akun_ig) 
              VALUES ('$username', '$password_hash', '$email', '$akun_ig')";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

/**
 * Fungsi untuk login pengguna
 */
function login($username, $password) {
    global $conn;

    // Mencari data pengguna berdasarkan username
    $result = mysqli_query($conn, "SELECT * FROM login WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        // Verifikasi password
        if (password_verify($password, $row["password"])) {
            return $row;
        }
    }

    return false;
}

/**
 * Fungsi untuk logout pengguna
 */
function logout() {
    // Menghapus sesi
    session_unset();
    session_destroy();

    // Menghapus semua cookie yang ada
    if (isset($_SERVER['HTTP_COOKIE'])) {
        $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
        foreach ($cookies as $cookie) {
            $parts = explode('=', $cookie);
            $name = trim($parts[0]);
            setcookie($name, '', time() - 3600, '/');
        }
    }
}

?>
