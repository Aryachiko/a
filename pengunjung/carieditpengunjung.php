<!DOCTYPE html>
<html>
<head>
    <title>MENAMPILKAN DATA PENGUNJUNG</title>
</head>
<body>
<center>
<h1>MENAMPILKAN DATA PENGUNJUNG</h1>
<hr>
<form action="saveeditpengunjung.php" method="post"> <table border="0"> <?php
require ("Koneksi.php");

$nama_pengunjung_cari = $_POST['nama_pengunjung'];

$sql = "SELECT id, nama_pengunjung, jenis_kelamin, tanggal_berkunjung, hobi, disukai FROM pengunjung WHERE nama_pengunjung = '$nama_pengunjung_cari'";
$hasil = mysqli_query($conn, $sql);
$row = mysqli_fetch_row($hasil);

if ($row) {
    list ($id_db, $nama_pengunjung_db, $jenis_kelamin_db, $tanggal_berkunjung_db, $hobi_db, $disukai_db) = $row;
    echo "<tr><td>ID Pengunjung</td><td><input type='text' name='id' value='" . htmlspecialchars($id_db) . "' readonly></td></tr>";
    echo "<tr><td>Nama Pengunjung</td><td><input type='text' name='nama_pengunjung' value='" . htmlspecialchars($nama_pengunjung_db) . "'></td></tr>";
    echo "<tr><td>Jenis Kelamin</td><td>";
    echo "<input type='radio' name='jenis_kelamin' value='Laki-laki'" . ($jenis_kelamin_db == 'Laki-laki' ? ' checked' : '') . "> Laki-laki";
    echo "<input type='radio' name='jenis_kelamin' value='Perempuan'" . ($jenis_kelamin_db == 'Perempuan' ? ' checked' : '') . "> Perempuan";
    echo "</td></tr>";
    echo "<tr><td>Tanggal Berkunjung</td><td><input type='date' name='tanggal_berkunjung' value='" . htmlspecialchars($tanggal_berkunjung_db) . "'></td></tr>";
    echo "<tr><td>Hobi</td><td><input type='text' name='hobi' value='" . htmlspecialchars($hobi_db) . "'></td></tr>";
    echo "<tr><td>Disukai</td><td><input type='text' name='disukai' value='" . htmlspecialchars($disukai_db) . "'></td></tr>";
} else {
    echo "<tr><td colspan='2'>Data pengunjung dengan nama " . htmlspecialchars($nama_pengunjung_cari) . " tidak ditemukan.</td></tr>";
}

mysqli_close($conn);
?>
</table>
<hr>
<input type="submit" value="Save"> <input type="reset" value="Reset"> </form>
</center>
</body>
</html>