<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'perpustakaan';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 1. Pastikan kolom ada (jika sebelumnya gagal/belum)
$conn->query("ALTER TABLE users ADD COLUMN IF NOT EXISTS password_plain VARCHAR(255) AFTER password");

// 2. Inisialisasi data NULL dengan username (NIS)
$sql = "UPDATE users SET password_plain = username WHERE password_plain IS NULL OR password_plain = ''";

if ($conn->query($sql) === TRUE) {
    $affected = $conn->affected_rows;
    echo "Successfully initialized $affected user(s) with their NIS as password_plain.\n";
} else {
    echo "Error: " . $conn->error . "\n";
}

$conn->close();
?>
