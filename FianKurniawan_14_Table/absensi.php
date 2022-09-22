<?php
include "mysql.php";

if($_POST['Submit'] == "Submit") {
    $name = $_POST['nama'];
    $absen = $_POST['absen'];
    $nisn = intval($_POST['nisn']);
    $a = "INSERT INTO table (nama, absen, nisn, hadir, sakit, izin)VALUES('$name', '$absen', '$nisn', 0, 0, 0)";
    $query = mysqli_query($kon, $a);
    if($_POST['nama'] == null) {
        header("location:index.php");
        return;
    }
    if($_POST['hadir'] !== null){
        addAja($name, "hadir", $kon);
        header("location:index.php");
    } elseif($_POST['sakit'] !== null){
        addAja($name, "sakit", $kon);
        header("location:index.php");
    } elseif($_POST['izin'] !== null){
        addAja($name, "izin", $kon);
        header("location:index.php");
    }
}
    function registerPlayer(string $name,$kon){
        $a = "INSERT INTO table (nama, absen, nisn, hadir, sakit, izin)VALUES('$name', '$absen', '$nisn', 0, 0, 0)";
        $query = mysqli_query($kon, $a);
        var_dump($query);
    }
    
    function getAccount(string $name, $kon){
        $a = "SELECT * FROM table WHERE nama = '$name'";
        $result = mysqli_query($kon, $a);
        if($result->num_rows !== 0){
            return "kk";
        }
        return null;
    }

    function addAja(string $name,$type,$kon){
        if($type == "hadir"){
            $a = "UPDATE table SET hadir = hadir + 1 WHERE nama = '".$name."'";
            $query = mysqli_query($kon, $a);
        }
        if($type == "sakit"){
            $a = "UPDATE table SET sakit = sakit + 1 WHERE nama = '".$name."'";
            $query = mysqli_query($kon, $a);
        }
        if($type == "izin"){
            $a = "UPDATE table SET izin = izin +1 WHERE nama = '".$name."'";
            $query = mysqli_query($kon, $a);
        }
    }
?>