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
require ("Koneksi.php"); // Memanggil Koneksi.php

$nama_pengunjung = $_POST['nama_pengunjung'];
$deleted = false;
$deletedVisitorId = '';
$deletedVisitorName = '';

$visitors = readVisitors();
$newVisitors = [];

foreach ($visitors as $visitor) {
    if ($visitor['nama_pengunjung'] !== $nama_pengunjung) {
        $newVisitors[] = $visitor; // Tambahkan pengunjung yang tidak dihapus ke array baru
    } else {
        $deleted = true;
        $deletedVisitorId = $visitor['id'];
        $deletedVisitorName = $visitor['nama_pengunjung'];
    }
}

echo "<tr><td>Nama Pengunjung</td><td>" . htmlspecialchars($nama_pengunjung) . "</td></tr>";
?>
</table>
<hr width="300">

<?php
if ($deleted) {
    writeVisitors($newVisitors); // Tulis kembali array yang sudah difilter ke file

    // Log ke histori
    logHistory('DELETE', $deletedVisitorId, $deletedVisitorName, 'Data dihapus');

    echo "Data Pengunjung Telah di Hapus!";
} else {
    echo "Data Pengunjung dengan Nama " . htmlspecialchars($nama_pengunjung) . " tidak ditemukan atau sudah dihapus.";
}
?>
</center>
</body>
</html>
