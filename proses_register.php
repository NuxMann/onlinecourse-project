<?php
$conn = mysqli_connect("localhost", "root", "root", "web_course");

$nama     = $_POST['nama'];
$email    = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$confirm  = $_POST['confirm_password'];

if ($password !== $confirm) {
    echo "Password tidak sama!";
    exit;
}

$hash = password_hash($password, PASSWORD_DEFAULT);

$query = mysqli_query($conn, "
  INSERT INTO users (nama, email, username, password)
  VALUES ('$nama', '$email', '$username', '$hash')
");

if ($query) {
    header("Location: login.php");
} else {
    echo "Registrasi gagal!";
}
