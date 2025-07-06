<!DOCTYPE html>
<html>
<head>
    <title>Histori Pengunjung</title>
    <link rel="stylesheet" href="w3.css">
    <style>
        table {
            width: 90%;
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
<h1>Histori Aktivitas Pengunjung</h1>
<hr>

<?php
require ("Koneksi.php"); // Memanggil Koneksi.php untuk akses HISTORY_FILE

if (!file_exists(HISTORY_FILE) || filesize(HISTORY_FILE) == 0) {
    echo "<p>Belum ada histori aktivitas.</p>";
} else {
    $lines = file(HISTORY_FILE, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $history_entries = [];
    foreach ($lines as $line) {
        // Menggunakan str_getcsv untuk menangani koma dalam data yang di-quote
        $data = str_getcsv($line);
        if (count($data) == 5) {
            $history_entries[] = [
                'timestamp' => $data[0],
                'tipe_aksi' => $data[1],
                'id_pengunjung' => $data[2],
                'nama_pengunjung_terkait' => $data[3],
                'detail_perubahan' => $data[4]
            ];
        }
    }

    if (empty($history_entries)) {
         echo "<p>Belum ada histori aktivitas.</p>";
    } else {
        echo "<table class='w3-table-all w3-hoverable w3-card-4'>";
        echo "<thead>";
        echo "<tr class='w3-light-grey'>";
        echo "<th>Waktu</th>";
        echo "<th>Tipe Aksi</th>";
        echo "<th>ID Pengunjung</th>";
        echo "<th>Nama Terkait</th>";
        echo "<th>Detail</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";

        // Tampilkan histori dari yang terbaru
        $history_entries = array_reverse($history_entries);

        foreach ($history_entries as $entry) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($entry['timestamp']) . "</td>";
            echo "<td>" . htmlspecialchars($entry['tipe_aksi']) . "</td>";
            echo "<td>" . htmlspecialchars($entry['id_pengunjung']) . "</td>";
            echo "<td>" . htmlspecialchars($entry['nama_pengunjung_terkait']) . "</td>";
            echo "<td>" . htmlspecialchars($entry['detail_perubahan']) . "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }
}
?>
</center>
</body>
</html>