<!DOCTYPE html>
<html>
<head>
    <title>Save EDIT Data Pengunjung</title>
</head>
<body>
<center>
<h1>Save EDIT Data Pengunjung</h1>
<hr width="300">
<table>
<?php
require ("koneksi.php");


$id_post = $_POST['id'];
$nama_pengunjung_post = $_POST['nama_pengunjung'];
$jenis_kelamin_post = $_POST['jenis_kelamin'];
$tanggal_berkunjung_post = $_POST['tanggal_berkunjung'];
$hobi_post = $_POST['hobi'];
$disukai_post = $_POST['disukai'];

$sql = "UPDATE pengunjung SET nama_pengunjung = '$nama_pengunjung_post', jenis_kelamin = '$jenis_kelamin_post', tanggal_berkunjung = '$tanggal_berkunjung_post', hobi = '$hobi_post', disukai = '$disukai_post' WHERE id = '$id_post'";


$hasil = mysqli_query($conn, $sql);


echo "<tr><td>ID Pengunjung</td><td>" . htmlspecialchars($id_post) . "</td></tr>";
echo "<tr><td>Nama Pengunjung</td><td>" . htmlspecialchars($nama_pengunjung_post) . "</td></tr>";
echo "<tr><td>Jenis Kelamin</td><td>" . htmlspecialchars($jenis_kelamin_post) . "</td></tr>";
echo "<tr><td>Tanggal Berkunjung</td><td>" . htmlspecialchars($tanggal_berkunjung_post) . "</td></tr>";
echo "<tr><td>Hobi</td><td>" . htmlspecialchars($hobi_post) . "</td></tr>";
echo "<tr><td>Disukai</td><td>" . htmlspecialchars($disukai_post) . "</td></tr>";
?>
</table>
<hr width="300">

<?php
if ($hasil) {
    echo "Data Pengunjung Telah di Simpan";
} else {
    echo "Error menyimpan data: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
</center>
</body>
</html>