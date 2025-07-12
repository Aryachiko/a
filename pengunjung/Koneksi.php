<?php
$hostname = "localhost";
$username = "vixmaweb_vixma";
$password = "Vixma0102"; // PASTIKAN INI SAMA DENGAN PASSWORD ASLI ANDA
$database = "vixmaweb_vixma";

$conn = mysqli_connect($hostname, $username, $password, $database);

// Periksa koneksi
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
} else {
    echo "Koneksi database berhasil!";
}
?>
