<?php

include("koneksi.php");

if(isset($_POST["submit"])) {

    $nama = $_POST["nama"];
    $nomor = $_POST["nomor"];
    $email = htmlspecialchars($_POST["email"]);
    $room = $_POST["room"];

    // $room = array($_POST["luxury"], $_POST["dpr"], $_POST["elite"]);

    $waktu = $_POST["waktu"];
    $input = "INSERT INTO shelby VALUES('$nama', '$nomor', '$email', '$room', '$waktu')";
    $query = mysqli_query($mysql, $input);

    header("Location: http://localhost/hotel/");

    // if(mysqli_affected_rows($query)){
    //     echo '<script>
    //         alert("Berhasil Cuy");
    //     </script>';
    //     header("Loacation: http://localhost/hotel/");
    // } else {
    //     echo '<script>
    //         alert("Gagal Cuy");
    //     </script>';
    //     header("Loacation: http://localhost/hotel/");
    // }

}