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
require ("koneksi.php"); // Memanggil Koneksi.php

$id_post = $_POST['id'];
$nama_pengunjung_post = $_POST['nama_pengunjung'];
$jenis_kelamin_post = $_POST['jenis_kelamin'];
$tanggal_berkunjung_post = $_POST['tanggal_berkunjung'];
$hobi_post = $_POST['hobi'];
$disukai_post = $_POST['disukai'];

$visitors = readVisitors();
$updated = false;
$old_data = [];
$new_data = [
    'id' => $id_post,
    'nama_pengunjung' => $nama_pengunjung_post,
    'jenis_kelamin' => $jenis_kelamin_post,
    'tanggal_berkunjung' => $tanggal_berkunjung_post,
    'hobi' => $hobi_post,
    'disukai' => $disukai_post
];

foreach ($visitors as $key => $visitor) {
    if ($visitor['id'] == $id_post) {
        $old_data = $visitors[$key]; // Simpan data lama untuk log
        $visitors[$key] = $new_data; // Perbarui data
        $updated = true;
        break;
    }
}

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
if ($updated) {
    writeVisitors($visitors); // Tulis kembali seluruh array ke file

    // Detail perubahan untuk histori
    $changes = [];
    foreach ($old_data as $key => $value) {
        if ($old_data[$key] != $new_data[$key]) {
            $changes[] = "$key: '{$old_data[$key]}' menjadi '{$new_data[$key]}'";
        }
    }
    $change_details = implode('; ', $changes);
    if (empty($change_details)) {
        $change_details = "Tidak ada perubahan data.";
    }

    // Log ke histori
    logHistory('EDIT', $id_post, $nama_pengunjung_post, $change_details);

    echo "Data Pengunjung Berhasil di Edit!";
} else {
    echo "Gagal mengedit data: ID Pengunjung " . htmlspecialchars($id_post) . " tidak ditemukan.";
}
?>
</center>
</body>
</html>
