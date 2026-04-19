<?php
$c = mysqli_connect('localhost', 'root', '', 'perpustakaan');
$q = mysqli_query($c, "SELECT * FROM anggota WHERE nama LIKE '%Arief%'");
$res = mysqli_fetch_assoc($q);
print_r($res);
?>
