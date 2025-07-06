<?php

// Definisi path file data
define('DATA_FILE', 'pengunjung.txt');
define('HISTORY_FILE', 'history.txt');

// Fungsi untuk membaca semua data pengunjung dari file
function readVisitors() {
    if (!file_exists(DATA_FILE)) {
        return []; // Kembalikan array kosong jika file tidak ada
    }

    $lines = file(DATA_FILE, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $visitors = [];
    foreach ($lines as $line) {
        $data = explode(',', $line);
        // Pastikan jumlah kolom sesuai sebelum memproses
        if (count($data) == 6) {
            $visitors[] = [
                'id' => $data[0],
                'nama_pengunjung' => $data[1],
                'jenis_kelamin' => $data[2],
                'tanggal_berkunjung' => $data[3],
                'hobi' => $data[4],
                'disukai' => $data[5]
            ];
        }
    }
    return $visitors;
}

// Fungsi untuk menulis semua data pengunjung ke file
function writeVisitors($visitors) {
    $fileContent = '';
    foreach ($visitors as $visitor) {
        $fileContent .= implode(',', $visitor) . "\n";
    }
    file_put_contents(DATA_FILE, $fileContent);
}

// Fungsi untuk mendapatkan ID unik baru
function getNextId() {
    $visitors = readVisitors();
    $maxId = 0;
    foreach ($visitors as $visitor) {
        if ($visitor['id'] > $maxId) {
            $maxId = $visitor['id'];
        }
    }
    return $maxId + 1;
}

// Fungsi untuk menulis entri riwayat
function logHistory($action_type, $visitor_id, $visitor_name, $details = '') {
    $timestamp = date('Y-m-d H:i:s');
    $logEntry = "$timestamp,$action_type,$visitor_id,\"$visitor_name\",\"$details\"\n";
    file_put_contents(HISTORY_FILE, $logEntry, FILE_APPEND | LOCK_EX);
}

// Untuk memastikan file ada saat aplikasi dimulai
if (!file_exists(DATA_FILE)) {
    file_put_contents(DATA_FILE, '');
}
if (!file_exists(HISTORY_FILE)) {
    file_put_contents(HISTORY_FILE, '');
}

?>
