<!DOCTYPE html>
<html>
<head>
    <title>Tampil Data Pengunjung</title>
    <link rel="stylesheet" href="w3.css">
    <style>
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<center>
<h1>Data Pengunjung</h1>
<hr>

<?php
require ("Koneksi.php"); // Memanggil Koneksi.php yang sekarang berisi fungsi file

$visitors = readVisitors(); // Baca semua data pengunjung

if (empty($visitors)) {
    echo "<p>Belum ada data pengunjung.</p>";
} else {
    echo "<table class='w3-table-all w3-hoverable w3-card-4'>";
    echo "<thead>";
    echo "<tr class='w3-light-grey'>";
    echo "<th>ID</th>";
    echo "<th>Nama Pengunjung</th>";
    echo "<th>Jenis Kelamin</th>";
    echo "<th>Tanggal Berkunjung</th>";
    echo "<th>Hobi</th>";
    echo "<th>Disukai</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";

    foreach ($visitors as $visitor) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($visitor['id']) . "</td>";
        echo "<td>" . htmlspecialchars($visitor['nama_pengunjung']) . "</td>";
        echo "<td>" . htmlspecialchars($visitor['jenis_kelamin']) . "</td>";
        echo "<td>" . htmlspecialchars($visitor['tanggal_berkunjung']) . "</td>";
        echo "<td>" . htmlspecialchars($visitor['hobi']) . "</td>";
        echo "<td>" . htmlspecialchars($visitor['disukai']) . "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
}
?>
</center>
</body>
</html>
