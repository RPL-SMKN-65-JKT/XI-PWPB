<?php
$user = 'root';
$password = '';
$db = 'table';
$host = '127.0.0.1';
$port = 3306;
$kon = mysqli_connect($host, $user, $password, $db, 3306);
if(!$kon) {
    die("Koneksi ke database gagal");
}
?>