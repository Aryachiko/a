<html>
<head>
    <title>Save Pengunjung</title>
</head>
<body>
<center>
<font size="6">
Informasi Data Pengunjung
</font>
<hr width="320">
<table>
<?php
require ("Koneksi.php"); // Memanggil Koneksi.php yang sekarang berisi fungsi file

$nama_pengunjung = $_POST['nama_pengunjung'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$tanggal_berkunjung = $_POST['tanggal_berkunjung'];
$hobi = $_POST['hobi'];
$disukai = $_POST['disukai'];

echo "<tr><td>Nama Pengunjung</td><td>" . htmlspecialchars($nama_pengunjung) . "</td></tr>";
echo "<tr><td>Jenis Kelamin</td><td>" . htmlspecialchars($jenis_kelamin) . "</td></tr>";
echo "<tr><td>Tanggal Berkunjung</td><td>" . htmlspecialchars($tanggal_berkunjung) . "</td></tr>";
echo "<tr><td>Hobi</td><td>" . htmlspecialchars($hobi) . "</td></tr>";
echo "<tr><td>Disukai</td><td>" . htmlspecialchars($disukai) . "</td></tr>";
?>
</table>
<hr width="320">

<?php

if (!empty($nama_pengunjung)){
    $visitors = readVisitors();
    $newId = getNextId(); // Dapatkan ID unik baru

    $newVisitor = [
        'id' => $newId,
        'nama_pengunjung' => $nama_pengunjung,
        'jenis_kelamin' => $jenis_kelamin,
        'tanggal_berkunjung' => $tanggal_berkunjung,
        'hobi' => $hobi,
        'disukai' => $disukai
    ];

    $visitors[] = $newVisitor; // Tambahkan pengunjung baru ke array
    writeVisitors($visitors); // Tulis kembali seluruh array ke file

    // Log ke histori
    logHistory('ADD', $newId, $nama_pengunjung, 'Data baru ditambahkan');

    echo "Data Pengunjung Berhasil Disimpan!";
} else {
    echo "Nama Pengunjung tidak boleh kosong!";
}

?>
</center>
</body>
</html>
