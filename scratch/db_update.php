<?php
$c = mysqli_connect('localhost', 'root', '', 'perpustakaan');
if (!$c) {
    echo "Connection failed: " . mysqli_connect_error();
    exit(1);
}
$sql = "ALTER TABLE anggota ADD COLUMN foto VARCHAR(255) DEFAULT NULL AFTER telepon";
if (mysqli_query($c, $sql)) {
    echo "SUCCESS";
} else {
    echo "Error: " . mysqli_error($c);
}
mysqli_close($c);
?>
