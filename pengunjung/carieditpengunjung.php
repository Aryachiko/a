<!DOCTYPE html>
<html>
<head>
    <title>MENAMPILKAN DATA PENGUNJUNG</title>
</head>
<body>
<center>
<h1>MENAMPILKAN DATA PENGUNJUNG</h1>
<hr>
<form action="saveeditpengunjung.php" method="post"> <table> <?php
require ("Koneksi.php"); // Memanggil Koneksi.php

$nama_pengunjung_cari = $_POST['nama_pengunjung'];
$foundVisitor = null;

$visitors = readVisitors(); // Baca semua pengunjung

foreach ($visitors as $visitor) {
    // Cari berdasarkan nama pengunjung
    if ($visitor['nama_pengunjung'] === $nama_pengunjung_cari) {
        $foundVisitor = $visitor;
        break;
    }
}

if ($foundVisitor) {
    list ($id_db, $nama_pengunjung_db, $jenis_kelamin_db, $tanggal_berkunjung_db, $hobi_db, $disukai_db) = array_values($foundVisitor);
    echo "<tr><td>ID Pengunjung</td><td><input type='text' name='id' value='" . htmlspecialchars($id_db) . "' readonly></td></tr>";
    echo "<tr><td>Nama Pengunjung</td><td><input type='text' name='nama_pengunjung' value='" . htmlspecialchars($nama_pengunjung_db) . "'></td></tr>";
    echo "<tr><td>Jenis Kelamin</td><td>";
    echo "<input type='radio' name='jenis_kelamin' value='Laki-laki'" . ($jenis_kelamin_db == 'Laki-laki' ? ' checked' : '') . "> Laki-laki";
    echo "<input type='radio' name='jenis_kelamin' value='Perempuan'" . ($jenis_kelamin_db == 'Perempuan' ? ' checked' : '') . "> Perempuan";
    echo "</td></tr>";
    echo "<tr><td>Tanggal Berkunjung</td><td><input type='date' name='tanggal_berkunjung' value='" . htmlspecialchars($tanggal_berkunjung_db) . "'></td></tr>";
    echo "<tr><td>Hobi</td><td><input type='text' name='hobi' value='" . htmlspecialchars($hobi_db) . "'></td></tr>";
    echo "<tr><td>Disukai</td><td><input type='text' name='disukai' value='" . htmlspecialchars($disukai_db) . "'></td></tr>";
    echo "<tr><td></td><td><input type='submit' value='Save Edit'> <input type='reset' value='Reset'></td></tr>";
} else {
    echo "<tr><td colspan='2'>Data pengunjung dengan nama <b>" . htmlspecialchars($nama_pengunjung_cari) . "</b> tidak ditemukan.</td></tr>";
}

?>
</table>
</form>
</center>
</body>
</html>
