<?php

$user = 'yan';
$pass = 'yanfian284';
$db = 'kai';
$host = '127.0.0.1';

$conn = mysqli_connect($host, $user, $pass, $db, 3306);

if (!$conn) {
    die("<script>alert('Gagal tersambung dengan database.')</script>");
}

?>
