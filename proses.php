<?php
// Mengatur header untuk menerima JSON dan mengirimkan JSON
header('Content-Type: application/json');

// Mendapatkan data input dari JavaScript
$input = file_get_contents('php://input');
$data = json_decode($input, true);

// Validasi data
if (isset($data['nama']) && isset($data['kelas'])) {
    $nama = htmlspecialchars($data['nama']);
    $kelas = htmlspecialchars($data['kelas']);

    // Membuat pesan
    $message = "Selamat datang, $nama dari kelas $kelas!";

    // Mengembalikan pesan dalam bentuk JSON
    echo json_encode(['message' => $message]);
} else {
    // Mengembalikan pesan error
    echo json_encode(['message' => 'Data tidak lengkap!']);
}
