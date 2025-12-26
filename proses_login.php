<?php
session_start();

// koneksi database
$conn = mysqli_connect("localhost", "root", "root", "web_course");
if (!$conn) {
    die("Koneksi database gagal!");
}

$username = $_POST['username'];
$password = $_POST['password'];

// ambil user berdasarkan username saja
$query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");

if (mysqli_num_rows($query) === 1) {

    $user = mysqli_fetch_assoc($query);

    // verifikasi password hash
    if (password_verify($password, $user['password'])) {

        // simpan session
        $_SESSION['username'] = $user['username'];
        $_SESSION['nama']     = $user['nama'];   // opsional
        $_SESSION['login']    = true;

        header("Location: index.php");
        exit;

    } else {
        echo "Password salah!";
    }

} else {
    echo "Username tidak ditemukan!";
}
