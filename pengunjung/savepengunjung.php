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
require ("Koneksi.php");

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

    $sql = "INSERT INTO pengunjung (nama_pengunjung, jenis_kelamin, tanggal_berkunjung, hobi, disukai) VALUES ('$nama_pengunjung', '$jenis_kelamin', '$tanggal_berkunjung', '$hobi', '$disukai')";

    $hasil = mysqli_query($conn, $sql);

    if ($hasil) {
        echo "Data telah ditambahkan";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
else
{
    echo "Nama Pengunjung Tidak Boleh Kosong";
}

mysqli_close($conn);
?>
</center>
</body>
</html>