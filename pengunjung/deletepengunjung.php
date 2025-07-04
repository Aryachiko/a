<!DOCTYPE html>
<html>
<head>
    <title>Hapus Data Pengunjung</title>
</head>
<body>
<center>
<h1>Hapus Data Pengunjung</h1>
<hr width="300">
<table>
<?php
require ("Koneksi.php");

$nama_pengunjung = $_POST['nama_pengunjung'];

$sql = "DELETE FROM pengunjung WHERE nama_pengunjung = '$nama_pengunjung'";

$hasil = mysqli_query($conn, $sql);

echo "<tr><td>Nama Pengunjung</td><td>" . htmlspecialchars($nama_pengunjung) . "</td></tr>";
?>
</table>
<hr width="300">

<?php
if ($hasil) {
    if (mysqli_affected_rows($conn) > 0) {
        echo "Data Pengunjung Telah di Hapus";
    } else {
        echo "Data Pengunjung dengan Nama " . htmlspecialchars($nama_pengunjung) . " tidak ditemukan atau sudah dihapus.";
    }
} else {
    echo "Error menghapus data: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
</center>
</body>
</html>